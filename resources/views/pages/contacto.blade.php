@extends('layouts.app')

@section('titulo')
    Contacto
@endsection

@push('page-styles')
    @vite(['resources/css/contacto.css'])
@endpush

@section('content')
    @php
        $paqueteSeleccionado = request('paquete');
    @endphp

    <section class="section contacto">
        <div class="contacto__header">
            <h1>Hablemos de tu proyecto</h1>
            <p>Cu&eacute;ntanos qu&eacute; necesitas y te respondemos r&aacute;pido. Nuestro equipo puede orientarte desde la
                idea hasta la publicaci&oacute;n.</p>
        </div>

        <div class="contacto__grid">
            <form class="contacto__form" action="#" method="POST">
                @csrf
                <div class="contacto__field">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Tu nombre completo" required />
                </div>

                <div class="contacto__field">
                    <label for="whatsapp">WhatsApp</label>
                    <input type="tel" id="whatsapp" name="whatsapp" placeholder="+52 55 0000 0000" required />
                </div>

                <div class="contacto__field">
                    <label for="correo">Correo</label>
                    <input type="email" id="correo" name="correo" placeholder="tucorreo@dominio.com" required />
                </div>

                <div class="contacto__field">
                    <label for="mensaje">Mensaje</label>
                    <textarea id="mensaje" name="mensaje" rows="4" placeholder="Cu&eacute;ntanos sobre tu negocio" required></textarea>
                </div>

                <fieldset class="contacto__fieldset">
                    <legend>Selecciona tu industria</legend>
                    <div class="contacto__checks">
                        <label class="contacto__check">
                            <input type="checkbox" name="industria[]" value="hospitalidad" />
                            Hospitalidad y Alimentos
                        </label>
                        <label class="contacto__check">
                            <input type="checkbox" name="industria[]" value="inmobiliarias" />
                            Inmobiliarias
                        </label>
                        <label class="contacto__check">
                            <input type="checkbox" name="industria[]" value="medica" />
                            M&eacute;dica
                        </label>
                        <label class="contacto__check">
                            <input type="checkbox" name="industria[]" value="turismo" />
                            Turismo
                        </label>
                        <label class="contacto__check">
                            <input type="checkbox" name="industria[]" value="profesional" />
                            Profesional y Freelancer
                        </label>
                        <label class="contacto__check">
                            <input type="checkbox" name="industria[]" value="otro" />
                            Otro
                        </label>
                    </div>
                </fieldset>

                <div class="contacto__field">
                    <label for="paquete">¿Qué paquete te interesa?</label>
                    <select id="paquete" name="paquete" required>
                        <option value="" selected>Selecciona una opción</option>
                        <option value="profesional" @selected($paqueteSeleccionado === 'profesional')>Profesional</option>
                        <option value="basico" @selected($paqueteSeleccionado === 'basico')>Básico</option>
                        <option value="personalizado" @selected($paqueteSeleccionado === 'personalizado')>Personalizado</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>

                <button type="submit" class="btn-primario uppercase">Enviar mensaje</button>
            </form>

            <aside class="contacto__info">
                <div class="contacto__card">
                    <h2>Con&eacute;ctate con nosotros</h2>
                    <p>Elige el canal que prefieras y te respondemos en el menor tiempo posible.</p>
                    <div class="contacto__social">
                        <a href="https://www.tiktok.com/@oraleweb" target="_blank" rel="noopener noreferrer" class="contacto__social-link" aria-label="TikTok"><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a>
                        <a href="https://youtube.com/@orale-web?si=r0vxY9H2Rx2uDXEt" target="_blank" rel="noopener noreferrer" class="contacto__social-link" aria-label="YouTube"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
                        <a href="https://www.facebook.com/profile.php?id=61573463732776" target="_blank" rel="noopener noreferrer" class="contacto__social-link" aria-label="Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                        <a href="https://www.instagram.com/orale_web/" target="_blank" rel="noopener noreferrer" class="contacto__social-link" aria-label="Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                    </div>
                    <div class="contacto__direct">
                        <a href="https://wa.me/525512480210" target="_blank" rel="noopener noreferrer" class="contacto__direct-link">
                            <i class="fa-brands fa-whatsapp" aria-hidden="true"></i>
                            WhatsApp +52 55 1248 0210
                        </a>
                        <a href="mailto:contacto@oraleweb.com" class="contacto__direct-link">
                            <i class="fa-solid fa-envelope" aria-hidden="true"></i>
                            contacto@oraleweb.com
                        </a>
                    </div>
                </div>

                <div class="contacto__media">
                    <img src="{{ asset('img/img-2.png') }}" alt="Equipo creativo" />
                </div>
            </aside>
        </div>
    </section>
@endsection
