<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Weesia - 503</title>
    <link rel="icon picture" href="{{ asset('img/logo/code.png') }}">

    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex justify-center border-dark border-b shadow-lg py-2">
        <h1 class="font-bold text-2xl">503 Service Unavailable</h1>
    </div>
    <div class="flex justify-center mt-3">
        <p class="text-sm">layanan tidak dapat digunakan, coba lagi nanti</p>
    </div>
</body>
</html>

{{-- @extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __('Service Unavailable')) --}}