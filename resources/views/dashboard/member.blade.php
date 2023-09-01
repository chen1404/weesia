@extends('layouts.pages.member')

@section('title')
    Admin Dashboard
@endsection
    
@section('body-class')
    h-screen bg-light flex flex-col justify-between
@endsection

@section('active_member')
    active-page
@endsection

@section('content')
    <main>
        <!-- Hero Section -->
        <section class="pt-20 lg:pt-24">
            <div class="sm:container px-4">
                <div class="">
                    <div class="text-center lg:text-start">
                        <h2 class="font-medium text-xl lg:text-2xl">WEESIA ADMIN</h2>
                        <h1 class="font-bold text-3xl lg:text-4xl mb-6 lg:mb-8">Member Dashboard</h1>
                    </div>
                    <div class="flex flex-row overflow-scroll justify-between no-scrollbar">
                        <div class="flex items-center md:w-full bg-white border border-gray rounded-lg w-fit p-4 mx-2 lg:ml-0">
                            <div class="w-[50px] h-[50px] bg-indigo-500 bg-opacity-40 rounded-md px-2 pt-3 mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="rgb(104 117 245)"><title>Member</title><path d="M352 128c0 70.7-57.3 128-128 128s-128-57.3-128-128S153.3 0 224 0s128 57.3 128 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM609.3 512H471.4c5.4-9.4 8.6-20.3 8.6-32v-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2h61.4C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z"/></svg>
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="rgb(104 117 245)"><title>Member</title><path d="M96 128V70.2c0-13.3 8.3-25.3 20.8-30l96-36c7.2-2.7 15.2-2.7 22.5 0l96 36c12.5 4.7 20.8 16.6 20.8 30V128h-.3c.2 2.6 .3 5.3 .3 8v40c0 70.7-57.3 128-128 128s-128-57.3-128-128V136c0-2.7 .1-5.4 .3-8H96zm48 48c0 44.2 35.8 80 80 80s80-35.8 80-80V160H144v16zM129.1 323.2l83.2 88.4c6.3 6.7 17 6.7 23.3 0l83.2-88.4c73.7 14.9 129.1 80 129.1 158.1c0 17-13.8 30.7-30.7 30.7H30.7C13.8 512 0 498.2 0 481.3c0-78.1 55.5-143.2 129.1-158.1zM208 48V64H192c-4.4 0-8 3.6-8 8V88c0 4.4 3.6 8 8 8h16v16c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8V96h16c4.4 0 8-3.6 8-8V72c0-4.4-3.6-8-8-8H240V48c0-4.4-3.6-8-8-8H216c-4.4 0-8 3.6-8 8z"/></svg> --}}
                            </div>
                            <div>
                                <h3 class="font-normal text-base lg:text-lg whitespace-nowrap">Jumlah Member</h3>
                                <h2 class="font-semibold text-xl lg:text-2xl">{{ $count['member'] }}</h2>
                            </div>
                        </div>
                        <div class="flex items-center md:w-full bg-white border border-gray rounded-lg w-fit p-4 mx-2">
                            <div class="w-[50px] h-[50px] bg-amber-500 bg-opacity-40 rounded-md px-2 pt-3 mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="rgb(245 158 11)"><title>Customer</title><path d="M144 160c-44.2 0-80-35.8-80-80S99.8 0 144 0s80 35.8 80 80s-35.8 80-80 80zm368 0c-44.2 0-80-35.8-80-80s35.8-80 80-80s80 35.8 80 80s-35.8 80-80 80zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM416 224c0 53-43 96-96 96s-96-43-96-96s43-96 96-96s96 43 96 96zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="rgb(245 158 11)"><path d="M224 0c70.7 0 128 57.3 128 128s-57.3 128-128 128s-128-57.3-128-128S153.3 0 224 0zM209.1 359.2l-18.6-31c-6.4-10.7 1.3-24.2 13.7-24.2H224h19.7c12.4 0 20.1 13.6 13.7 24.2l-18.6 31 33.4 123.9 39.5-161.2c77.2 12 136.3 78.8 136.3 159.4c0 17-13.8 30.7-30.7 30.7H265.1 182.9 30.7C13.8 512 0 498.2 0 481.3c0-80.6 59.1-147.4 136.3-159.4l39.5 161.2 33.4-123.9z"/></svg> --}}
                            </div>
                            <div>
                                <h3 class="font-normal text-base lg:text-lg whitespace-nowrap">Jumlah Customer</h3>
                                <h2 class="font-semibold text-xl lg:text-2xl">{{ $count['customer'] }}</h2>
                            </div>
                        </div>
                        <div class="flex items-center md:w-full bg-white border border-gray rounded-lg w-fit p-4 mx-2 lg:mr-0">
                            <div class="w-[50px] h-[50px] bg-red-500 bg-opacity-40 rounded-md px-2 pt-3 mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="rgb(240 82 82)"><title>Admin</title><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0S96 57.3 96 128s57.3 128 128 128zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H392.6c-5.4-9.4-8.6-20.3-8.6-32V352c0-2.1 .1-4.2 .3-6.3c-31-26-71-41.7-114.6-41.7H178.3zM528 240c17.7 0 32 14.3 32 32v48H496V272c0-17.7 14.3-32 32-32zm-80 32v48c-17.7 0-32 14.3-32 32V480c0 17.7 14.3 32 32 32H608c17.7 0 32-14.3 32-32V352c0-17.7-14.3-32-32-32V272c0-44.2-35.8-80-80-80s-80 35.8-80 80z"/></svg>
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="rgb(240 82 82)"><title>Admin</title><path d="M224 16c-6.7 0-10.8-2.8-15.5-6.1C201.9 5.4 194 0 176 0c-30.5 0-52 43.7-66 89.4C62.7 98.1 32 112.2 32 128c0 14.3 25 27.1 64.6 35.9c-.4 4-.6 8-.6 12.1c0 17 3.3 33.2 9.3 48H45.4C38 224 32 230 32 237.4c0 1.7 .3 3.4 1 5l38.8 96.9C28.2 371.8 0 423.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7c0-58.5-28.2-110.4-71.7-143L415 242.4c.6-1.6 1-3.3 1-5c0-7.4-6-13.4-13.4-13.4H342.7c6-14.8 9.3-31 9.3-48c0-4.1-.2-8.1-.6-12.1C391 155.1 416 142.3 416 128c0-15.8-30.7-29.9-78-38.6C324 43.7 302.5 0 272 0c-18 0-25.9 5.4-32.5 9.9c-4.7 3.3-8.8 6.1-15.5 6.1zm56 208H267.6c-16.5 0-31.1-10.6-36.3-26.2c-2.3-7-12.2-7-14.5 0c-5.2 15.6-19.9 26.2-36.3 26.2H168c-22.1 0-40-17.9-40-40V169.6c28.2 4.1 61 6.4 96 6.4s67.8-2.3 96-6.4V184c0 22.1-17.9 40-40 40zm-88 96l16 32L176 480 128 288l64 32zm128-32L272 480 240 352l16-32 64-32z"/></svg> --}}
                            </div>
                            <div>
                                <h3 class="font-normal text-base lg:text-lg whitespace-nowrap">Jumlah Admin</h3>
                                <h2 class="font-semibold text-xl lg:text-2xl">{{ $count['admin'] }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Section -->
    
        <!-- Member Table Section -->
        <section class="py-10">
            <div class="sm:container px-4">
                <div class="bg-white border border-gray mb-6 w-full">
                    <div class="flex justify-between items-center p-3">
                        <div class="">
                            <h1 class="font-bold text-xl md:text-2xl lg:text-3xl">Daftar {{ $title }}</h1>
                        </div>

                        <div class="flex justify-end items-center">
                            <span class="font-semibold rounded-lg px-3 lg:px-4 py-2">Token Member</span>
                            <div class="w-[30%]" x-data="{ show: true }">
                                <div class="relative">
                                    <input id="token-input" onchange="memberTokenUpdate()" :type="show ? 'password' : 'text'" class="w-full border border-gray focus:border-primary focus:ring-0 rounded-lg px-2 py-1" value="{{ config('constants.TOKEN_MEMBER') }}">
                                    <div class="absolute inset-y-0 h-fit right-0 mr-3 my-auto flex items-center text-sm leading-5 cursor-pointer bg-white">
                                        <svg class="h-4 text-gray-700" @click="show = !show":class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                            <path d="M150.7 92.77C195 58.27 251.8 32 320 32C400.8 32 465.5 68.84 512.6 112.6C559.4 156 590.7 207.1 605.5 243.7C608.8 251.6 608.8 260.4 605.5 268.3C592.1 300.6 565.2 346.1 525.6 386.7L630.8 469.1C641.2 477.3 643.1 492.4 634.9 502.8C626.7 513.2 611.6 515.1 601.2 506.9L9.196 42.89C-1.236 34.71-3.065 19.63 5.112 9.196C13.29-1.236 28.37-3.065 38.81 5.112L150.7 92.77zM189.8 123.5L235.8 159.5C258.3 139.9 287.8 128 320 128C390.7 128 448 185.3 448 256C448 277.2 442.9 297.1 433.8 314.7L487.6 356.9C521.1 322.8 545.9 283.1 558.6 256C544.1 225.1 518.4 183.5 479.9 147.7C438.8 109.6 385.2 79.1 320 79.1C269.5 79.1 225.1 97.73 189.8 123.5L189.8 123.5zM394.9 284.2C398.2 275.4 400 265.9 400 255.1C400 211.8 364.2 175.1 320 175.1C319.3 175.1 318.7 176 317.1 176C319.3 181.1 320 186.5 320 191.1C320 202.2 317.6 211.8 313.4 220.3L394.9 284.2zM404.3 414.5L446.2 447.5C409.9 467.1 367.8 480 320 480C239.2 480 174.5 443.2 127.4 399.4C80.62 355.1 49.34 304 34.46 268.3C31.18 260.4 31.18 251.6 34.46 243.7C44 220.8 60.29 191.2 83.09 161.5L120.8 191.2C102.1 214.5 89.76 237.6 81.45 255.1C95.02 286 121.6 328.5 160.1 364.3C201.2 402.4 254.8 432 320 432C350.7 432 378.8 425.4 404.3 414.5H404.3zM192 255.1C192 253.1 192.1 250.3 192.3 247.5L248.4 291.7C258.9 312.8 278.5 328.6 302 333.1L358.2 378.2C346.1 381.1 333.3 384 319.1 384C249.3 384 191.1 326.7 191.1 255.1H192z"/>
                                        </svg>
                                        <svg class="h-4 text-gray-700" @click="show = !show" :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path d="M160 256C160 185.3 217.3 128 288 128C358.7 128 416 185.3 416 256C416 326.7 358.7 384 288 384C217.3 384 160 326.7 160 256zM288 336C332.2 336 368 300.2 368 256C368 211.8 332.2 176 288 176C287.3 176 286.7 176 285.1 176C287.3 181.1 288 186.5 288 192C288 227.3 259.3 256 224 256C218.5 256 213.1 255.3 208 253.1C208 254.7 208 255.3 208 255.1C208 300.2 243.8 336 288 336L288 336zM95.42 112.6C142.5 68.84 207.2 32 288 32C368.8 32 433.5 68.84 480.6 112.6C527.4 156 558.7 207.1 573.5 243.7C576.8 251.6 576.8 260.4 573.5 268.3C558.7 304 527.4 355.1 480.6 399.4C433.5 443.2 368.8 480 288 480C207.2 480 142.5 443.2 95.42 399.4C48.62 355.1 17.34 304 2.461 268.3C-.8205 260.4-.8205 251.6 2.461 243.7C17.34 207.1 48.62 156 95.42 112.6V112.6zM288 80C222.8 80 169.2 109.6 128.1 147.7C89.6 183.5 63.02 225.1 49.44 256C63.02 286 89.6 328.5 128.1 364.3C169.2 402.4 222.8 432 288 432C353.2 432 406.8 402.4 447.9 364.3C486.4 328.5 512.1 286 526.6 256C512.1 225.1 486.4 183.5 447.9 147.7C406.8 109.6 353.2 80 288 80V80z"/> 
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="max-w-full overflow-scroll no-scrollbar">
                        <table class="text-left lg:tablefixed lg:wfull"> 
                            <thead>
                                <tr class="">
                                    <th class="border border-gray p-3 whitespace-nowrap w-[1%]">NAMA</th>
                                    <th class="border border-gray p-3 whitespace-nowrap w-[1%]">NOMOR</th>
                                    <th class="border border-gray p-3 whitespace-nowrap w-[1%]">EMAIL</th>
                                    <th class="border border-gray p-3 whitespace-nowrap w-[1%]">ROLE</th>
                                    <th class="border border-gray p-3 whitespace-nowrap w-[1%]">BERGABUNG</th>
                                    <th class="border border-gray p-3 whitespace-nowrap w-[1%]">OPSI</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @foreach($users as $user)
                                    <tr class="border-b border-gray">
                                        <td class="border-r border-gray p-3 whitespace-nowrap w-[1%]">{{ $user->name }}</td>
                                        <td class="border-r border-gray p-3 whitespace-nowrap w-[1%]">{{ $user->mobile }}</td>
                                        <td class="border-r border-gray p-3 whitespace-nowrap w-[1%]">{{ $user->email }}</td> 
                                        <td class="border-r border-gray p-3 ">
                                            @if($user->level == 'elder' || $user->level == 'member')
                                                <select id="role-member-{{ $user->id }}" onchange="memberRoleUpdate({{ $user->id }})" class="w-fit 2xl:w-full whitespace-nowrap border-none focus:ring-0 p-0 pr-8">
                                                    <option value="member" {{ $user->level == 'member' ? 'selected' : '' }}>new Member</option>
                                                    <option value="elder" {{ $user->level == 'elder' ? 'selected' : '' }}>Member</option>
                                                </select>
                                            @else
                                                {{ $user->level }}
                                            @endif
                                        </td>
                                        <td class="border-r border-gray p-3 whitespace-nowrap w-[1%]">{{ $user->date }}</td> 
                                        <td class="border-r border-gray p-3 whitespace-nowrap w-[1%]">
                                            <a 
                                                href="member/{{ $option }}/{{ $user->id }}" class="hover:text-red-600"
                                                onclick="if (confirm('Yang benerr..?')) window.location = href; return false"
                                            >
                                                {{ ucfirst($option) }}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="flex justify-between px-4 py-3 overflow-scroll no-scrollbar">
                        <div class="">
                            <a href="{{ route('dashboard.member', [
                                'role' => $roleQueue[0] ])
                                }}" class="flex items-center
                            ">
                                <div class="w-[20px] mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M109.3 288L480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288z"/></svg>
                                </div>
                                <span class="hover:font-medium">{{ ucfirst($roleQueue[0]) }}</span>
                            </a>
                        </div>
                        <div class="">
                            <a href="{{ route('dashboard.member', [
                                'role' => $roleQueue[1] ])
                                }}" class="flex items-center
                            ">
                                <span class="hover:font-medium">{{ ucfirst($roleQueue[1]) }}</span>
                                <div class="w-[20px] ml-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"/></svg>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Member Table Section -->
    </main>

    <script>
        function memberRoleUpdate(memberId) {
            const memberRole = document.getElementById('role-member-' + memberId).value;

            const origin = window.location.origin;
            const path = window.location.pathname;
            const href = origin + path;

            window.location = href + '/change/role?level=' + memberRole + '&id=' + memberId;
        }

        function memberTokenUpdate() {
            const tokenCode = document.getElementById('token-input').value;
            
            const origin = window.location.origin;
            const path = window.location.pathname;
            const href = origin + path;

            window.location = href + '/update/token?code=' + tokenCode;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
@endsection