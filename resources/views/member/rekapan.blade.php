@extends('layouts.pages.member')

@section('title')
    Rekapan
@endsection

@section('body-class')
    h-screen flex flex-col justify-between
@endsection

@section('active_rekapan')
    active-page
@endsection

@section('content')
    <!-- Rekap Section -->
    <section class="pt-20 pb-10 lg:py-14 lg:pt-28">
        <div class="sm:container px-4">
            <div class="flex flex-col-reverse lg:flex-row justify-between items-center lg:items-start">
                <div class="w-full lg:w-4/5 bggray bg-primary mt-6 lg:mt-0 rounded-[4px]">
                    @foreach ($recaps as $recap)
                        <div onclick="window.location='{{ $recap->link }}'" class="bg-white group hover:bg-slate-100 hover:cursor-pointer m-1 lg:m-3 p-4 lg:p-8 rounded-[4px] flex justify-between items-center">
                            <div>
                                <h4 class="font-bold text-sm lg:text-lg">{{ $recap->title }}</h4>
                                <p class="text-[10px] mt-4 font-medium lg:text-base">{{ $recap->date }}</p>
                            </div>
                            <div class="flex items-center">
                                @if (Auth::user()->level == 'admin')
                                {{-- <i class="fa-sharp fa-solid fa-circle-dot text-2xl lg:text-4xl"></i> --}}
                                    <a href="/member/rekapan/update/{{ $recap->id }}" title="Update" class="w-6 lg:w-9 block lg:hidden lg:group-hover:block hover:fill-amber-400 transition duration-300">
                                        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M256 512C397.4 512 512 397.4 512 256C512 114.6 397.4 0 256 0C114.6 0 0 114.6 0 256C0 397.4 114.6 512 256 512ZM256 352C203 352 160 309 160 256C160 203 203 160 256 160C309 160 352 203 352 256C352 309 309 352 256 352Z" />
                                        </svg>                                            
                                    </a>
                                    <form action="/member/rekapan/delete/{{ $recap->id }}" method="post" class="flex items-center lg:hidden lg:group-hover:flex hover:fill-red-600 transition duration-300 px-2 md:px-6 xl:px-8">
                                        @csrf
                                        @method('delete')
                                        {{-- <i class="fa-solid fa-circle-xmark text-2xl lg:text-4xl"></i> --}}
                                        <button title="Delete" class="w-6 lg:w-9">
                                            <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M256 512C397.4 512 512 397.4 512 256C512 114.6 397.4 0 256 0C114.6 0 0 114.6 0 256C0 397.4 114.6 512 256 512ZM175 175C184.4 165.6 199.6 165.6 208.9 175L255.9 222L302.9 175C312.3 165.6 327.5 165.6 336.8 175C346.1 184.4 346.2 199.6 336.8 208.9L289.8 255.9L336.8 302.9C346.2 312.3 346.2 327.5 336.8 336.8C327.4 346.1 312.2 346.2 302.9 336.8L255.9 289.8L208.9 336.8C199.5 346.2 184.3 346.2 175 336.8C165.7 327.4 165.6 312.2 175 302.9L222 255.9L175 208.9C165.6 199.5 165.6 184.3 175 175V175Z" />
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                                {{-- <i class=" fa-solid fa-circle-chevron-right text-2xl lg:text-4xl"></i> --}}
                                <a href="{{ $recap->link }}" title="View" class="w-6 lg:w-9 transition duration-300 fill-black hover:fill-green-600">
                                    <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 256C0 397.4 114.6 512 256 512C397.4 512 512 397.4 512 256C512 114.6 397.4 0 256 0C114.6 0 0 114.6 0 256ZM241 377C231.6 386.4 216.4 386.4 207.1 377C197.8 367.6 197.7 352.4 207.1 343.1L294.1 256.1L207.1 169.1C197.7 159.7 197.7 144.5 207.1 135.2C216.5 125.9 231.7 125.8 241 135.2L345 239C354.4 248.4 354.4 263.6 345 272.9L241 377Z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="flex flex-col w-full lg:w-1/3 lg:sticky lg:top-20">
                    <div class="w-full lg:w1/3 lg:h-[145px] lg:flex lg:justify-evenly lg:flex-col primary-opacity ml-0 lg:ml-4 text-center rounded-[4px] py-10 lg:py-4">
                        <h2 class="font-bold text-2xl">Rekapan Tugas</h2>
                        <h3 class="text-sm">Terakhir diubah <span class="font-bold">{{ $date }}</span></h3>
                        @if (Auth::user()->level == 'admin')
                            <div class="flex justify-center">
                                <a href="/member/rekapan/create" title="Create" class="bg-sky-500 hover:bg-sky-600 w-1/2 font-semibold py-2 px-4 rounded-md text-white lg:text-[10px] xl:text-[15px]">
                                    Tambah Tugas
                                </a>
                            </div>
                        @endif
                    </div>
                    @if(session('success'))
                        <div class="w-full lg:h-auto flex flex-row text-end bg-white custom-shadow rounded-[4px] hover:cursor-pointer py-4 mt-3 lg:ml-4 border-l-8 border-primary" id="alert" title="close" onclick="closeAlert()">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#1BBC9D" class="w-[45px] lg:w-[40px] xl:w-[50px] mx-6 lg:mx-2 xl:mx-6" viewBox="0 0 512 512">
                                <path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/>
                            </svg>
                            <div class="text-start">
                                <h2 class="font-bold text-xl lg:text-base xl:text-2xl">Success</h2>
                                <h2 class="font-medium text-sm lg:text-xs xl:text-sm">{!! session('success') !!}</h2>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- End Rekap Section -->
@endsection

@section('js-extend')
    <script src="{{ asset('js/close-alert.js') }}"></script>
@endsection