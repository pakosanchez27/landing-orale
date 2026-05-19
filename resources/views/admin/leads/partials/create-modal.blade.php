<div class="admin-modal" id="lead-create-modal" @if (! $errors->any()) hidden @endif>
    <div class="admin-modal__dialog crm-modal crm-modal--edit">
        <div class="admin-modal__header">
            <h3>Nuevo lead</h3>
            <button type="button" class="admin-modal__close" id="lead-create-close" aria-label="Cerrar creacion">
                <i class="fa-solid fa-xmark" aria-hidden="true"></i>
            </button>
        </div>
        <div class="admin-modal__body">
            <form action="{{ route('admin.crm.leads.store') }}" method="POST" class="admin-form">
                @csrf

                <div class="admin-form__row">
                    <div class="admin-form__group">
                        <label class="admin-label" for="create-full-name">Nombre</label>
                        <input class="admin-input" id="create-full-name" name="full_name" type="text" value="{{ old('full_name') }}" required />
                    </div>
                    <div class="admin-form__group">
                        <label class="admin-label" for="create-email">Correo</label>
                        <input class="admin-input" id="create-email" name="email" type="email" value="{{ old('email') }}" />
                    </div>
                </div>

                <div class="admin-form__row">
                    <div class="admin-form__group">
                        <label class="admin-label" for="create-whatsapp">WhatsApp</label>
                        <input class="admin-input" id="create-whatsapp" name="whatsapp_number" type="text" value="{{ old('whatsapp_number') }}" />
                    </div>
                    <div class="admin-form__group">
                        <label class="admin-label" for="create-company">Empresa</label>
                        <input class="admin-input" id="create-company" name="company_name" type="text" value="{{ old('company_name') }}" />
                    </div>
                </div>

                <div class="admin-form__row">
                    <div class="admin-form__group">
                        <label class="admin-label" for="create-industry">Industria</label>
                        <select class="admin-input" id="create-industry" name="industry_id">
                            <option value="">Selecciona una industria</option>
                            @foreach ($industries as $industry)
                                <option value="{{ $industry->id }}" @selected((string) old('industry_id') === (string) $industry->id)>{{ $industry->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="admin-form__group">
                        <label class="admin-label" for="create-source">Fuente</label>
                        <select class="admin-input" id="create-source" name="source_id">
                            <option value="">Manual</option>
                            @foreach ($leadSources as $source)
                                <option value="{{ $source->id }}" @selected((string) old('source_id') === (string) $source->id)>{{ $source->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="admin-form__row">
                    <div class="admin-form__group">
                        <label class="admin-label" for="create-package">Paquete</label>
                        <select class="admin-input" id="create-package" name="interest_package">
                            <option value="">Sin paquete</option>
                            <option value="profesional" @selected(old('interest_package') === 'profesional')>Profesional</option>
                            <option value="basico" @selected(old('interest_package') === 'basico')>Basico</option>
                            <option value="personalizado" @selected(old('interest_package') === 'personalizado')>Personalizado</option>
                            <option value="otro" @selected(old('interest_package') === 'otro')>Otro</option>
                        </select>
                    </div>
                    <div class="admin-form__group">
                        <label class="admin-label" for="create-budget">Rango de presupuesto</label>
                        <input class="admin-input" id="create-budget" name="budget_range" type="text" value="{{ old('budget_range') }}" />
                    </div>
                </div>

                <div class="admin-form__row">
                    <div class="admin-form__group">
                        <label class="admin-label" for="create-followup">Proximo seguimiento</label>
                        <input class="admin-input" id="create-followup" name="next_follow_up_at" type="datetime-local" value="{{ old('next_follow_up_at') }}" />
                    </div>
                    @if ($canAssignLeads)
                        <div class="admin-form__group">
                            <label class="admin-label" for="create-assigned">Responsable</label>
                            <select class="admin-input" id="create-assigned" name="assigned_to">
                                <option value="">Sin responsable</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" @selected((string) old('assigned_to') === (string) $user->id)>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                </div>

                <div class="admin-form__group">
                    <label class="admin-label" for="create-summary">Seguimiento / mensaje</label>
                    <textarea class="admin-input admin-textarea" id="create-summary" name="needs_summary" rows="4">{{ old('needs_summary') }}</textarea>
                </div>

                @if ($errors->any())
                    <div class="admin-alert admin-alert--error">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div class="admin-form__actions">
                    <button type="button" class="admin-btn-secondary" id="lead-create-cancel">Cancelar</button>
                    <button type="submit" class="admin-btn admin-btn--primary">Crear lead</button>
                </div>
            </form>
        </div>
    </div>
</div>
