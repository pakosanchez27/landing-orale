<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>{{ $eventType === 'status_changed' ? 'Lead actualizado' : 'Nuevo lead' }} - Orale Web</title>
</head>

<body style="margin:0;padding:0;background:#09111f;font-family:Arial,Helvetica,sans-serif;color:#f7f8fc;">
    <table width="100%" cellpadding="0" cellspacing="0" style="padding:36px 16px;background:radial-gradient(circle at top,#173055 0%,#09111f 62%);">
        <tr>
            <td align="center">
                <table width="640" cellpadding="0" cellspacing="0" style="width:640px;max-width:100%;background:#101a2f;border-radius:22px;overflow:hidden;border:1px solid rgba(92,225,230,.18);box-shadow:0 22px 60px rgba(0,0,0,.35);">
                    <tr>
                        <td style="padding:32px 34px;background:linear-gradient(135deg,#041326 0%,#14345f 45%,#28d7f1 100%);">
                            <div style="display:inline-block;padding:7px 12px;border-radius:999px;background:rgba(255,255,255,.12);font-size:12px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;">
                                Orale Web CRM
                            </div>

                            <h1 style="margin:18px 0 8px;font-size:29px;line-height:1.15;font-weight:800;color:#ffffff;">
                                {{ $eventType === 'status_changed' ? 'Movimiento en el pipeline' : 'Nuevo lead detectado' }}
                            </h1>

                            <p style="margin:0;font-size:15px;line-height:1.6;color:rgba(255,255,255,.9);">
                                {{ $eventType === 'status_changed'
                                    ? 'Un lead cambió de etapa y ya está listo para seguimiento comercial.'
                                    : 'Se registró un nuevo lead en el ecosistema comercial de Orale Web.' }}
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:32px 34px 18px;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="background:#0b1426;border:1px solid rgba(92,225,230,.12);border-radius:18px;padding:22px 24px;">
                                <tr>
                                    <td style="padding:0 0 18px;">
                                        <div style="font-size:12px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:#5ce1e6;">Lead</div>
                                        <div style="margin-top:6px;font-size:28px;font-weight:800;color:#ffffff;">{{ $lead->full_name }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td width="50%" style="padding:10px 10px 10px 0;vertical-align:top;">
                                                    <div style="font-size:12px;color:#8aa0c6;text-transform:uppercase;">Correo</div>
                                                    <div style="margin-top:6px;font-size:15px;color:#ffffff;">{{ $lead->email ?: 'Sin correo registrado' }}</div>
                                                </td>
                                                <td width="50%" style="padding:10px 0 10px 10px;vertical-align:top;">
                                                    <div style="font-size:12px;color:#8aa0c6;text-transform:uppercase;">WhatsApp</div>
                                                    <div style="margin-top:6px;font-size:15px;color:#ffffff;">{{ $lead->whatsapp_number ?: 'Sin WhatsApp registrado' }}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="50%" style="padding:10px 10px 10px 0;vertical-align:top;">
                                                    <div style="font-size:12px;color:#8aa0c6;text-transform:uppercase;">Fuente</div>
                                                    <div style="margin-top:6px;font-size:15px;color:#ffffff;">{{ $sourceLabel }}</div>
                                                </td>
                                                <td width="50%" style="padding:10px 0 10px 10px;vertical-align:top;">
                                                    <div style="font-size:12px;color:#8aa0c6;text-transform:uppercase;">Estado actual</div>
                                                    <div style="margin-top:6px;font-size:15px;color:#ffffff;">{{ $currentStatusName }}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="50%" style="padding:10px 10px 10px 0;vertical-align:top;">
                                                    <div style="font-size:12px;color:#8aa0c6;text-transform:uppercase;">Empresa</div>
                                                    <div style="margin-top:6px;font-size:15px;color:#ffffff;">{{ $lead->company_name ?: 'Sin empresa registrada' }}</div>
                                                </td>
                                                <td width="50%" style="padding:10px 0 10px 10px;vertical-align:top;">
                                                    <div style="font-size:12px;color:#8aa0c6;text-transform:uppercase;">Paquete / presupuesto</div>
                                                    <div style="margin-top:6px;font-size:15px;color:#ffffff;">
                                                        {{ $lead->interest_package ?: 'Sin paquete' }} / {{ $lead->budget_range ?: 'Sin presupuesto' }}
                                                    </div>
                                                </td>
                                            </tr>
                                            @if ($eventType === 'status_changed')
                                                <tr>
                                                    <td colspan="2" style="padding:10px 0 0;vertical-align:top;">
                                                        <div style="font-size:12px;color:#8aa0c6;text-transform:uppercase;">Cambio detectado</div>
                                                        <div style="margin-top:6px;font-size:15px;color:#ffffff;">
                                                            {{ $previousStatusName ?: 'Sin etapa anterior' }} -> {{ $currentStatusName }}
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        </table>
                                    </td>
                                </tr>
                            </table>

                            <div style="margin-top:22px;padding:22px 24px;background:rgba(92,225,230,.08);border:1px solid rgba(92,225,230,.12);border-radius:18px;">
                                <div style="font-size:12px;font-weight:700;letter-spacing:.08em;text-transform:uppercase;color:#5ce1e6;">Necesidad detectada</div>
                                <p style="margin:10px 0 0;font-size:15px;line-height:1.7;color:#e9edf7;">
                                    {{ $lead->needs_summary ?: 'No se registró una necesidad o mensaje adicional para este lead.' }}
                                </p>
                            </div>

                            <table width="100%" cellpadding="0" cellspacing="0" style="margin-top:28px;">
                                <tr>
                                    <td align="center">
                                        <a href="{{ $pipelineUrl }}" style="display:inline-block;padding:14px 24px;border-radius:999px;background:#5ce1e6;color:#07111f;text-decoration:none;font-weight:800;margin-right:10px;">
                                            Abrir pipeline
                                        </a>
                                        <a href="{{ $contactsUrl }}" style="display:inline-block;padding:14px 24px;border-radius:999px;background:#1c2a45;color:#ffffff;text-decoration:none;font-weight:700;border:1px solid rgba(255,255,255,.12);">
                                            Ver contactos
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding:20px 34px 30px;font-size:12px;line-height:1.7;color:#8aa0c6;text-align:center;">
                            Este aviso se envió automáticamente desde el CRM de Orale Web cuando un lead fue creado o cambió de estatus.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
