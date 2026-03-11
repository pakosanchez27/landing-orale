<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Nuevo cliente - Orale Web</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Inter:wght@400;500&display=swap"
        rel="stylesheet">

</head>

<body style="margin:0;padding:0;background:#0f0f1a;font-family:'Inter',sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 0;background:#0f0f1a;">
        <tr>
            <td align="center">

                <table width="620" cellpadding="0" cellspacing="0"
                    style="background:#1a1a2e;border-radius:14px;overflow:hidden;box-shadow:0 10px 30px rgba(0,0,0,.4);color:#ffffff;">

                    <!-- HEADER -->
                    <tr>
                        <td style="background:linear-gradient(90deg,#5e1ed3,#8c5cff);padding:30px;text-align:center;">

                            <h1 style="margin:0;font-family:'Poppins',sans-serif;font-size:26px;">
                                🚀 Nuevo Lead
                            </h1>

                            <p style="margin-top:8px;font-size:14px;opacity:.9;">
                                Alguien quiere trabajar con Orale Web
                            </p>

                        </td>
                    </tr>

                    <!-- BODY -->
                    <tr>
                        <td style="padding:35px;">

                            <h2 style="font-family:'Poppins',sans-serif;color:#00e0ff;margin-top:0;">
                                Nuevo contacto desde el sitio web
                            </h2>

                            <p style="font-size:14px;opacity:.85;">
                                Se ha recibido una nueva solicitud desde el formulario de contacto.
                            </p>

                            <!-- CLIENT CARD -->
                            <table width="100%" cellpadding="0" cellspacing="0"
                                style="margin-top:25px;background:#0f0f1a;border-radius:10px;padding:25px;">

                                <tr>
                                    <td width="50%" style="padding:8px 0;">
                                        <strong style="color:#8c5cff;">Nombre</strong><br>
                                        <span style="color:#ffffff;">{{ $data['nombre'] }}</span>
                                    </td>

                                    <td width="50%" style="padding:8px 0;">
                                        <strong style="color:#8c5cff;">Correo</strong><br>
                                        <span style="color:#ffffff;">{{ $data['correo'] }}</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding:8px 0;">
                                        <strong style="color:#8c5cff;">WhatsApp</strong><br>
                                        <span style="color:#ffffff;">{{ $data['whatsapp'] }}</span>
                                    </td>

                                    <td style="padding:8px 0;">
                                        <strong style="color:#8c5cff;">Industria</strong><br>
                                        <span style="color:#ffffff;">{{ $data['industria'] }}</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2" style="padding:8px 0;">
                                        <strong style="color:#8c5cff;">Paquete de interés</strong><br>
                                        <span style="color:#ffffff;">{{ $data['paquete'] }}</span>
                                    </td>
                                </tr>

                            </table>

                            <!-- MENSAJE -->
                            <div
                                style="margin-top:25px;background:#0f0f1a;padding:22px;border-left:4px solid #00e0ff;border-radius:8px;">

                                <strong style="color:#00e0ff;">Mensaje del cliente</strong>

                                <p style="margin-top:12px;font-size:14px;line-height:1.6;">
                                    <span style="color:#ffffff;">{{ $data['mensaje'] }}</span>
                                </p>

                            </div>

                            <!-- ACTION BUTTONS -->
                            <table width="100%" style="margin-top:30px;">
                                <tr>

                                    <td align="center">

                                        <a href="mailto:{{ $data['correo'] }}"
                                            style="background:#5e1ed3;color:white;text-decoration:none;padding:12px 22px;border-radius:6px;font-weight:600;margin-right:10px;display:inline-block;">
                                            Responder por correo
                                        </a>

                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $data['whatsapp']) }}"
                                            style="background:#00e0ff;color:#000;text-decoration:none;padding:12px 22px;border-radius:6px;font-weight:600;display:inline-block;">
                                            Abrir WhatsApp
                                        </a>

                                    </td>

                                </tr>
                            </table>

                        </td>
                    </tr>

                    <!-- FOOTER -->
                    <tr>
                        <td style="background:#0f0f1a;text-align:center;padding:25px;font-size:12px;color:#aaaaaa;">

                            <strong style="color:#ffffff;">Orale Web</strong><br>

                            Nuevo lead generado desde el sitio web

                            <br><br>

                            <a href="https://oraleweb.com" style="color:#00e0ff;text-decoration:none;">
                                oraleweb.com
                            </a>

                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>
