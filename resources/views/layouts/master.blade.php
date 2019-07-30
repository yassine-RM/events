<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    {{-- appelle a le fichier app.css  --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>{{ $titre ? $titre.'-G-Events' : 'G-Events' }}</title>
</head>

<body>

    <div class="container" id="app">
        {{-- importer navbar de partials  --}}
        @include($nav)

        {{-- définit un content dynamique "content" --}}
        @yield('content')
    </div>
{{-- appelle a le fichier app.js  --}}
<script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
