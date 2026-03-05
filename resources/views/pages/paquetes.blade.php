@extends('layouts.app')

@section('titulo')
    Paquetes
@endsection

@push('page-styles')
    @vite(['resources/css/paquetes.css'])
@endpush

@section('content')
    <section class="section paquetes-hero">
        <div class="paquetes-hero__content">
            <h1>Detalles de <span class="text-gradient">nuestros paquetes</span></h1>
            <p class="mb-8">Elige el plan que mejor se adapte a tu negocio. Cada paquete est&aacute; pensado para impulsar resultados
                reales y una presencia digital s&oacute;lida.</p>
        </div>
    </section>

    <section class="section paquetes-comparativa">
      
        <div class="paquetes-table" role="region" aria-label="Comparativa de paquetes">
            <table>
                <thead>
                    <tr>
                        <th scope="col">Caracter&iacute;stica</th>
                        <th scope="col">B&aacute;sico</th>
                        <th scope="col">Profesional</th>
                        <th scope="col">Personalizado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Precio</th>
                        <td>$3,500 + IVA</td>
                        <td>$5,500 + IVA</td>
                        <td>A cotizar</td>
                    </tr>
                    <tr>
                        <th scope="row">Ideal para</th>
                        <td>Emprendedores y peque&ntilde;as empresas con presencia b&aacute;sica.</td>
                        <td>Empresas que buscan un sitio m&aacute;s completo y con extras.</td>
                        <td>Proyectos con necesidades complejas o escalables.</td>
                    </tr>
                    <tr>
                        <th scope="row">P&aacute;ginas / secciones</th>
                        <td>One-page con hasta 5 secciones.</td>
                        <td>Hasta 5 p&aacute;ginas (Inicio, Nosotros, Servicios, Galer&iacute;a, Blog, Contacto).</td>
                        <td>Arquitectura a medida seg&uacute;n objetivos.</td>
                    </tr>
                    <tr>
                        <th scope="row">Dise&ntilde;o responsivo</th>
                        <td>S&iacute;</td>
                        <td>S&iacute;</td>
                        <td>S&iacute;</td>
                    </tr>
                    <tr>
                        <th scope="row">Blog</th>
                        <td>No</td>
                        <td>S&iacute;</td>
                        <td>Opcional</td>
                    </tr>
                    <tr>
                        <th scope="row">Galer&iacute;a / multimedia</th>
                        <td>Opcional</td>
                        <td>S&iacute;</td>
                        <td>Opcional</td>
                    </tr>
                    <tr>
                        <th scope="row">Formulario de contacto</th>
                        <td>Est&aacute;ndar</td>
                        <td>Avanzado con campos personalizados</td>
                        <td>A medida</td>
                    </tr>
                    <tr>
                        <th scope="row">Redes sociales</th>
                        <td>No</td>
                        <td>S&iacute;</td>
                        <td>S&iacute;</td>
                    </tr>
                    <tr>
                        <th scope="row">Correos personalizados</th>
                        <td>3</td>
                        <td>5</td>
                        <td>Seg&uacute;n necesidad</td>
                    </tr>
                    <tr>
                        <th scope="row">Google My Business</th>
                        <td>S&iacute;</td>
                        <td>S&iacute;</td>
                        <td>Opcional</td>
                    </tr>
                    <tr>
                        <th scope="row">Mapa de ubicaci&oacute;n</th>
                        <td>Opcional</td>
                        <td>Opcional</td>
                        <td>Opcional</td>
                    </tr>
                    <tr>
                        <th scope="row">Entrega estimada</th>
                        <td>5-7 d&iacute;as h&aacute;biles</td>
                        <td>7-10 d&iacute;as h&aacute;biles</td>
                        <td>Seg&uacute;n alcance</td>
                    </tr>
                    <tr>
                        <th scope="row">Autoadministrable</th>
                        <td>No</td>
                        <td>S&iacute;</td>
                        <td>S&iacute;</td>
                    </tr>
                    <tr>
                        <th scope="row">Mantenimiento</th>
                        <td>No incluido</td>
                        <td>2 meses incluidos</td>
                        <td>Plan mensual opcional</td>
                    </tr>
                    <tr class="paquetes-table__cta">
                        <th scope="row"></th>
                        <td><a href="/contacto?paquete=basico" class="btn-primario uppercase">Quiero este paquete</a></td>
                        <td><a href="/contacto?paquete=profesional" class="btn-primario uppercase">Quiero este paquete</a></td>
                        <td><a href="/contacto?paquete=personalizado" class="btn-primario uppercase">Quiero este paquete</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>


@endsection
