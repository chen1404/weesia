<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Weesia - 500</title>
    <link rel="icon picture" href="{{ asset('img/logo/code.png') }}">

    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex justify-center border-dark border-b shadow-lg py-2">
        <h1 class="font-bold text-2xl">500 Internal Server Error</h1>
    </div>
    <div class="flex justify-center mt-3">
        <p class="text-sm">terjadi kesalahan pada server, laporkan kesalahan</p>
    </div>
</body>
</html>

{{-- @extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Server Error')) --}}