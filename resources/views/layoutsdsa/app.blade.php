<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
{{--    <script src="https://cdn.tailwindcss.com"></script>--}}
    <title></title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body>
<main>
    {{ $slot }}
</main>
</body>
<script src="{{ asset('js/app.js') }}"></script>
@livewireScripts
</html>
