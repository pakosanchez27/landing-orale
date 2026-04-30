<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\LeadActivity;
use App\Models\Lead;
use App\Models\LeadStatus;
use App\Models\IndustriaModel;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Schema;

class LeadController extends Controller
{
    public function dashboard()
    {
        $crmReady = $this->crmTablesAvailable();
        $now = Carbon::now();
        $summaryCards = collect();
        $monthlySeries = collect();
        $pipelineSnapshot = collect();
        $recentActivities = collect();
        $upcomingFollowUps = collect();
        $totalLeads = 0;

        if ($crmReady) {
            $leads = Lead::query()
                ->with(['status', 'source', 'assignedUser'])
                ->latest()
                ->get();

            $statuses = LeadStatus::query()
                ->orderBy('sort_order')
                ->get();

            $totalLeads = $leads->count();
            $currentPeriodStart = $now->copy()->subDays(29)->startOfDay();
            $previousPeriodStart = $currentPeriodStart->copy()->subDays(30);
            $previousPeriodEnd = $currentPeriodStart->copy()->subSecond();

            $newLeadsCurrent = $leads->filter(fn (Lead $lead) => $lead->created_at && $lead->created_at->between($currentPeriodStart, $now));
            $newLeadsPrevious = $leads->filter(fn (Lead $lead) => $lead->created_at && $lead->created_at->between($previousPeriodStart, $previousPeriodEnd));

            $assignedCurrent = $newLeadsCurrent->filter(fn (Lead $lead) => filled($lead->assigned_to))->count();
            $assignedPrevious = $newLeadsPrevious->filter(fn (Lead $lead) => filled($lead->assigned_to))->count();

            $wonCurrent = $leads->filter(fn (Lead $lead) => $lead->won_at && $lead->won_at->between($currentPeriodStart, $now))->count();
            $wonPrevious = $leads->filter(fn (Lead $lead) => $lead->won_at && $lead->won_at->between($previousPeriodStart, $previousPeriodEnd))->count();

            $openLeads = $leads->filter(function (Lead $lead) {
                if ($lead->status?->is_closed) {
                    return false;
                }

                return empty($lead->won_at) && empty($lead->lost_at);
            });

            $openCurrent = $newLeadsCurrent->filter(function (Lead $lead) {
                if ($lead->status?->is_closed) {
                    return false;
                }

                return empty($lead->won_at) && empty($lead->lost_at);
            })->count();

            $openPrevious = $newLeadsPrevious->filter(function (Lead $lead) {
                if ($lead->status?->is_closed) {
                    return false;
                }

                return empty($lead->won_at) && empty($lead->lost_at);
            })->count();

            $conversionCurrent = $newLeadsCurrent->count() > 0 ? round(($wonCurrent / $newLeadsCurrent->count()) * 100, 1) : 0;
            $conversionPrevious = $newLeadsPrevious->count() > 0 ? round(($wonPrevious / $newLeadsPrevious->count()) * 100, 1) : 0;

            $summaryCards = collect([
                [
                    'title' => 'Leads nuevos',
                    'value' => number_format($newLeadsCurrent->count()),
                    'delta' => $this->formatDelta($newLeadsCurrent->count(), $newLeadsPrevious->count()),
                    'icon' => 'fa-user-plus',
                    'sparkline' => $this->buildSparklinePoints($this->buildDailySeries($leads, 'created_at', 7)),
                ],
                [
                    'title' => 'Leads asignados',
                    'value' => number_format($assignedCurrent),
                    'delta' => $this->formatDelta($assignedCurrent, $assignedPrevious),
                    'icon' => 'fa-user-check',
                    'sparkline' => $this->buildSparklinePoints($this->buildDailySeries($leads->filter(fn (Lead $lead) => filled($lead->assigned_to)), 'created_at', 7)),
                ],
                [
                    'title' => 'Tasa de cierre',
                    'value' => $conversionCurrent . '%',
                    'delta' => $this->formatDelta($conversionCurrent, $conversionPrevious, true),
                    'icon' => 'fa-chart-line',
                    'sparkline' => $this->buildSparklinePoints($this->buildDailySeries($leads->filter(fn (Lead $lead) => filled($lead->won_at)), 'won_at', 7)),
                ],
                [
                    'title' => 'Leads en proceso',
                    'value' => number_format($openLeads->count()),
                    'delta' => $this->formatDelta($openCurrent, $openPrevious),
                    'icon' => 'fa-briefcase',
                    'sparkline' => $this->buildSparklinePoints($this->buildDailySeries($openLeads, 'created_at', 7)),
                ],
            ]);

            $monthlySeries = collect(range(5, 0))
                ->map(function (int $monthsBack) use ($now, $leads) {
                    $month = $now->copy()->subMonths($monthsBack)->startOfMonth();
                    $previousMonth = $month->copy()->subYear();
                    $currentCount = $leads->filter(
                        fn (Lead $lead) => $lead->created_at && $lead->created_at->year === $month->year && $lead->created_at->month === $month->month
                    )->count();
                    $previousCount = $leads->filter(
                        fn (Lead $lead) => $lead->created_at && $lead->created_at->year === $previousMonth->year && $lead->created_at->month === $previousMonth->month
                    )->count();

                    return [
                        'label' => $month->translatedFormat('M'),
                        'actual' => $currentCount,
                        'projected' => $previousCount,
                    ];
                })
                ->values();

            $chartMax = max(1, $monthlySeries->max(fn (array $item) => max($item['actual'], $item['projected'])));
            $monthlySeries = $monthlySeries->map(function (array $item) use ($chartMax) {
                $item['actual_height'] = max(10, (int) round(($item['actual'] / $chartMax) * 100));
                $item['projected_height'] = max(10, (int) round(($item['projected'] / $chartMax) * 100));

                return $item;
            });

            $pipelineSnapshot = $statuses->map(function (LeadStatus $status) use ($leads) {
                $count = $leads->where('status_id', $status->id)->count();

                return [
                    'name' => $status->name,
                    'count' => $count,
                    'color' => $status->color ?: '#1d7df2',
                ];
            });

            if (Schema::hasTable('lead_activities')) {
                $recentActivities = LeadActivity::query()
                    ->with(['lead', 'user'])
                    ->latest()
                    ->take(6)
                    ->get();
            }

            $upcomingFollowUps = Lead::query()
                ->with(['assignedUser', 'status'])
                ->whereNotNull('next_follow_up_at')
                ->whereBetween('next_follow_up_at', [$now->copy()->startOfDay(), $now->copy()->addDays(7)->endOfDay()])
                ->orderBy('next_follow_up_at')
                ->take(6)
                ->get();
        }

        return view('admin.leads.dashboard', [
            'crmReady' => $crmReady,
            'summaryCards' => $summaryCards,
            'monthlySeries' => $monthlySeries,
            'pipelineSnapshot' => $pipelineSnapshot,
            'recentActivities' => $recentActivities,
            'upcomingFollowUps' => $upcomingFollowUps,
            'totalLeads' => $totalLeads,
        ]);
    }

