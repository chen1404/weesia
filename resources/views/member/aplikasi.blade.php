@extends('layouts.pages.member')

@section('title')
    Aplikasi
@endsection

@section('active_aplikasi')
    active-page
@endsection

@section('content')
    <!-- Hero Section -->
    <section id="home" class="h-[300px] sm:h-[400px] lg:h-screen bg-app-bg bg-center bg-cover lg:z-10 lg:relative">
        <div class="dark-bg-20 h-full">
            <div class="sm:container flex flex-col justify-end h-full">
                <div class="text-white pl-4 sm:pl-0 pb-3 sm:pb-12 lg:pb-24 flex flex-col justify-evenly 2xl:justify-center lg:justify-between h-[48%] sm:h-[45%] lg:h-[40%] xl:h-[45%]">
                    <h1 class="font-bold text-2xl md:text-3xl lg:text-4xl xl:text-5xl lg:mb-8">Weesia Aplikasi</h1>
                    <div class="flex flex-col justify-between lg:block h-[47%] md:h-[54%] lg:h-3/4 xl:h-[70%]">
                        <div class="lg:mb-8">
                            <a href="#aplikasi" class="font-medium md:text-xl xl:text-2xl px-2 xl:px-3 py-0.5 mr-0.5 lg:mr-3 rounded-md lg:rounded-lg border-primary border-2 lg:border-[2.5px] hover:bg-primary">Aplikasi</a>
                            <a href="#Clone" class="font-medium md:text-xl xl:text-2xl px-2 xl:px-3 py-1 rounded-md lg:rounded-lg bg-primary hover:bg-opacity-60">Cloning App</a>
                        </div>
                        <div class="">
                            <a href="#Line" class="font-medium md:text-xl xl:text-2xl px-2 xl:px-3 py-1 rounded-md lg:rounded-lg bg-primary hover:bg-opacity-60">Line App</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Section -->

    <!-- Main Section -->
    <section id="aplikasi" class="bg-light pb-14">
        <div class="sm:container px-4">
            <div class="flex flex-col h-auto">
                <h1 id="all-app" class="font-bold text-2xl lg:text-3xl xl:text-4xl text-center pt-5 lg:mb-7">Aplikasi</h1>
                <div class="mt-5 w-full block lg:hidden">
                    @if (Auth::user()->level == 'admin')
                        <a href="/member/aplikasi/create">
                            <div class="border border-sky-500 bg-sky-500 hover:bg-sky-600 text-white hover:cursor-pointer px-3 py-1 mb-3 mr-3 rounded-xl font-semibold float-left">
                                <div>Tambah Aplikasi</div>
                            </div>
                        </a>
                    @endif
                    <div onclick="sortApp(['Line', 'Clone', 'Other'], '*', 'byAll');" class="border-primary hover:bg-primary hover:text-white hover:cursor-pointer border px-3 py-1 mb-3 mr-3 rounded-xl font-semibold float-left">
                        <div>Semua Aplikasi</div>
                    </div>
                    <div onclick="sortApp(['Line', 'Clone', 'Other'], 'Clone', 'byOne');" class="border-primary hover:bg-primary hover:text-white hover:cursor-pointer border px-3 py-1 mb-3 mr-3 rounded-xl font-semibold float-left">
                        <div>Aplikasi Cloning</div>
                    </div>
                    <div onclick="sortApp(['Line', 'Clone', 'Other'], 'Line', 'byOne');" class="border-primary hover:bg-primary hover:text-white hover:cursor-pointer border px-3 py-1 mb-3 mr-3 rounded-xl font-semibold float-left">
                        <div>Aplikasi Line</div>
                    </div>
                </div>

                    <!-- Other Application -->
                    <div id="Other" class="flex flex-col lg:flex-row justify-evenly lg:justify-start lg:w-[80%] lg:flex-wrap h-[25%] lg:h-auto">
                        @foreach ($applications as $application)
                            @if($application->category == 'Other')
                                <div class="text-black group flex justify-between items-center bg-white rounded-md border border-gray lg:mr-6 lg:mb-5 lg:relative">
                                    <div class="dark-bg-80 absolute hidden lg:group-hover:flex flex-col justify-center items-center rounded-md w-full h-full">
                                        <a href="{{ $application->link }}" class="px-3 py-1 border flex justify-between w-[62%] items-start rounded-md border-white hover:bg-primary hover:border-primary transition duration-500">
                                            <div class="w-[20px]">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="#FFFFFF" viewBox="0 0 24 24">
                                                    <path d="M21,14a1,1,0,0,0-1,1v4a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V15a1,1,0,0,0-2,0v4a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V15A1,1,0,0,0,21,14Zm-9.71,1.71a1,1,0,0,0,.33.21.94.94,0,0,0,.76,0,1,1,0,0,0,.33-.21l4-4a1,1,0,0,0-1.42-1.42L13,12.59V3a1,1,0,0,0-2,0v9.59l-2.29-2.3a1,1,0,1,0-1.42,1.42Z"/>
                                                </svg>
                                            </div>
                                            <p class="text-white font-semibold">Download</p>
                                        </a>
                                        @if (Auth::user()->level == 'admin')
                                            <a href="/member/aplikasi/update/{{ $application->id }}" class="px-3 py-1 border flex justify-evenly w-[62%] items-center rounded-md border-white hover:bg-amber-400 hover:border-amber-400 transition duration-500 my-6">
                                                <div class="w-[20px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                </div>
                                                <p class="text-white font-semibold">Update</p>
                                            </a>
                                            <form action="/member/aplikasi/delete/{{ $application->id }}" method="post" class="w-[62%]">
                                                @csrf
                                                @method('delete')
                                                <button class="px-3 py-1 border flex justify-evenly w-full items-center rounded-md border-white hover:bg-red-600 hover:border-red-600 hover:cursor-pointer transition duration-500">
                                                    <div class="w-[20px]">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </div>
                                                    <p class="text-white font-semibold">Delete</p>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                    <div class="py-2 px-3 flex justify-between items-center w-full lg:block">
                                        <div class="flex flex-row lg:flex-col items-center lg:items-start lg:p-4 lg:w-[200px] lg:h-[220px]">
                                            <div class="w-[50px] lg:w-[80px] mr-3">
                                                <img src="/img/logo/aplikasi/{{ $application->image }}" alt="Logo Aplikasi" class="rounded-xl">
                                            </div>
                                            <div>
                                                <h3 class="font-semibold text-xl lg:text-2xl">{{ $application->name }}</h3>
                                                <p class="font-light lg:text-lg">Versi {{ $application->version }}</p>
                                            </div>
                                        </div>
                                        <div class="w-[40px] hidden lg:flex flex-row justify-evenly m-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="7px" fill="#D9D9D9" viewBox="0 0 512 512"><path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512z"/></svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="7px" fill="#D9D9D9" viewBox="0 0 512 512"><path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512z"/></svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="7px" fill="#D9D9D9" viewBox="0 0 512 512"><path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512z"/></svg>
                                        </div>
                                        <div class="flex justify-end">
                                            <a href="{{ $application->link }}" class="w-[40px] block lg:hidden">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="hover:fill-primary" viewBox="0 0 24 24">
                                                    <path d="M21,14a1,1,0,0,0-1,1v4a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V15a1,1,0,0,0-2,0v4a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V15A1,1,0,0,0,21,14Zm-9.71,1.71a1,1,0,0,0,.33.21.94.94,0,0,0,.76,0,1,1,0,0,0,.33-.21l4-4a1,1,0,0,0-1.42-1.42L13,12.59V3a1,1,0,0,0-2,0v9.59l-2.29-2.3a1,1,0,1,0-1.42,1.42Z"/>
                                                </svg>
                                            </a>
                                            @if (Auth::user()->level == 'admin')
                                                <a href="/member/aplikasi/update/{{ $application->id }}" class="w-[40px] block lg:hidden">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="hover:stroke-amber-400" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                                        <path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                                    </svg>
                                                </a>
                                                <form action="/member/aplikasi/delete/{{ $application->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="w-[40px] block lg:hidden">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="hover:stroke-red-600" stroke="#000000" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <!-- End Other Application -->

                    <!-- Cloning Application -->
                    <div id="Clone" class="block">
                        <h2 class="font-medium text-2xl pt-5 pb-3 lg:pt-12 lg:pb-5">Aplikasi Cloning</h2>
                        <div class="flex flex-col lg:flex-row justify-evenly lg:justify-start lg:w-[80%] lg:flex-wrap h-[25%] lg:h-auto">
                            @foreach ($applications as $application)
                                @if($application->category == 'Clone')
                                    <div class="text-black group flex justify-between items-center bg-white rounded-md border border-gray lg:mr-6 lg:mb-5 lg:relative">
                                        <div class="dark-bg-80 absolute hidden lg:group-hover:flex flex-col justify-center items-center rounded-md w-full h-full">
                                            <a href="{{ $application->link }}" class="px-3 py-1 border flex justify-between w-[62%] items-start rounded-md border-white hover:bg-primary hover:border-primary transition duration-500">
                                                <div class="w-[20px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#FFFFFF" viewBox="0 0 24 24">
                                                        <path d="M21,14a1,1,0,0,0-1,1v4a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V15a1,1,0,0,0-2,0v4a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V15A1,1,0,0,0,21,14Zm-9.71,1.71a1,1,0,0,0,.33.21.94.94,0,0,0,.76,0,1,1,0,0,0,.33-.21l4-4a1,1,0,0,0-1.42-1.42L13,12.59V3a1,1,0,0,0-2,0v9.59l-2.29-2.3a1,1,0,1,0-1.42,1.42Z"/>
                                                    </svg>
                                                </div>
                                                <p class="text-white font-semibold">Download</p>
                                            </a>
                                            @if (Auth::user()->level == 'admin')
                                                <a href="/member/aplikasi/update/{{ $application->id }}" class="px-3 py-1 border flex justify-evenly w-[62%] items-center rounded-md border-white hover:bg-amber-400 hover:border-amber-400 transition duration-500 my-6">
                                                    <div class="w-[20px]">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                    </div>
                                                    <p class="text-white font-semibold">Update</p>
                                                </a>
                                                <form action="/member/aplikasi/delete/{{ $application->id }}" method="post" class="w-[62%]">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="px-3 py-1 border flex justify-evenly w-full items-center rounded-md border-white hover:bg-red-600 hover:border-red-600 hover:cursor-pointer transition duration-500">
                                                        <div class="w-[20px]">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        </div>
                                                        <p class="text-white font-semibold">Delete</p>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                        <div class="py-2 px-3 flex justify-between items-center w-full lg:block">
                                            <div class="flex flex-row lg:flex-col items-center lg:items-start lg:p-4 lg:w-[200px] lg:h-[220px]">
                                                <div class="w-[50px] lg:w-[80px] mr-3">
                                                    <img src="/img/logo/aplikasi/{{ $application->image }}" alt="Logo Multi Parallel" class="rounded-xl">
                                                </div>
                                                <div>
                                                    <h3 class="font-semibold text-xl lg:text-2xl">{{ $application->name }}</h3>
                                                    <p class="font-light lg:text-lg">Versi {{ $application->version }}</p>
                                                </div>
                                            </div>
                                            <div class="w-[40px] hidden lg:flex flex-row justify-evenly m-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="7px" fill="#D9D9D9" viewBox="0 0 512 512"><path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512z"/></svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="7px" fill="#D9D9D9" viewBox="0 0 512 512"><path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512z"/></svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="7px" fill="#D9D9D9" viewBox="0 0 512 512"><path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512z"/></svg>
                                            </div>
                                            <div class="flex justify-end">
                                                <a href="{{ $application->link }}" class="w-[40px] block lg:hidden">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="hover:fill-primary" viewBox="0 0 24 24">
                                                        <path d="M21,14a1,1,0,0,0-1,1v4a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V15a1,1,0,0,0-2,0v4a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V15A1,1,0,0,0,21,14Zm-9.71,1.71a1,1,0,0,0,.33.21.94.94,0,0,0,.76,0,1,1,0,0,0,.33-.21l4-4a1,1,0,0,0-1.42-1.42L13,12.59V3a1,1,0,0,0-2,0v9.59l-2.29-2.3a1,1,0,1,0-1.42,1.42Z"/>
                                                    </svg>
                                                </a>
                                                @if (Auth::user()->level == 'admin')
                                                    <a href="/member/aplikasi/update/{{ $application->id }}" class="w-[40px] block lg:hidden">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="hover:stroke-amber-400" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                                            <path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                                        </svg>
                                                    </a>
                                                    <form action="/member/aplikasi/delete/{{ $application->id }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="w-[40px] block lg:hidden">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="hover:stroke-red-600" stroke="#000000" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- End Cloning Application -->

                    <!-- Line Application -->
                    <div id="Line" class="lg:w-[80%] block">
                        <h2 class="font-medium text-2xl pt-5 pb-3 lg:pt-12 lg:pb-5">Aplikasi Line</h2>
                        <div>
                            @foreach ($applications as $application)
                                @if($application->category == 'Line')
                                    <div class="bg-white hover:bg-gray group float-left shadow-2xl rounded-xl mr-4 lg:mr-6 mb-5 lg:relative">
                                        <div class="dark-bg-80 absolute hidden lg:group-hover:flex flex-col justify-center items-center rounded-md w-full h-full">
                                            <a href="{{ $application->link }}" class="px-3 py-1 border flex justify-between w-[62%] items-start rounded-md border-white hover:bg-primary hover:border-primary transition duration-500">
                                                <div class="w-[20px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#FFFFFF" viewBox="0 0 24 24">
                                                        <path d="M21,14a1,1,0,0,0-1,1v4a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V15a1,1,0,0,0-2,0v4a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V15A1,1,0,0,0,21,14Zm-9.71,1.71a1,1,0,0,0,.33.21.94.94,0,0,0,.76,0,1,1,0,0,0,.33-.21l4-4a1,1,0,0,0-1.42-1.42L13,12.59V3a1,1,0,0,0-2,0v9.59l-2.29-2.3a1,1,0,1,0-1.42,1.42Z"/>
                                                    </svg>
                                                </div>
                                                <p class="text-white font-semibold">Download</p>
                                            </a>
                                            @if (Auth::user()->level == 'admin')
                                                <a href="/member/aplikasi/update/{{ $application->id }}" class="px-3 py-1 border flex justify-evenly w-[62%] items-center rounded-md border-white hover:bg-amber-400 hover:border-amber-400 transition duration-500 my-6">
                                                    <div class="w-[20px]">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                    </div>
                                                    <p class="text-white font-semibold">Update</p>
                                                </a>
                                                <form action="/member/aplikasi/delete/{{ $application->id }}" method="post" class="w-[62%]">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="px-3 py-1 border flex justify-evenly w-full items-center rounded-md border-white hover:bg-red-600 hover:border-red-600 hover:cursor-pointer transition duration-500">
                                                        <div class="w-[20px]">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20px" fill="none" stroke="#FFFFFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        </div>
                                                        <p class="text-white font-semibold">Delete</p>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                        <div class="flex justify-between">
                                            <a href="{{ $application->link }}">
                                                <div class="py-4 lg:py-6 pl-6 lg:px-6">
                                                    <div class="lg:mr-20 lg:mb-5">
                                                        <div class="w-[50px] lg:w-[80px]">
                                                            <img src="/img/logo/aplikasi/{{ $application->image }}" alt="Logo Line" class="rounded-xl">
                                                        </div>
                                                        <h3 class="font-semibold text-xl lg:text-2xl">{{ $application->name }}</h3>
                                                        <p class="font-light lg:text-lg">Versi {{ $application->version }}</p>
                                                    </div>
                                                    <div class="w-[40px] hidden lg:flex flex-row justify-evenly">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="7px" fill="#D9D9D9" viewBox="0 0 512 512"><path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512z"/></svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="7px" fill="#D9D9D9" viewBox="0 0 512 512"><path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512z"/></svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="7px" fill="#D9D9D9" viewBox="0 0 512 512"><path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512z"/></svg>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="flex lg:hidden flex-col justify-between py-4 pr-6">
                                                @if (Auth::user()->level == 'admin')
                                                    <a href="/member/aplikasi/update/{{ $application->id }}" class="w-[40px] block lg:hidden">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="hover:stroke-amber-400" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                                            <path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                                        </svg>
                                                    </a>
                                                    <form action="/member/aplikasi/delete/{{ $application->id }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="w-[40px] block lg:hidden">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="hover:stroke-red-600" stroke="#000000" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- End Line Application -->

            </div>
        </div>
    </section>
    <!-- End Main Section -->

    <!-- Sort Option -->
    <section id="sorting" class="hidden lg:block fixed right-24 2xl:right-56 bottom-72">
        <div class="flex flex-col items-end">
            @if (Auth::user()->level == 'admin')
                <a href="/member/aplikasi/create" class="mb-6">
                    <div class="inline border text-sm font-semibold bg-sky-500 hover:bg-sky-600 text-white transition duration-300 px-3 py-1 rounded-xl">
                        Tambah Aplikasi
                    </div>
                </a>
            @endif
            <div onclick="sortApp(['Line', 'Clone', 'Other'], '*', 'byAll');" class="inline border text-sm font-semibold hover:cursor-pointer hover:bg-primary hover:text-white transition duration-300 border-primary px-3 py-1 rounded-xl">
                Semua Aplikasi
            </div>
            <div onclick="sortApp(['Line', 'Clone', 'Other'], 'Clone', 'byOne');" class="inline border text-sm font-semibold hover:cursor-pointer hover:bg-primary hover:text-white transition duration-300 border-primary px-3 py-1 my-6 rounded-xl">
                Aplikasi Cloning
            </div>
            <div onclick="sortApp(['Line', 'Clone', 'Other'], 'Line', 'byOne');" class="inline border text-sm font-semibold hover:cursor-pointer hover:bg-primary hover:text-white transition duration-300 border-primary px-3 py-1 rounded-xl">
                Aplikasi Line
            </div>
        </div>
    </section>
    <!-- End Sort Option -->
@endsection

@section('js-extend')
    <script src="{{ asset('js/sort-app.js') }}"></script>
@endsection