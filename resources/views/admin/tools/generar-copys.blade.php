@extends('layouts.app-admin')

@section('titulo', 'Generar Copys')

@push('page-styles')
    <style>
        .copy-brief {
            --font-heading: "Space Grotesk", sans-serif;
            --font-body: "Manrope", sans-serif;
            --color-surface: rgba(255, 255, 255, 0.82);
            --color-surface-strong: #ffffff;
            --color-surface-alt: #eef2f8;
            --color-text: #171a24;
            --color-muted: #5b6475;
            --color-line: rgba(23, 26, 36, 0.1);
            --color-primary: #5e1ed3;
            --color-primary-strong: #47179f;
            --color-accent: #2e8fff;
            --color-success: #25d366;
            --shadow-soft: 0 24px 80px rgba(31, 41, 55, 0.08);
            --radius-xl: 2rem;
            --radius-lg: 1.4rem;
            --radius-md: 1rem;
            display: grid;
            gap: 2rem;
            font-family: var(--font-body);
        }

        .copy-brief * {
            box-sizing: border-box;
        }

        .copy-brief__hero,
        .copy-brief__shell {
            background:
                radial-gradient(circle at top left, rgba(94, 30, 211, 0.10), transparent 30rem),
                radial-gradient(circle at bottom right, rgba(46, 143, 255, 0.10), transparent 28rem),
                var(--color-surface);
            border: 1px solid var(--color-line);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-soft);
            backdrop-filter: blur(18px);
        }

        .copy-brief__hero {
            padding: 2.8rem 3rem;
            display: grid;
            gap: 1.6rem;
        }

        .copy-brief__badge {
            width: fit-content;
            display: inline-flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.8rem 1.3rem;
            border-radius: 999px;
            background: rgba(94, 30, 211, 0.09);
            color: var(--color-primary-strong);
            font-size: 1.3rem;
            font-weight: 800;
        }

        .copy-brief__badge-dot {
            width: 0.8rem;
            height: 0.8rem;
            border-radius: 999px;
            background: var(--color-success);
        }

        .copy-brief__headline {
            margin: 0;
            font-family: var(--font-heading);
            font-size: clamp(2.8rem, 4vw, 4.6rem);
            line-height: 1;
            letter-spacing: -0.04em;
        }

        .copy-brief__intro {
            margin: 0;
            max-width: 78rem;
            color: var(--color-muted);
            line-height: 1.7;
        }

        .copy-brief__payload {
            display: grid;
            gap: 1rem;
            padding: 1.6rem 1.8rem;
            border-radius: var(--radius-lg);
            background: rgba(15, 23, 41, 0.92);
            color: #dbe8ff;
            overflow-x: auto;
        }

        .copy-brief__payload-title {
            margin: 0;
            color: #ffffff;
            font-size: 1.25rem;
            font-weight: 800;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .copy-brief__payload code {
            font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-size: 1.25rem;
            line-height: 1.7;
            white-space: pre-wrap;
        }

        .copy-brief__shell {
            padding: 3rem;
        }

        .copy-brief__section-head {
            display: grid;
            gap: 0.8rem;
            margin-bottom: 2.4rem;
        }

        .copy-brief__section-title {
            margin: 0;
            font-family: var(--font-heading);
            font-size: clamp(2.2rem, 3vw, 3rem);
            letter-spacing: -0.04em;
        }

        .copy-brief__section-text {
            margin: 0;
            color: var(--color-muted);
            line-height: 1.7;
        }

        .copy-brief__grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1.8rem;
        }

        .copy-brief__field {
            display: grid;
            gap: 0.8rem;
        }

        .copy-brief__field.is-full {
            grid-column: 1 / -1;
        }

        .copy-brief__label {
            color: var(--color-text);
            font-size: 1.4rem;
            font-weight: 850;
        }

        .copy-brief__required {
            color: var(--color-primary);
        }

        .copy-brief__hint {
            color: var(--color-muted);
            font-size: 1.25rem;
            line-height: 1.5;
        }

        .copy-brief__input,
        .copy-brief__textarea,
        .copy-brief__select {
            width: 100%;
            border: 1px solid var(--color-line);
            background: var(--color-surface-strong);
            color: var(--color-text);
            border-radius: var(--radius-md);
            padding: 1.4rem 1.5rem;
            outline: none;
            transition: border-color 0.18s ease, box-shadow 0.18s ease;
        }

        .copy-brief__textarea {
            min-height: 11rem;
            resize: vertical;
        }

        .copy-brief__input:focus,
        .copy-brief__textarea:focus,
        .copy-brief__select:focus {
            border-color: rgba(94, 30, 211, 0.65);
            box-shadow: 0 0 0 4px rgba(94, 30, 211, 0.11);
        }

        .copy-brief__field.is-invalid .copy-brief__input,
        .copy-brief__field.is-invalid .copy-brief__textarea,
        .copy-brief__field.is-invalid .copy-brief__select {
            border-color: rgba(185, 28, 28, 0.65);
            box-shadow: 0 0 0 4px rgba(185, 28, 28, 0.08);
        }

        .copy-brief__error {
            display: none;
            color: #b91c1c;
            font-size: 1.25rem;
            font-weight: 750;
        }

        .copy-brief__field.is-invalid .copy-brief__error {
            display: block;
        }

        .copy-brief__actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1.4rem;
            margin-top: 3rem;
            padding-top: 2.2rem;
            border-top: 1px solid var(--color-line);
        }

        .copy-brief__actions-group {
            display: flex;
            gap: 1.2rem;
            flex-wrap: wrap;
            justify-content: flex-end;
        }

        .copy-brief__button {
            border: 0;
            border-radius: 999px;
            cursor: pointer;
            font-weight: 900;
            padding: 1.3rem 2rem;
            transition: transform 0.18s ease, box-shadow 0.18s ease, opacity 0.18s ease;
        }

        .copy-brief__button:hover {
            transform: translateY(-1px);
        }

        .copy-brief__button:disabled {
            cursor: not-allowed;
            opacity: 0.62;
            transform: none;
        }

        .copy-brief__button--ghost {
            background: transparent;
            color: var(--color-muted);
            padding-left: 0;
        }

        .copy-brief__button--secondary {
            background: var(--color-surface-alt);
            color: var(--color-text);
        }

        .copy-brief__button--primary {
            color: #fff;
            background: linear-gradient(135deg, var(--color-primary), var(--color-accent));
            box-shadow: 0 14px 32px rgba(94, 30, 211, 0.24);
        }

        .copy-brief__status {
            display: none;
            margin-top: 2rem;
            padding: 1.4rem 1.6rem;
            border-radius: var(--radius-md);
            font-weight: 800;
            line-height: 1.5;
        }

        .copy-brief__status.is-show {
            display: block;
        }

        .copy-brief__status.is-success {
            background: rgba(37, 211, 102, 0.12);
            color: #087b35;
            border: 1px solid rgba(37, 211, 102, 0.24);
        }

        .copy-brief__status.is-error {
            background: rgba(220, 38, 38, 0.1);
            color: #991b1b;
            border: 1px solid rgba(220, 38, 38, 0.18);
        }

        @media (max-width: 720px) {
            .copy-brief__hero,
            .copy-brief__shell {
                padding: 2.2rem;
                border-radius: 1.25rem;
            }

            .copy-brief__grid {
                grid-template-columns: 1fr;
            }

            .copy-brief__actions {
                flex-direction: column;
                align-items: stretch;
            }

            .copy-brief__actions-group,
            .copy-brief__actions-group .copy-brief__button {
                width: 100%;
            }
        }
    </style>
