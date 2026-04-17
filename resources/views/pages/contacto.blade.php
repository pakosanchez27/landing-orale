@extends('layouts.app')

@section('titulo', 'Contacto')
@section('meta_description', 'Contactanos para cotizar tu pagina web. Te ayudamos con estrategia, diseno y desarrollo para crecer tu presencia digital.')
@section('og_image', asset('img/img-2.png'))

@section('content')
    @php
        $paqueteSeleccionado = old('paquete', request('paquete'));
        $industriaSeleccionada = old('industria');
    @endphp

    <section class="page-hero">
        <div class="shell page-hero__card" data-reveal>
            <span class="eyebrow">Contacto</span>
            <h1>Hablemos de tu proyecto y dise&ntilde;emos una web que se vea tan bien como tu marca merece.</h1>
            <p>Cu&eacute;ntanos qu&eacute; necesitas. Te respondemos con una orientaci&oacute;n clara, sin vueltas innecesarias y con enfoque realista para tu negocio.</p>
        </div>
    </section>

    <section class="section">
        <div class="shell contact-grid">
            <aside class="contact-card" data-reveal>
                <div class="section-intro" style="margin-bottom: 2.4rem;">
                    <span class="eyebrow">Canales directos</span>
                    <h2>Podemos empezar por donde te resulte m&aacute;s c&oacute;modo.</h2>
                </div>

                <div class="contact-list">
                    <div>
                        <h3>WhatsApp</h3>
                        <p>Ideal para resolver dudas r&aacute;pidas y avanzar con una primera conversaci&oacute;n.</p>
                    </div>
                    <div>
                        <h3>Correo</h3>
                        <p>Perfecto si quieres compartir informaci&oacute;n del proyecto con m&aacute;s detalle.</p>
                    </div>
                    <div>
                        <h3>Redes</h3>
                        <p>Si ya nos sigues en redes, tambi&eacute;n podemos continuar por ah&iacute; y llevar la conversaci&oacute;n al siguiente paso.</p>
                    </div>
                </div>

                <div class="contact-links" style="margin-top: 2rem;">
                    <a href="https://wa.me/525512480210" target="_blank" rel="noopener noreferrer">WhatsApp +52 55 1248 0210</a>
                    <a href="mailto:contacto@oraleweb.com">contacto@oraleweb.com</a>
                </div>

                <div class="footer-social" style="margin-top: 2rem;">
                    <a href="https://www.tiktok.com/@oraleweb" target="_blank" rel="noopener noreferrer" aria-label="TikTok"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="https://youtube.com/@orale-web?si=r0vxY9H2Rx2uDXEt" target="_blank" rel="noopener noreferrer" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
                    <a href="https://www.facebook.com/profile.php?id=61573463732776" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/orale_web/" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                </div>

                <div class="showcase-image art-frame" style="margin-top: 2.4rem;">
                    <img src="{{ asset('img/img-2.png') }}" alt="Equipo creativo de Orale Web" loading="lazy" />
                </div>
            </aside>

            <div class="contact-card" data-reveal>
                <div class="section-intro" style="margin-bottom: 2.4rem;">
                    <span class="eyebrow">Formulario</span>
                    <h2>Cu&eacute;ntanos lo esencial y nosotros armamos la ruta.</h2>
                    <p>El campo de WhatsApp debe llevar solo 10 d&iacute;gitos para pasar la validaci&oacute;n actual del sistema.</p>
                </div>

                <form class="contact-form" action="{{ route('enviar') }}" method="POST" novalidate>
                    @csrf

                    @if (session('success'))
                        <div class="alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="form-grid">
                        <div class="field">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" placeholder="Tu nombre completo" value="{{ old('nombre') }}" />
                            @error('nombre')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="whatsapp">WhatsApp</label>
                            <input type="tel" id="whatsapp" name="whatsapp" placeholder="5512345678" value="{{ old('whatsapp') }}" />
                            @error('whatsapp')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="form-grid">
                        <div class="field">
                            <label for="correo">Correo</label>
                            <input type="email" id="correo" name="correo" placeholder="tucorreo@dominio.com" value="{{ old('correo') }}" />
                            @error('correo')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="paquete">Paquete de interes</label>
                            <select id="paquete" name="paquete">
                                <option value="">Selecciona una opcion</option>
                                <option value="profesional" @selected($paqueteSeleccionado === 'profesional')>Profesional</option>
                                <option value="basico" @selected($paqueteSeleccionado === 'basico')>Basico</option>
                                <option value="personalizado" @selected($paqueteSeleccionado === 'personalizado')>Personalizado</option>
                                <option value="otro" @selected($paqueteSeleccionado === 'otro')>Otro</option>
                            </select>
                            @error('paquete')
                                <small>{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <fieldset class="field">
                        <legend>Industria</legend>
                        <div class="radio-grid">
                            <label class="radio-card">
                                <input type="radio" name="industria" value="hospitalidad" @checked($industriaSeleccionada === 'hospitalidad') />
                                <span>Hospitalidad y alimentos</span>
                            </label>
                            <label class="radio-card">
                                <input type="radio" name="industria" value="inmobiliarias" @checked($industriaSeleccionada === 'inmobiliarias') />
                                <span>Inmobiliarias</span>
                            </label>
                            <label class="radio-card">
                                <input type="radio" name="industria" value="medica" @checked($industriaSeleccionada === 'medica') />
                                <span>Medica</span>
                            </label>
                            <label class="radio-card">
                                <input type="radio" name="industria" value="turismo" @checked($industriaSeleccionada === 'turismo') />
                                <span>Turismo</span>
                            </label>
                            <label class="radio-card">
                                <input type="radio" name="industria" value="profesional" @checked($industriaSeleccionada === 'profesional') />
                                <span>Profesional y freelancer</span>
                            </label>
                            <label class="radio-card">
                                <input type="radio" name="industria" value="otro" @checked($industriaSeleccionada === 'otro') />
                                <span>Otro</span>
                            </label>
                        </div>
                        @error('industria')
                            <small>{{ $message }}</small>
                        @enderror
                    </fieldset>

                    <div class="field">
                        <label for="mensaje">Mensaje</label>
                        <textarea id="mensaje" name="mensaje" rows="5" placeholder="Cu&eacute;ntanos sobre tu negocio, objetivos o lo que te gustaria mejorar.">{{ old('mensaje') }}</textarea>
                        @error('mensaje')
                            <small>{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Enviar mensaje</button>
                </form>
            </div>
        </div>
    </section>
@endsection
