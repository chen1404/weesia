<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Weesia @yield('title')</title>
    <link rel="icon picture" href="img/logo/code.png">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="{{ asset('style/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('stylesheet/style.css') }}" rel="stylesheet" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
        <div class="container">
            <a href="#" class="navbar-brand">
                <img src="{{ asset('img/logo/weesia.svg') }}" alt="logo" />
            </a>
            @if (Auth::user())
                <span class="fs-4">Selamat Datang <b>{{ Auth::user()->name ?? 'HomePage' }}</b></span>
            @endif
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a href="#" class="nav-link">Home</a>
                    </li>
                    @if (Auth::user())
                        @if (Auth::user()->level == 'admin' || Auth::user()->level == 'elder' || Auth::user()->level == 'member')
                            <li class="nav-item">
                                <a href="/member" class="nav-link" aria-current="page">Member</a>
                            </li>
                        @endif
                        @if (Auth::user()->role == 'pembeli')
                            <li class="nav-item">
                                <a href="{{ route('user.transaksi') }}" class="nav-link" aria-current="page">Profil</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pembeli.keranjang') }}" class="nav-link" aria-current="page">Keranjang &nbsp;&nbsp;
                                    <img src="/images/icon-cart-filled.svg" alt="" />
                                    <div class="card-badge">{{ $keranjang }}</div>
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a href="/register" class="nav-link">Sign Up</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        @php $stat = Auth::user() ? 'logout' : 'login' @endphp
                        <a class="btn btn-primary" href="/auth/logout" class="nav-link " aria-current="page">
                            {{ ucfirst($stat) }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <p class="pt-4 pb-2">2022 Copyright Weesia. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>


    <script src="js/register-role.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="/js/navbar-scroll.js"></script>
</body>
</html>