@endpush

@section('content')
    <section class="admin-page">
        <header class="admin-topbar mb-3">
            <div>
                <p class="admin-topbar__eyebrow">Tools</p>
                <h1 class="admin-topbar__title">Generar Copys</h1>
            </div>
        </header>

        <div class="copy-brief">
            <section class="copy-brief__hero">
                <div class="copy-brief__badge">
                    <span class="copy-brief__badge-dot"></span>
                    Payload simplificado
                </div>
                <h2 class="copy-brief__headline">Brief breve para generar copys</h2>
                <p class="copy-brief__intro">
                    Esta version captura unicamente los campos necesarios para construir el payload del webhook. Los
                    campos de listas deben escribirse uno por linea.
                </p>
                <div class="copy-brief__payload">
                    <p class="copy-brief__payload-title">JSON de salida</p>
                    <code>{
  "nombre_negocio": "",
  "giro": "",
  "descripcion_negocio": "",
  "tipo_sitio": "landing_page",
  "objetivo_sitio": "",
  "publico_objetivo": "",
  "servicios": [],
  "diferenciadores": [],
  "tono_marca": "",
  "cta_principal": "",
  "ubicacion": "",
  "referencias": [],
  "restricciones": [],
  "keywords_seo": []
}</code>
                </div>
            </section>

            <section class="copy-brief__shell">
                <div class="copy-brief__section-head">
                    <h2 class="copy-brief__section-title">Completa el brief</h2>
                    <p class="copy-brief__section-text">
                        Llena solo la informacion esencial. Al enviar, el formulario genera exactamente la estructura que
                        definiste.
                    </p>
                </div>

                <form id="briefForm" novalidate action="https://n8n.oraleweb.com/webhook-test/generar-copys">
                    <div class="copy-brief__grid">
                        <div class="copy-brief__field">
                            <label class="copy-brief__label" for="businessName">Nombre del negocio <span class="copy-brief__required">*</span></label>
                            <input class="copy-brief__input" id="businessName" name="businessName" type="text" placeholder="Ej. Dental Prime" required>
                            <span class="copy-brief__error">Este campo es obligatorio.</span>
                        </div>

                        <div class="copy-brief__field">
                            <label class="copy-brief__label" for="businessType">Giro <span class="copy-brief__required">*</span></label>
                            <input class="copy-brief__input" id="businessType" name="businessType" type="text" placeholder="Ej. Clinica dental" required>
                            <span class="copy-brief__error">Este campo es obligatorio.</span>
                        </div>

                        <div class="copy-brief__field is-full">
                            <label class="copy-brief__label" for="businessDescription">Descripcion del negocio <span class="copy-brief__required">*</span></label>
                            <textarea class="copy-brief__textarea" id="businessDescription" name="businessDescription" placeholder="Que hace el negocio, que vende y a quien atiende." required></textarea>
                            <span class="copy-brief__error">Este campo es obligatorio.</span>
                        </div>

                        <div class="copy-brief__field">
                            <label class="copy-brief__label" for="siteType">Tipo de sitio <span class="copy-brief__required">*</span></label>
                            <select class="copy-brief__select" id="siteType" name="siteType" required>
                                <option value="landing_page">Landing page</option>
                                <option value="sitio_corporativo">Sitio corporativo</option>
                                <option value="sitio_servicios">Sitio de servicios</option>
                                <option value="tienda_en_linea">Tienda en linea</option>
                                <option value="portafolio">Portafolio</option>
                                <option value="plataforma">Plataforma</option>
                            </select>
                            <span class="copy-brief__error">Selecciona una opcion.</span>
                        </div>

                        <div class="copy-brief__field">
                            <label class="copy-brief__label" for="tone">Tono de marca <span class="copy-brief__required">*</span></label>
                            <select class="copy-brief__select" id="tone" name="tone" required>
                                <option value="">Selecciona una opcion</option>
                                <option value="profesional">Profesional</option>
                                <option value="cercano">Cercano y amigable</option>
                                <option value="premium">Elegante / premium</option>
                                <option value="juvenil">Juvenil e informal</option>
                                <option value="tecnico">Tecnico</option>
                                <option value="directo">Simple y directo</option>
                            </select>
                            <span class="copy-brief__error">Selecciona una opcion.</span>
                        </div>

                        <div class="copy-brief__field is-full">
                            <label class="copy-brief__label" for="websiteGoal">Objetivo del sitio <span class="copy-brief__required">*</span></label>
                            <textarea class="copy-brief__textarea" id="websiteGoal" name="websiteGoal" placeholder="Ej. Generar citas por WhatsApp o captar prospectos." required></textarea>
                            <span class="copy-brief__error">Este campo es obligatorio.</span>
                        </div>

                        <div class="copy-brief__field is-full">
                            <label class="copy-brief__label" for="targetAudience">Publico objetivo <span class="copy-brief__required">*</span></label>
                            <textarea class="copy-brief__textarea" id="targetAudience" name="targetAudience" placeholder="Describe al cliente ideal." required></textarea>
                            <span class="copy-brief__error">Este campo es obligatorio.</span>
                        </div>

                        <div class="copy-brief__field is-full">
                            <label class="copy-brief__label" for="services">Servicios <span class="copy-brief__required">*</span></label>
                            <textarea class="copy-brief__textarea" id="services" name="services" placeholder="Uno por linea.&#10;Limpieza dental&#10;Ortodoncia&#10;Implantes" required></textarea>
                            <span class="copy-brief__hint">Cada linea se convierte en un elemento del arreglo.</span>
                            <span class="copy-brief__error">Este campo es obligatorio.</span>
                        </div>

                        <div class="copy-brief__field is-full">
                            <label class="copy-brief__label" for="differentiators">Diferenciadores</label>
                            <textarea class="copy-brief__textarea" id="differentiators" name="differentiators" placeholder="Uno por linea.&#10;Atencion personalizada&#10;Tecnologia moderna"></textarea>
                        </div>

                        <div class="copy-brief__field">
                            <label class="copy-brief__label" for="primaryCta">CTA principal <span class="copy-brief__required">*</span></label>
                            <input class="copy-brief__input" id="primaryCta" name="primaryCta" type="text" placeholder="Ej. Agenda tu cita" required>
                            <span class="copy-brief__error">Este campo es obligatorio.</span>
                        </div>

                        <div class="copy-brief__field">
                            <label class="copy-brief__label" for="location">Ubicacion</label>
                            <input class="copy-brief__input" id="location" name="location" type="text" placeholder="Ej. Toluca / Nacional / Remoto">
                        </div>

                        <div class="copy-brief__field is-full">
                            <label class="copy-brief__label" for="references">Referencias</label>
                            <textarea class="copy-brief__textarea" id="references" name="references" placeholder="Uno por linea. Pega URLs o nombres de referencia."></textarea>
                        </div>

                        <div class="copy-brief__field is-full">
                            <label class="copy-brief__label" for="restrictions">Restricciones</label>
                            <textarea class="copy-brief__textarea" id="restrictions" name="restrictions" placeholder="Uno por linea. Ej.&#10;No mencionar precios&#10;No usar lenguaje tecnico"></textarea>
                        </div>

                        <div class="copy-brief__field is-full">
                            <label class="copy-brief__label" for="seoKeywords">Keywords SEO</label>
                            <textarea class="copy-brief__textarea" id="seoKeywords" name="seoKeywords" placeholder="Uno por linea.&#10;dentista en Toluca&#10;clinica dental en Toluca"></textarea>
                        </div>
                    </div>

                    <div class="copy-brief__actions">
                        <button type="button" class="copy-brief__button copy-brief__button--ghost" id="resetBtn">Limpiar</button>
                        <div class="copy-brief__actions-group">
                            <button type="button" class="copy-brief__button copy-brief__button--secondary" id="previewBtn">Ver payload</button>
                            <button type="submit" class="copy-brief__button copy-brief__button--primary" id="submitBtn">Enviar a n8n</button>
                        </div>
                    </div>

                    <div class="copy-brief__payload" id="payloadPreview" hidden>
                        <p class="copy-brief__payload-title">Vista previa</p>
                        <code id="payloadPreviewCode"></code>
                    </div>

                    <div class="copy-brief__status" id="statusBox"></div>
                </form>
            </section>
        </div>
    </section>
