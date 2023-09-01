@extends('layouts.pages.member')

@section('title')
    Home
@endsection

@section('active_home')
    active-page
@endsection

@section('content')
    <!-- Hero Section -->
    <section id="home" class="pt-16 sm:pt-30 bg-white">
        <div class="sm:container p-4">
            <div class="sm:hidden text-center">
                <h1 class="text-dark text-2xl font-bold">Selamat bergabung dengan<br>Weesia Member</h1>
            </div>
            <div class="flex flex-wrap sm:justify-between items-center mt-7 sm:mt-0 relative">
                <div class="w-1/2 xs:w-full xs:px-12 sm:mt-0 pr-6 sm:pr-0 lg:pr-20">
                    <h1 class="hidden sm:block text-dark text-2xl lg:text-4xl xl:text-5xl font-bold">Selamat bergabung dengan
                    </h1>
                    <h1 class="hidden sm:block text-dark text-2xl lg:text-4xl xl:text-5xl font-bold sm:mt-0 md:mt-3 lg:mt-5">
                        Weesia Member</h1>
                    <p class="text-sm md:text-sm xl:text-lg font-semibold sm:text-start text-center text-dark my-5">Weesia
                        Member adalah sebuah platform menambah pemasukan dengan kerja sampingan yang dapat kerja dari mana
                        saja dan kapan saja</p>
                    <div class="flex flex-wrap justify-evenly sm:justify-start">
                        <a href="#benefit"
                            class="border-[1px] rounded-md border-primary px-[12px] sm:px-[15px] py-[2px] my-1 sm:my-0 hover:text-white font-medium text-sm md:text-base xl:text-xl bg-opacity-20 bg-primary hover:bg-opacity-100 transition duration-700 mr-0 sm:mr-4">Benefit</a>
                        <a href="#modal"
                            class="border-[1px] rounded-md border-primary px-[10px] sm:px-[12px] py-[2px] my-1 sm:my-0 hover:text-white font-medium text-sm md:text-base xl:text-xl bg-opacity-20 bg-primary hover:bg-opacity-100 transition duration-700">Modal</a>
                    </div>
                </div>
                <div class="w-1/2 xs:hidden lg:hidden flex justify-center sm:justify-end absolute right-0 bottom-0 top-0">
                    <span class="h-auto rounded-t-md bg-primary">
                        <img src="{{ asset('img/person/person.png') }}" alt="Person" class="h-full w-full">
                    </span>
                </div>
                <div class="w-1/2 lg:h-[350px] xl:h-[450px] hidden lg:flex justify-end relative">
                    <span
                        class="w-[70%] md:w-[55%] 2xl:w-[45%] h-[95%] lg:h-[90%] rounded-t-md bg-primary absolute bottom-0 right-2 lg:right-0"></span>
                    <img src="{{ asset('img/person/person.png') }}" alt="Person"
                        class="h-full w-auto absolute md:-top-15 bottom-0 lg:top-0">
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Section -->

    <!-- About Section -->
    <section class="bg-secondary mt-24 py-8">
        <div class="sm:container p-4 md:px-36 lg:px-64 flex items-center">
            <h1 class="font-bold text-2xl lg:text-4xl">Weesia</h1>
            <div class="border-r-[3px] md:border-r-4 border-primary w-16 h-24 md:h-28 lg:h-32"></div>
            <p id="modal" class="font-semibold text-[10px] md:text-sm xl:text-lg ml-4">askjfhnasSederhananya bisnis ini
                bergerak
                dibidang yaitu menaikkan jumlah followers dari official account Line secara manual. Kita hanya perlu membuat
                Akun Line sebanyak-banyaknya dengan cara yang telah ditentukan.</p>
        </div>
    </section>
    <!-- End About Section -->

    <!-- Modal Section -->
    <section id="modall" class="bg-white">
        <div class="sm:container px-4 xl:px-64 py-16">
            <h1 class="font-bold text-2xl lg:text-4xl text-center">Modal</h1>
            <div class="flex flex-row justify-between mt-7">
                <div class="flex flex-col text-center justify-center items-center md:px-12 xl:px-8">
                    <div class="bg-primary py-2 rounded-lg bg-opacity-30 h-10 w-10 md:h-14 md:w-14">
                        <i class="fa-solid fa-sim-card text-primary text-2xl md:text-4xl"></i>
                    </div>
                    <h2 class="font-bold text-base md:text-lg mt-3">SIM Card</h2>
                    <p class="text-[8px] lg:text-xs font-medium">Nomor Hp yang aktif diperlukan untuk selangkah menjadi
                        bagian dari kami!</p>
                </div>
                <div class="flex flex-col text-center justify-center items-center md:px-12 xl:px-8">
                    <div class="bg-primary py-2 rounded-lg bg-opacity-30 h-10 w-10 md:h-14 md:w-14">
                        <i class="fa-solid fa-mobile-screen text-primary text-2xl md:text-4xl"></i>
                    </div>
                    <h2 class="font-bold text-base md:text-lg mt-3">Handphone</h2>
                    <p class="text-[8px] lg:text-xs font-medium">Pastikan Hp yang dimiliki Hp Android yah. Dan Hpnya milik
                        pribadi bukan punya mantan!</p>
                </div>
                <div class="flex flex-col text-center justify-center items-center md:px-12 xl:px-8">
                    <div class="bg-primary py-2 rounded-lg bg-opacity-30 h-10 w-10 md:h-14 md:w-14">
                        <i class="fa-solid fa-sd-card text-primary text-2xl md:text-4xl"></i>
                    </div>
                    <h2 class="font-bold text-base md:text-lg mt-3">Memory</h2>
                    <p class="text-[8px] lg:text-xs font-medium">Pastikan Hp yang digunakan memiliki memori internal yang
                        tersisa minimal 5 Gb!</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Modal Section -->

    <!-- Benefit Section -->
    <section id="benefit" class="bg-primary flex justify-center text-center py-12">
        <div class="sm:container">
            <h1 class="font-bold text-2xl lg:text-4xl text-center">Benefit yang didapat</h1>
            <div class="flex justify-center">
                <ul class="text-start px-11 mt-4 lg:mt-7">
                    <li class="font-bold text-sm mb-2 md:mb-4"><i class="fa-solid fa-circle-check"></i> Jam Kerja Fleksibel
                    </li>
                    <li class="font-bold text-sm mb-2 md:mb-4"><i class="fa-solid fa-circle-check"></i> Bonus</li>
                    <li class="font-bold text-sm mb-2 md:mb-4"><i class="fa-solid fa-circle-check"></i> Menambah Relasi</li>
                    <li class="font-bold text-sm mb-2 md:mb-4"><i class="fa-solid fa-circle-check"></i> Gaji</li>
                    <li class="font-bold text-sm mb-2 md:mb-4"><i class="fa-solid fa-circle-check"></i> Kerja dari mana saja
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- End Benefit Section -->
@endsection
