<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased tracking-tight text-sm">
        @inertia

        @env ('local')
{{--            <script src="http://localhost:8080/js/bundle.js"></script>--}}
{{--            <script src="http://datatable.test/js/bundle.js"></script>--}}
        @endenv
    </body>
</html>
