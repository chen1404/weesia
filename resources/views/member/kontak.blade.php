@extends('layouts.pages.member')

@section('title')
    Kontak
@endsection

{{-- <body class="h-screen flex flex-col justify-between"> --}}
    
@section('body-class')
    h-screen flex flex-col justify-between
@endsection
    
@section('active_kontak')
    active-page
@endsection

@section('content')
    <!-- Contact Section -->
    <section id="contact" class="pt-20">
        <div class="sm:container px-4">
            <div class="lg:flex justify-evenly">
                
                
                <div class="px-6 py-7 bg-gradient-to-br from-[#2AF598] to-[#15C9CC] lg:w-[540px] flex flex-col justify-center items-center rounded-2xl lg:hover:-translate-y-5 lg:relative lg:mx-3 my-5" style="transition: all .5s ease-in-out;">
                    <div class="w-[40%] mb-8">
                        <div class="h-0 pb-[100%] relative">
                            <img src="{{ asset('img/person/suhartini-1.jpeg') }}" alt="" class="rounded-full absolute h-full w-full block">
                        </div>
                    </div>
                    <h1 class="font-bold text-white text-3xl">SUHARTINI</h1>
                    <div class="flex flex-col justify-start w-full my-8">
                        <div class="flex items-center mb-5">
                            <span class="w-[10%] mr-3">
                                <svg id="Livello_1" data-name="Livello 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 240 240">
                                    <defs><linearGradient id="linear-gradient" x1="120" y1="240" x2="120" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#1d93d2"/><stop offset="1" stop-color="#38b0e3"/></linearGradient></defs><title>Telegram_logo</title><circle cx="120" cy="120" r="120" fill="url(#linear-gradient)"/><path d="M81.229,128.772l14.237,39.406s1.78,3.687,3.686,3.687,30.255-29.492,30.255-29.492l31.525-60.89L81.737,118.6Z" fill="#c8daea"/><path d="M100.106,138.878l-2.733,29.046s-1.144,8.9,7.754,0,17.415-15.763,17.415-15.763" fill="#a9c6d8"/><path d="M81.486,130.178,52.2,120.636s-3.5-1.42-2.373-4.64c.232-.664.7-1.229,2.1-2.2,6.489-4.523,120.106-45.36,120.106-45.36s3.208-1.081,5.1-.362a2.766,2.766,0,0,1,1.885,2.055,9.357,9.357,0,0,1,.254,2.585c-.009.752-.1,1.449-.169,2.542-.692,11.165-21.4,94.493-21.4,94.493s-1.239,4.876-5.678,5.043A8.13,8.13,0,0,1,146.1,172.5c-8.711-7.493-38.819-27.727-45.472-32.177a1.27,1.27,0,0,1-.546-.9c-.093-.469.417-1.05.417-1.05s52.426-46.6,53.821-51.492c.108-.379-.3-.566-.848-.4-3.482,1.281-63.844,39.4-70.506,43.607A3.21,3.21,0,0,1,81.486,130.178Z" fill="#fff"/>
                                </svg>
                            </span>
                            <h3 class="text-white font-semibold text-xl lg:text-2xl">@Suhartini14</h3>
                        </div>
                        <div class="flex items-center">
                            <span class="w-[10%] mr-3">
                                <svg viewBox="0 0 35 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="17" cy="16.1602" rx="15" ry="13" fill="white"/><path d="M17 0C8.16408 0 1 7.16408 1 16C1 24.8359 8.16408 32 17 32C25.8359 32 33 24.8359 33 16C33 7.16408 25.8359 0 17 0ZM25.4506 23.3469L24.1706 24.6269C23.942 24.8555 23.2727 24.9992 23.2498 24.9992C19.1976 25.0351 15.2955 23.4416 12.4286 20.5747C9.5551 17.698 7.95837 13.7829 8.00408 9.71428C8.00408 9.71102 8.15102 9.06122 8.37959 8.83592L9.65959 7.55592C10.1298 7.08571 11.0278 6.87347 11.6612 7.08245L11.9322 7.17388C12.5624 7.38612 13.222 8.08163 13.3951 8.72163L14.0384 11.0857C14.2114 11.729 13.9763 12.6433 13.5094 13.1102L12.6539 13.9657C13.4931 17.0743 15.9322 19.5135 19.0441 20.3559L19.8996 19.5004C20.3698 19.0302 21.2841 18.7951 21.9241 18.9682L24.2882 19.6147C24.9282 19.791 25.6237 20.4473 25.8359 21.0743L25.9273 21.3486C26.1298 21.9788 25.9175 22.88 25.4506 23.3469Z" fill="url(#paint0_linear_242_66)"/><defs><linearGradient id="paint0_linear_242_66" x1="17" y1="-5.56528e-07" x2="26.337" y2="25.8761" gradientUnits="userSpaceOnUse"><stop stop-color="#5DDF48"/><stop offset="1" stop-color="#63CE36"/></linearGradient></defs>
                                </svg>
                            </span>
                            <h3 class="text-white font-semibold text-xl lg:text-2xl">+6285342366682</h3>
                        </div>
                    </div>
                    <a href="https://t.me/Suhartini14" class="w-full my-3">
                        <div class="flex justify-center items-center rounded-xl bg-gradient-to-br from-[#38B0E3] to-[#1D93D2] hover:from-[#38B0E3] hover:to-[#38B0E3]">
                            <span class="w-[16%]">
                                <svg viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_242_68)"><path d="M14.3691 27.6315L18.6402 39.4533C18.6402 39.4533 19.1742 40.5594 19.746 40.5594C20.3178 40.5594 28.8225 31.7118 28.8225 31.7118L38.28 13.4448L14.5215 24.5799L14.3691 27.6315Z" fill="#C8DAEA"/><path d="M20.0315 30.6633L19.2116 39.3771C19.2116 39.3771 18.8684 42.0471 21.5378 39.3771C24.2072 36.7071 26.7623 34.6482 26.7623 34.6482" fill="#A9C6D8"/><path d="M14.4456 28.0534L5.65984 25.1908C5.65984 25.1908 4.60984 24.7648 4.94794 23.7988C5.01754 23.5996 5.15794 23.4301 5.57794 23.1388C7.52464 21.7819 41.6097 9.53077 41.6097 9.53077C41.6097 9.53077 42.5721 9.20647 43.1397 9.42217C43.2802 9.46564 43.4065 9.54563 43.5059 9.65395C43.6052 9.76227 43.674 9.89504 43.7052 10.0387C43.7666 10.2924 43.7922 10.5534 43.7814 10.8142C43.7787 11.0398 43.7514 11.2489 43.7307 11.5768C43.5231 14.9263 37.3107 39.9247 37.3107 39.9247C37.3107 39.9247 36.939 41.3875 35.6073 41.4376C35.2801 41.4482 34.954 41.3927 34.6486 41.2746C34.3433 41.1565 34.0648 40.978 33.8298 40.75C31.2165 38.5021 22.1841 32.4319 20.1882 31.0969C20.1432 31.0662 20.1053 31.0262 20.077 30.9796C20.0488 30.9331 20.0309 30.881 20.0244 30.8269C19.9965 30.6862 20.1495 30.5119 20.1495 30.5119C20.1495 30.5119 35.8773 16.5319 36.2958 15.0643C36.3282 14.9506 36.2058 14.8945 36.0414 14.9443C34.9968 15.3286 16.8882 26.7643 14.8896 28.0264C14.7458 28.0699 14.5937 28.0791 14.4456 28.0534Z" fill="white"/></g><defs><clipPath id="clip0_242_68"><rect width="50" height="50" fill="white"/></clipPath></defs>
                                </svg>                        
                            </span>
                            <h2 class="text-2xl lg:text-3xl font-semibold text-white">Add to Telegram</h2>
                        </div>
                    </a>
                    <h4 class="text-white text-base lg:text-lg"><span>&#128205;</span> Pengiriman Screenshot <strong>Clone</strong></h4>
                </div>
                
                <div class="px-6 py-7 bg-gradient-to-br from-[#ACB6E5] to-[#005AA7] lg:w-[540px] flex flex-col justify-center items-center rounded-2xl lg:hover:-translate-y-5 lg:relative lg:mx-3 my-5" style="transition: all .5s ease-in-out;">
                    <div class="w-[40%] mb-8">
                        <div class="h-0 pb-[100%] relative">
                            <img src="{{ asset('img/person/suhartini-2.jpeg') }}" alt="" class="rounded-full absolute h-full w-full block">
                        </div>
                    </div>
                    <h1 class="font-bold text-white text-3xl">SUHARTINI</h1>
                    <div class="flex flex-col justify-start w-full my-8">
                        <div class="flex items-center mb-5">
                            <span class="w-[10%] mr-3">
                                <svg id="Livello_1" data-name="Livello 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 240 240">
                                    <defs><linearGradient id="linear-gradient" x1="120" y1="240" x2="120" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#1d93d2"/><stop offset="1" stop-color="#38b0e3"/></linearGradient></defs><title>Telegram_logo</title><circle cx="120" cy="120" r="120" fill="url(#linear-gradient)"/><path d="M81.229,128.772l14.237,39.406s1.78,3.687,3.686,3.687,30.255-29.492,30.255-29.492l31.525-60.89L81.737,118.6Z" fill="#c8daea"/><path d="M100.106,138.878l-2.733,29.046s-1.144,8.9,7.754,0,17.415-15.763,17.415-15.763" fill="#a9c6d8"/><path d="M81.486,130.178,52.2,120.636s-3.5-1.42-2.373-4.64c.232-.664.7-1.229,2.1-2.2,6.489-4.523,120.106-45.36,120.106-45.36s3.208-1.081,5.1-.362a2.766,2.766,0,0,1,1.885,2.055,9.357,9.357,0,0,1,.254,2.585c-.009.752-.1,1.449-.169,2.542-.692,11.165-21.4,94.493-21.4,94.493s-1.239,4.876-5.678,5.043A8.13,8.13,0,0,1,146.1,172.5c-8.711-7.493-38.819-27.727-45.472-32.177a1.27,1.27,0,0,1-.546-.9c-.093-.469.417-1.05.417-1.05s52.426-46.6,53.821-51.492c.108-.379-.3-.566-.848-.4-3.482,1.281-63.844,39.4-70.506,43.607A3.21,3.21,0,0,1,81.486,130.178Z" fill="#fff"/>
                                </svg>
                            </span>
                            <h3 class="text-white font-semibold text-xl lg:text-2xl">@Artin0299</h3>
                        </div>
                        <div class="flex items-center">
                            <span class="w-[10%] mr-3">
                                <svg viewBox="0 0 35 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <ellipse cx="17" cy="16.1602" rx="15" ry="13" fill="white"/><path d="M17 0C8.16408 0 1 7.16408 1 16C1 24.8359 8.16408 32 17 32C25.8359 32 33 24.8359 33 16C33 7.16408 25.8359 0 17 0ZM25.4506 23.3469L24.1706 24.6269C23.942 24.8555 23.2727 24.9992 23.2498 24.9992C19.1976 25.0351 15.2955 23.4416 12.4286 20.5747C9.5551 17.698 7.95837 13.7829 8.00408 9.71428C8.00408 9.71102 8.15102 9.06122 8.37959 8.83592L9.65959 7.55592C10.1298 7.08571 11.0278 6.87347 11.6612 7.08245L11.9322 7.17388C12.5624 7.38612 13.222 8.08163 13.3951 8.72163L14.0384 11.0857C14.2114 11.729 13.9763 12.6433 13.5094 13.1102L12.6539 13.9657C13.4931 17.0743 15.9322 19.5135 19.0441 20.3559L19.8996 19.5004C20.3698 19.0302 21.2841 18.7951 21.9241 18.9682L24.2882 19.6147C24.9282 19.791 25.6237 20.4473 25.8359 21.0743L25.9273 21.3486C26.1298 21.9788 25.9175 22.88 25.4506 23.3469Z" fill="url(#paint0_linear_242_66)"/><defs><linearGradient id="paint0_linear_242_66" x1="17" y1="-5.56528e-07" x2="26.337" y2="25.8761" gradientUnits="userSpaceOnUse"><stop stop-color="#5DDF48"/><stop offset="1" stop-color="#63CE36"/></linearGradient></defs>
                                </svg>
                            </span>
                            <h3 class="text-white font-semibold text-xl lg:text-2xl">+6285242646228</h3>
                        </div>
                    </div>
                    <a href="https://t.me/Artin0299" class="w-full my-3">
                        <div class="flex justify-center items-center rounded-xl bg-gradient-to-br from-[#38B0E3] to-[#1D93D2] hover:from-[#38B0E3] hover:to-[#38B0E3]">
                            <span class="w-[15%]">
                                <svg viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_242_68)"><path d="M14.3691 27.6315L18.6402 39.4533C18.6402 39.4533 19.1742 40.5594 19.746 40.5594C20.3178 40.5594 28.8225 31.7118 28.8225 31.7118L38.28 13.4448L14.5215 24.5799L14.3691 27.6315Z" fill="#C8DAEA"/><path d="M20.0315 30.6633L19.2116 39.3771C19.2116 39.3771 18.8684 42.0471 21.5378 39.3771C24.2072 36.7071 26.7623 34.6482 26.7623 34.6482" fill="#A9C6D8"/><path d="M14.4456 28.0534L5.65984 25.1908C5.65984 25.1908 4.60984 24.7648 4.94794 23.7988C5.01754 23.5996 5.15794 23.4301 5.57794 23.1388C7.52464 21.7819 41.6097 9.53077 41.6097 9.53077C41.6097 9.53077 42.5721 9.20647 43.1397 9.42217C43.2802 9.46564 43.4065 9.54563 43.5059 9.65395C43.6052 9.76227 43.674 9.89504 43.7052 10.0387C43.7666 10.2924 43.7922 10.5534 43.7814 10.8142C43.7787 11.0398 43.7514 11.2489 43.7307 11.5768C43.5231 14.9263 37.3107 39.9247 37.3107 39.9247C37.3107 39.9247 36.939 41.3875 35.6073 41.4376C35.2801 41.4482 34.954 41.3927 34.6486 41.2746C34.3433 41.1565 34.0648 40.978 33.8298 40.75C31.2165 38.5021 22.1841 32.4319 20.1882 31.0969C20.1432 31.0662 20.1053 31.0262 20.077 30.9796C20.0488 30.9331 20.0309 30.881 20.0244 30.8269C19.9965 30.6862 20.1495 30.5119 20.1495 30.5119C20.1495 30.5119 35.8773 16.5319 36.2958 15.0643C36.3282 14.9506 36.2058 14.8945 36.0414 14.9443C34.9968 15.3286 16.8882 26.7643 14.8896 28.0264C14.7458 28.0699 14.5937 28.0791 14.4456 28.0534Z" fill="white"/></g><defs><clipPath id="clip0_242_68"><rect width="50" height="50" fill="white"/></clipPath></defs>
                                </svg>                        
                            </span>
                            <h2 class="text-2xl lg:text-3xl font-semibold text-white">Add to Telegram</h2>
                        </div>
                    </a>
                    <h4 class="text-white text-base lg:text-lg"><span>&#128205;</span> Pengiriman Screenshot <strong>Bot</strong></h4>
                </div>


            </div>
        </div>
    </section>
    <!-- End Contact Section -->
@endsection