<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Hemos recibido tu mensaje</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Inter:wght@400;500&display=swap"
        rel="stylesheet">

</head>

<body style="margin:0;padding:0;background:#0f0f1a;font-family:'Inter',sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="padding:40px 0;background:#0f0f1a;">
        <tr>
            <td align="center">

                <table width="620" cellpadding="0" cellspacing="0"
                    style="background:#1a1a2e;border-radius:14px;overflow:hidden;color:#ffffff;box-shadow:0 10px 30px rgba(0,0,0,.4);">

                    <!-- HEADER -->
                    <tr>
                        <td style="background:linear-gradient(90deg,#5e1ed3,#8c5cff);padding:35px;text-align:center;">

                            <h1 style="margin:0;font-family:'Poppins',sans-serif;font-size:26px;">
                                Gracias por contactarnos 🚀
                            </h1>

                            <p style="margin-top:10px;font-size:14px;opacity:.9;">
                                Hemos recibido tu mensaje correctamente
                            </p>

                        </td>
                    </tr>

                    <!-- BODY -->
                    <tr>
                        <td style="padding:35px;">

                            <h2 style="font-family:'Poppins';color:#00e0ff;margin-top:0;">
                                Hola {{ $data['nombre'] }} 👋
                            </h2>

                            <p style="font-size:15px;line-height:1.6;opacity:.9;">
                                Gracias por comunicarte con <strong>Orale Web</strong>.
                                Nuestro equipo ya recibió tu solicitud y la estamos revisando.
                            </p>

                            <p style="font-size:15px;line-height:1.6;opacity:.9;">
                                En breve uno de nuestros especialistas se pondrá en contacto contigo para hablar sobre
                                tu proyecto y cómo podemos ayudarte a crear una web que realmente genere resultados.
                            </p>

                            <!-- INFO CARD -->
                            <table width="100%" cellpadding="0" cellspacing="0"
                                style="margin-top:25px;background:#0f0f1a;border-radius:10px;padding:25px;">

                                <tr>
                                    <td style="padding:8px 0;">
                                        <strong style="color:#8c5cff;">Industria:</strong><br>
                                        {{ $data['industria'] }}
                                    </td>

                                    <td style="padding:8px 0;">
                                        <strong style="color:#8c5cff;">Paquete de interés:</strong><br>
                                        {{ $data['paquete'] }}
                                    </td>
                                </tr>

                            </table>

                            <!-- CTA -->
                            <div style="margin-top:30px;text-align:center;">

                                <a href="https://wa.me/525512480210"
                                    style="background:#00e0ff;color:#000;text-decoration:none;padding:14px 26px;border-radius:6px;font-weight:600;display:inline-block;">
                                    Hablar por WhatsApp
                                </a>

                            </div>

                            <p style="margin-top:25px;font-size:14px;opacity:.8;">
                                Si tu solicitud es urgente, puedes escribirnos directamente por WhatsApp y con gusto te
                                atenderemos.
                            </p>

                        </td>
                    </tr>

                    <!-- FOOTER -->
                    <tr>
                        <td style="background:#0f0f1a;text-align:center;padding:25px;font-size:12px;color:#aaaaaa;">

                            <strong style="color:#ffffff;">Orale Web</strong><br>

                            Diseñamos sitios web que convierten visitas en clientes.

                            <br><br>

                            <a href="https://oraleweb.com" style="color:#00e0ff;text-decoration:none;">
                                Visitar sitio web
                            </a>

                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>
