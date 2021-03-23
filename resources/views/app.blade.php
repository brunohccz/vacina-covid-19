<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="theme-color" content="#8257E5"/>

    <link rel="icon" href="{{ asset('favicon.png') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <title>{{ config('app.name') }}</title>
</head>
<body>
<div id="app">
    <router-view/>
</div>
</body>
<script src="{{ mix('js/app.js') }}"></script>
</html>
