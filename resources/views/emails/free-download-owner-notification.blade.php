{{-- resources/views/emails/free-download-owner-notification.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Descarga Gratuita - Notificación</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #4f46e5;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .content {
            background-color: #f9fafb;
            padding: 30px;
            border: 1px solid #e5e7eb;
        }
        .footer {
            background-color: #374151;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 14px;
            border-radius: 0 0 8px 8px;
        }
        .info-box {
            background-color: #e0e7ff;
            border-left: 4px solid #4f46e5;
            padding: 15px;
            margin: 20px 0;
        }
        .downloader-info {
            background-color: white;
            padding: 15px;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>📥 Nueva Descarga Gratuita</h1>
    </div>

    <div class="content">
        <h2>¡Hola!</h2>
        
        <p>Te informamos que alguien ha descargado tu plano gratuito:</p>

        <div class="info-box">
            <h3>📋 Plano Descargado:</h3>
            <strong>{{ $blueprint->title }}</strong>
        </div>

        <div class="downloader-info">
            <h3>👤 Información del Descargador:</h3>
            <p><strong>Nombre:</strong> {{ $downloader['name'] }}</p>
            <p><strong>Email:</strong> {{ $downloader['email'] }}</p>
            @if(isset($downloader['whatsapp']) && $downloader['whatsapp'])
                <p><strong>WhatsApp:</strong> {{ $downloader['whatsapp'] }}</p>
            @endif
            <p><strong>Fecha de descarga:</strong> {{ now()->format('d/m/Y H:i') }}</p>
        </div>

        <p>Esta es una notificación automática para mantenerte informado sobre las descargas de tus planos gratuitos.</p>
    </div>

    <div class="footer">
        <p>© {{ date('Y') }} - Sistema de Planos Arquitectónicos</p>
    </div>
</body>
</html>