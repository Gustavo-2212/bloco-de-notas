<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloco de Notas</title>
    <link rel="stylesheet" href="{{ asset("assets/bootstrap/bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/fontawesome/css/all.min.css") }}">
    <link rel="shortcut icon" href="{{ asset("assets/images/favicon.png") }}" type="image/png">
</head>
<body>
    {{ $slot }}
    <script src="assets/bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>
