<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon picture" href="{{ asset('img/logo/code.png') }}">
    <title>Weesia Member - @yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body>
    <!-- Form Section -->
    <section>
        <div class="flex justify-between h-screen">
            <div class="hidden sm:block h-screen w-[34%] @yield('bg-form') bg-cover">
            </div>
            <div class="w-full md:w-8/12 primary-opacity flex flex-col justify-center xl:items-center">
                <div class="flex flex-col mb-4">
                    <h1 class="font-bold text-[32px] lg:text-4xl text-center">@yield('form-title')</h1>
                    {{-- <h2 class="font-bold text-xl lg:text-2xl text-center">{{ $date }}</h2> --}}
                </div>
                @yield('content')
            </div>
        </div>
    </section>
    <!-- End Form Section -->

    @yield('extend-js')
</body>
</html>