    public function index()
    {
        $boardColumns = collect();
        $statuses = collect();
        $totalLeads = 0;
        $canAssignLeads = $this->canAssignLeads();

        if ($this->crmTablesAvailable()) {
            $statuses = LeadStatus::query()
                ->orderBy('sort_order')
                ->get();

            $leads = Lead::query()
                ->with([
                    'source',
                    'industry',
                    'assignedUser',
                    'activities' => fn ($query) => $query->with('user')->latest(),
                ])
                ->orderByDesc('updated_at')
                ->get();

            $totalLeads = $leads->count();

            $boardColumns = $statuses->map(function (LeadStatus $status) use ($leads) {
                $statusLeads = $leads
                    ->where('status_id', $status->id)
                    ->values();

                return [
                    'status' => $status,
                    'leads' => $statusLeads,
                    'count' => $statusLeads->count(),
                ];
            });
        }

        return view('admin.leads.index', [
            'boardColumns' => $boardColumns,
            'statuses' => $statuses,
            'totalLeads' => $totalLeads,
            'crmReady' => $this->crmTablesAvailable(),
            'users' => Schema::hasTable('users') ? User::query()->orderBy('name')->get(['id', 'name']) : collect(),
            'industries' => Schema::hasTable('industrias') ? IndustriaModel::query()->orderBy('nombre')->get(['id', 'nombre']) : collect(),
            'canAssignLeads' => $canAssignLeads,
        ]);
    }

    public function contacts()
    {
        $leads = collect();

        if ($this->crmTablesAvailable()) {
            $leads = Lead::query()
                ->with(['source', 'status', 'industry', 'assignedUser'])
                ->orderByDesc('updated_at')
                ->get();
        }

        return view('admin.leads.contacts', [
            'leads' => $leads,
            'crmReady' => $this->crmTablesAvailable(),
        ]);
    }

    public function updateStatus(Request $request, Lead $lead): JsonResponse
    {
        $validated = $request->validate([
            'status_id' => ['required', 'integer', 'exists:lead_statuses,id'],
            'follow_up_note' => ['required', 'string', 'min:3'],
        ]);

        $status = LeadStatus::query()->findOrFail($validated['status_id']);

        if ((int) $lead->status_id !== (int) $status->id) {
            $previousStatus = $lead->status;

            $lead->status_id = $status->id;
            $lead->save();

            LeadActivity::create([
                'lead_id' => $lead->id,
                'user_id' => auth()->id(),
                'source_id' => $lead->source_id,
                'type' => 'status_changed',
                'title' => 'Estado actualizado en CRM',
                'description' => sprintf(
                    'El lead cambio de "%s" a "%s". Nota: %s',
                    $previousStatus?->name ?? 'Sin etapa',
                    $status->name,
                    $validated['follow_up_note']
                ),
                'meta' => [
                    'previous_status_id' => $previousStatus?->id,
                    'new_status_id' => $status->id,
                    'previous_status_name' => $previousStatus?->name,
                    'new_status_name' => $status->name,
                    'follow_up_note' => $validated['follow_up_note'],
                ],
            ]);
        }

        return response()->json([
            'ok' => true,
            'status' => [
                'id' => $status->id,
                'name' => $status->name,
            ],
        ]);
    }

