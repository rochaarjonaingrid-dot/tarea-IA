<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saludo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            text-align: center;
        }
        .mensaje {
            font-size: 24px;
            color: #333;
            padding: 20px;
            background-color: #f0f8ff;
            border-radius: 8px;
            border: 1px solid #4a90d9;
        }
    </style>
</head>
<body>
    <h1>Página de Saludo</h1>
    <div class="mensaje">
        {{ $mensaje }}
    </div>
</body>
</html>