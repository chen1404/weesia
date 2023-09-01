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
<body class="@yield('body-class')">
    <!-- Header -->
    <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-20">
        <div class="sm:container px-4 w-full">
            <div class="flex items-center justify-between relative">
                <div class="">
                    <a href="/member" class="font-bold text-xl text-dark block my-6">WEESIA</a>
                </div>
                <div class="flex items-center px-4">
                    <nav id="nav-menu" class="hidden absolute py-5 bg-white shadow-xl rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                        <ul class="block lg:flex">
                            @if (Auth::user()->level != 'admin')
                                <li class="group">
                                    <a href="/member" class="navbar-menu @yield('active_home')">Home</a>
                                </li>
                            @endif
                            <li class="group">
                                <a href="/member/rekapan" class="navbar-menu @yield('active_rekapan')">Rekapan</a>
                            </li>
                            @if (Auth::user()->level == 'member')
                                <li class="group">
                                    <a href="/member/tutorial" class="navbar-menu @yield('active_tutorial')">Tutorial</a>
                                </li>
                            @endif
                            <li class="group">
                                <a href="/member/aplikasi" class="navbar-menu @yield('active_aplikasi')">Aplikasi</a>
                            </li>
                            @if (Auth::user()->level != 'admin')
                                <li class="group">
                                    <a href="/member/kontak" class="navbar-menu @yield('active_kontak')">Kontak</a>
                                </li>
                                <li class="group">
                                    <a href="/member/absen" class="navbar-menu @yield('active_absen')">Absen</a>
                                </li>
                            @endif
                            @if (Auth::user()->level == 'admin')
                                <li class="group">
                                    <a href="/dashboard/absen" class="navbar-menu @yield('active_absen')">Absen</a>
                                </li>
                                <li class="group">
                                    <a href="/dashboard/member" class="navbar-menu @yield('active_member')">Member</a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>

                <div class="mr-12 lg:mr-0">
                    <a href="/auth/logout" class="py-[6px] px-3 rounded-lg text-white hover:opacity-80 bg-primary text-base hover:cursor-pointer transition duration-700">Logout</a>
                </div>
                
                <button id="hamburger" name="hamburger" type="button" class="block absolute right-0 lg:hidden">
                    <span class="hamburger-line transition duration-700 ease-in-out origin-top-left"></span>
                    <span class="hamburger-line transition duration-700 ease-in-out"></span>
                    <span class="hamburger-line transition duration-700 ease-in-out origin-bottom-left"></span>
                </button>
            </div>
        </div>
    </header>
    <!-- End Header -->
    
    @yield('content')
    
    <!-- Footer Section -->
    <footer id="footer" class="bg-dark py-8">
        <div class="sm:container px-4">
            <div class="flex justify-center">
                <h3 class="text-white text-xs font-semibold text-center">copyright weesia 2022 all rights reserved.</h3>
            </div>
        </div>
    </footer>
    <!-- End Footer Section -->

    <script src="https://kit.fontawesome.com/a374d5ed26.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @yield('js-extend')
</body>
</head>