@extends('layouts.pages.member')

@section('title')
    Tutorial
@endsection

@section('active_tutorial')
    active-page
@endsection

@section('content')
    <!-- Hero Section -->
    <section id="tutorial" class="bg-line-bg bg-cover h-[300px] sm:h-[400px] lg:h-screen">
        <div class="px-4 pt-16 pb-12 lg:pb-36 dark-bg-20 h-full">
            <div class="sm:container flex justify-end flex-col h-full">
                <div class="flex justify-between 2xl:justify-center flex-col h-2/3 sm:h-1/2 lg:h-2/5">
                    <h1 class="font-bold text-white text-2xl md:text-3xl lg:text-4xl xl:text-5xl tracking-wide">Modul
                        Tutorial Line</h1>
                    <div class="flex flex-col justify-evenly h-3/5 lg:h-[56%]">
                        <a href="#line"
                            class="font-normal text-white text-xl md:text-2xl lg:text-[28px] hover:underline py-1 hover:rounded-lg no-underline transition duration-300 w-32 md:w-40 lg:w-44">
                            Clone Line</a>
                        <a href="#beberapaakun"
                            class="font-normal text-white text-xl md:text-2xl lg:text-[28px] hover:underline py-1 hover:rounded-lg no-underline transition duration-300 w-[228px] md:w-[280px] lg:w-80">
                            Beberapa Akun</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Section -->

    <!-- Line Section -->
    <section id="line" class="bg-secondary">
        <div class="sm:container p-5 md:py-20 xl:w-4/5 2xl:w-3/5">
            <a href="/member/tutorial/clone-line" class="">
                <div
                    class="bg-white group shadow-lg lg:shadow-none lg:hover:shadow-xl transition duration-500 p-4 rounded-lg h-[70%]">
                    <div class="flex flex-col md:flex-row justify-between h-full">
                        <img src="/img/tutorial/line-clone.jpg"
                            class="rounded-lg md:w-56 lg:w-72 group-hover:scale-95 transition duration-500"
                            alt="Gambar Line Clone">
                        <div class="flex flex-col justify-around h-[190px] md:w-3/5 md:h-auto md:justify-between">
                            <h3 class="font-normal lg:text-2xl">21:23 12 Agustus 2023</h3>
                            <div>
                                <h2 class="font-bold text-2xl md:text-3xl lg:text-4xl xl:text-5xl">Cara Clone Line</h2>
                                <h3 class="font-medium lg:text-2xl">Cara Clone Line Versi 13</h3>
                            </div>
                            <p class="font-light text-xs lg:text-base">Line adalah aplikasi pengirim pesan instan gratis
                                yang dapat digunakan pada berbagai perangkat elektronik, seperti telepon cerdas, tablet, dan
                                komputer. Pengguna Line bertukar teks, gambar, video dan audio, dan melakukan percakapan
                                VoIP dan konferensi video gratis.</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </section>
    <!-- End Line Section -->

    <!-- Multi Parallel Section -->
    <section id="beberapaakun" class="bg-white">
        <div class="sm:container p-5 md:pt-20 md:pb-[120px] xl:w-4/5">
            <div class="flex flex-col md:flex-row justify-between 2xl:justify-evenly">
                <a href="/member/tutorial/beberapa-akun">
                    <div
                        class="bg-white group border border-slate-300 lg:border-none transition duration-500 p-6 md:p-3 rounded-lg flex flex-col justify-between md:justify-start md:h-[110%] lg:w-full shadow-custom">
                        <div class="">
                            <img src="/img/tutorial/relieve-parallel.jpg"
                                class="rounded-lg md:w-[300px] lg:w-[400px] group-hover:scale-95 transition duration-500"
                                alt="Multi Parallel">
                            <h3 class="font-normal mt-1 md:text-sm lg:text-lg xl:text-xl">07:06 15 Agustus 2023</h3>
                        </div>
                        <div>
                            <h2 class="font-bold text-2xl md:text-xl lg:text-2xl xl:text-3xl">Beberapa Akun</h2>
                            <h3 class="font-medium md:text-sm lg:text-lg xl:text-xl">Cara menggunakan "Beberapa Akun"</h3>
                        </div>
                    </div>
                </a>
                <a href="/member/tutorial/relieve-bot-line">
                    <div
                        class="bg-white group border border-slate-300 lg:border-none transition duration-500 p-6 md:p-3 rounded-lg flex flex-col justify-between md:justify-start md:h-[110%] lg:w-full shadow-custom mt-5 md:mt-0 md:ml-5 lg:ml-0">
                        <div class="">
                            <img src="/img/tutorial/relieve-line.jpg"
                                class="rounded-lg md:w-[300px] lg:w-[400px] group-hover:scale-95 transition duration-500"
                                alt="Multi Parallel">
                            <h3 class="font-normal mt-1 md:text-sm lg:text-lg xl:text-xl">07:06 10 September 2022</h3>
                        </div>
                        <div>
                            <h2 class="font-bold text-2xl md:text-xl lg:text-2xl xl:text-3xl">Relieve Multi Parallel</h2>
                            <h3 class="font-medium md:text-sm lg:text-lg xl:text-xl">Relieve Bot Line</h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <!-- End Multi Parallel Section -->
@endsection
