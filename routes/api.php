<?php

use App\Http\Controllers\Api\CrmBotController;
use Illuminate\Support\Facades\Route;

Route::prefix('crm/bot')
    ->middleware('bot.token')
    ->group(function () {
        Route::post('/leads/upsert', [CrmBotController::class, 'upsertLead'])->name('api.crm.bot.leads.upsert');
        Route::post('/leads/{lead}/activity', [CrmBotController::class, 'storeActivity'])->name('api.crm.bot.leads.activity');
        Route::post('/leads/{lead}/status', [CrmBotController::class, 'updateStatus'])->name('api.crm.bot.leads.status');
        Route::post('/leads/{lead}/appointments', [CrmBotController::class, 'storeAppointment'])->name('api.crm.bot.leads.appointments');
    });