@endsection

@push('page-scripts')
    <script>
        const N8N_WEBHOOK_URL = @json(config('services.n8n.brief_webhook', 'https://TU-DOMINIO-N8N/webhook/brief-web'));

        const form = document.getElementById("briefForm");
        const submitBtn = document.getElementById("submitBtn");
        const resetBtn = document.getElementById("resetBtn");
        const previewBtn = document.getElementById("previewBtn");
        const statusBox = document.getElementById("statusBox");
        const payloadPreview = document.getElementById("payloadPreview");
        const payloadPreviewCode = document.getElementById("payloadPreviewCode");

        function splitLines(value) {
            return value
                .split("\n")
                .map((item) => item.trim())
                .filter(Boolean);
        }

        function getValue(name) {
            return form.elements[name]?.value?.trim() || "";
        }

        function buildPayload() {
            return {
                nombre_negocio: getValue("businessName"),
                giro: getValue("businessType"),
                descripcion_negocio: getValue("businessDescription"),
                tipo_sitio: getValue("siteType") || "landing_page",
                objetivo_sitio: getValue("websiteGoal"),
                publico_objetivo: getValue("targetAudience"),
                servicios: splitLines(getValue("services")),
                diferenciadores: splitLines(getValue("differentiators")),
                tono_marca: getValue("tone"),
                cta_principal: getValue("primaryCta"),
                ubicacion: getValue("location"),
                referencias: splitLines(getValue("references")),
                restricciones: splitLines(getValue("restrictions")),
                keywords_seo: splitLines(getValue("seoKeywords"))
            };
        }

        function clearStatus() {
            statusBox.className = "copy-brief__status";
            statusBox.textContent = "";
        }

        function setStatus(type, message) {
            statusBox.className = `copy-brief__status is-show ${type === "success" ? "is-success" : "is-error"}`;
            statusBox.textContent = message;
        }

        function validateForm() {
            const requiredFields = Array.from(form.querySelectorAll("[required]"));
            let isValid = true;

            requiredFields.forEach((field) => {
                const wrapper = field.closest(".copy-brief__field");
                const hasValue = field.value.trim() !== "";
                wrapper.classList.toggle("is-invalid", !hasValue);

                if (!hasValue) {
                    isValid = false;
                }
            });

            if (!isValid) {
                setStatus("error", "Revisa los campos obligatorios antes de continuar.");
            }

            return isValid;
        }

        function updatePreview() {
            const payload = buildPayload();
            payloadPreview.hidden = false;
            payloadPreviewCode.textContent = JSON.stringify(payload, null, 2);
        }

        form.addEventListener("input", (event) => {
            const wrapper = event.target.closest(".copy-brief__field");

            if (wrapper) {
                wrapper.classList.remove("is-invalid");
            }

            clearStatus();
        });

        previewBtn.addEventListener("click", () => {
            if (!validateForm()) {
                return;
            }

            updatePreview();
        });

        resetBtn.addEventListener("click", () => {
            const confirmReset = confirm("Seguro que quieres limpiar todo el formulario?");

            if (!confirmReset) {
                return;
            }

            form.reset();
            payloadPreview.hidden = true;
            payloadPreviewCode.textContent = "";
            clearStatus();
            form.querySelectorAll(".copy-brief__field").forEach((field) => field.classList.remove("is-invalid"));
        });

        form.addEventListener("submit", async (event) => {
            event.preventDefault();

            if (!validateForm()) {
                return;
            }

            submitBtn.disabled = true;
            submitBtn.textContent = "Enviando...";
            clearStatus();

            const payload = buildPayload();
            payloadPreview.hidden = false;
            payloadPreviewCode.textContent = JSON.stringify(payload, null, 2);

            try {
                const response = await fetch(N8N_WEBHOOK_URL, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(payload)
                });

                if (!response.ok) {
                    throw new Error(`Error HTTP ${response.status}`);
                }

                setStatus("success", "Brief enviado correctamente a n8n.");
            } catch (error) {
                console.error(error);
                setStatus("error", "No se pudo enviar el brief. Revisa la URL del webhook y la configuracion de n8n.");
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = "Enviar a n8n";
            }
        });
    </script>
@endpush