    public function update(Request $request, Lead $lead): JsonResponse
    {
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'whatsapp_number' => ['nullable', 'string', 'max:30'],
            'industry_id' => ['nullable', 'integer', 'exists:industrias,id'],
            'status_id' => ['nullable', 'integer', 'exists:lead_statuses,id'],
            'interest_package' => ['nullable', 'string', 'max:255'],
            'budget_range' => ['nullable', 'string', 'max:255'],
            'needs_summary' => ['nullable', 'string'],
            'next_follow_up_at' => ['nullable', 'date'],
            'lost_reason' => ['nullable', 'string', 'max:255'],
            'follow_up_note' => ['nullable', 'string', 'min:3'],
        ]);

        if ($this->canAssignLeads()) {
            $assignmentData = $request->validate([
                'assigned_to' => ['nullable', 'integer', 'exists:users,id'],
            ]);

            $validated['assigned_to'] = $assignmentData['assigned_to'] ?? null;
        }

        $original = $lead->only([
            'full_name',
            'email',
            'whatsapp_number',
            'industry_id',
            'status_id',
            'assigned_to',
            'interest_package',
            'budget_range',
            'needs_summary',
            'next_follow_up_at',
            'lost_reason',
        ]);

        $previousStatus = $lead->status;
        $statusChanged = isset($validated['status_id'])
            && (int) $validated['status_id'] !== (int) $lead->status_id;

        $lead->fill($validated);
        $lead->save();

        LeadActivity::create([
            'lead_id' => $lead->id,
            'user_id' => auth()->id(),
            'source_id' => $lead->source_id,
            'type' => 'updated',
            'title' => 'Lead actualizado desde CRM',
            'description' => 'Se actualizaron los datos del lead desde el tablero CRM.',
            'meta' => [
                'before' => $original,
                'after' => $lead->only(array_keys($original)),
            ],
        ]);

        if ($statusChanged) {
            LeadActivity::create([
                'lead_id' => $lead->id,
                'user_id' => auth()->id(),
                'source_id' => $lead->source_id,
                'type' => 'status_changed',
                'title' => 'Estado actualizado desde edicion',
                'description' => sprintf(
                    'El lead cambio de "%s" a "%s". Nota: %s',
                    $previousStatus?->name ?? 'Sin etapa',
                    $lead->status?->name ?? 'Sin etapa',
                    $validated['follow_up_note'] ?? 'Sin nota registrada'
                ),
                'meta' => [
                    'previous_status_id' => $previousStatus?->id,
                    'new_status_id' => $lead->status?->id,
                    'previous_status_name' => $previousStatus?->name,
                    'new_status_name' => $lead->status?->name,
                    'follow_up_note' => $validated['follow_up_note'] ?? null,
                ],
            ]);
        }

        return response()->json([
            'ok' => true,
            'message' => 'Lead actualizado correctamente.',
        ]);
    }

    private function crmTablesAvailable(): bool
    {
        return Schema::hasTable('leads')
            && Schema::hasTable('lead_statuses')
            && Schema::hasTable('lead_sources');
    }

    private function canAssignLeads(): bool
    {
        if (! auth()->check()) {
            return false;
        }

        return in_array((int) auth()->user()->role_id, [0, 1], true);
    }

    private function formatDelta(float|int $current, float|int $previous, bool $isPercentage = false): array
    {
        if ($previous == 0) {
            $difference = $current > 0 ? 100 : 0;
        } else {
            $difference = round((($current - $previous) / $previous) * 100, 1);
        }

        return [
            'value' => ($difference > 0 ? '+' : '') . $difference . '%',
            'direction' => $difference > 0 ? 'up' : ($difference < 0 ? 'down' : 'flat'),
            'label' => $isPercentage ? 'vs periodo anterior' : 'vs ultimos 30 dias previos',
        ];
    }

    private function buildDailySeries(Collection $items, string $field, int $days): array
    {
        $start = Carbon::now()->subDays($days - 1)->startOfDay();
        $dates = collect(range(0, $days - 1))
            ->map(fn (int $offset) => $start->copy()->addDays($offset));

        return $dates->map(function (Carbon $date) use ($items, $field) {
            return $items->filter(function ($item) use ($field, $date) {
                $value = $item->{$field};

                return $value instanceof Carbon
                    ? $value->isSameDay($date)
                    : ($value && Carbon::parse($value)->isSameDay($date));
            })->count();
        })->all();
    }

    private function buildSparklinePoints(array $values): string
    {
        $max = max($values ?: [1]);
        $count = max(count($values), 1);

        return collect($values)->values()->map(function ($value, $index) use ($count, $max) {
            $x = $count === 1 ? 50 : round(($index / ($count - 1)) * 100, 2);
            $y = 100 - round(($value / max($max, 1)) * 80, 2);

            return $x . ',' . $y;
        })->implode(' ');
    }
}
