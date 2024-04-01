<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script src="{{ asset('js/task-actions.js') }}"></script>
    <title>{{ $title ?? 'Default Title' }}</title>
</head>
<body>
    <div class="container mx-auto px-4 py-2">
        @yield('content')
    </div>

    <script src="{{ asset('js/task-actions.js') }}"></script>
</body>
</html>
