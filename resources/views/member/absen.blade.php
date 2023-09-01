@extends('layouts.pages.member')

@section('title')
    Absen
@endsection

@section('active_absen')
    active-page
@endsection

@section('body-class')
    h-auto flex lg:block flex-col justify-between
@endsection

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="bg-absen-bg bg-cover h-[250px] sm:h-[400px] lg:h-screen z-10 relative lg:overflow-clip">
        <div class="dark-bg-20 h-full pt-16 lg:p-0">
            <div class="sm:container h-full px-4">
                <div class="block lg:hidden">
                    <div class="my-5 sm:mt-24">
                        <h1 class="font-bold text-white text-xl sm:text-2xl">Sesi absen Member</h1>
                        <h1 class="font-bold text-white text-xl sm:text-2xl">aktif Weesia</h1>
                    </div>
                    <div class="w-full flex justify-center sm:mt-20">
                        <div class="bg-dark rounded-lg p-6">
                            <div class="text-center mb-4">
                                <h1 class="font-semibold text-white text-xl sm:text-2xl">Absen Hari Ini</h1>
                                <h3 class="font-normal text-white text-[10px] sm:text-xs">{{ $dateToday }}</h3>
                            </div>
                            <div onclick="kelik('stats-1', 'forms-1')">
                                <div class="font-bold text-white text-3xl bg-{{ $latestUsrAbsen->status }} hover:bg-opacity-80 inline-block px-12 sm:px-14 py-4 rounded-lg cursor-pointer">{{ strtoupper($latestUsrAbsen->status_desc) }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:flex hidden lg:h-[125%] items-center">
                    <div class="w-full flex flex-col items-center text-center sticky top-20">
                        <h1 class="font-bold text-white text-3xl mb-8">Sesi absen Member aktif Weesia</h1>
                        
                        <div class="flex justify-between items-center w-[55%] xl:w-[45%] bg-dark rounded-lg px-10 py-8">
                            <div>
                                <h1 class="font-semibold text-white text-2xl">Absen Hari Ini</h1>
                                <h3 class="font-normal text-white text-sm">{{ $dateToday }}</h3>
                            </div>
                            <div onclick="kelik('stats-1', 'forms-1')">
                                <div class="font-bold text-white text-3xl bg-{{ $latestUsrAbsen->status }} hover:bg-opacity-80 inline-block px-10 py-6 rounded-lg cursor-pointer">{{ strtoupper($latestUsrAbsen->status_desc) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Section -->

    <!-- List Kehadiran -->
    <section id="kehadiran" class="bg-light h-full pt-28 lg:pt-20">
        <div class="sm:container px-4">
            <div class="block lg:flex flex-col justify-between h-full">
                
                <div class="lg:w-[45%]">
                    @error('sistem-kerja')
                        <div class="font-semibold text-sm text-red-500 mb-4 text-center">{{ $message }}</div>
                    @enderror
                    @error('tugas')
                        <div class="font-semibold text-sm text-red-500 mb-4 text-center">{{ $message }}</div>
                    @enderror
                    @error('deskripsi-tugas')
                        <div class="font-semibold text-sm text-red-500 mb-4 text-center">{{ $message }}</div>
                    @enderror
                    @php $i = 1 @endphp
                    @foreach ($userAbsens as $userAbsen)
                        @if($userAbsen->status_desc != 'Absen')
                            <div id="stats-{{ $i }}" class="bg-white border rounded-lg border-gray p-4 flex justify-between items-center mb-4 overflow-hidden">
                                <div class="">
                                    <h2 class="font-semibold text-2xl">Kehadiran</h2>
                                    <h3 class="font-normal text-sm">{{ $userAbsen->absen->date }}</h3>
                                </div>
                                <a class="w-auto">
                                    <div onclick="kelik('stats-{{ $i }}', 'forms-{{ $i }}')" class="bg-{{ $userAbsen->status }} hover:bg-opacity-80 rounded-lg py-2 px-4 w-full flex justify-between items-center cursor-pointer">
                                        <div class="pr-2">
                                            <h2 class="font-semibold text-white text-2xl leading-5">{{ $userAbsen->status_desc }}</h2>
                                            @if($userAbsen->status == 'done')
                                                <h3 class="font-semibold text-white text-sm leading-5">{{ $userAbsen->work }} • {{ $userAbsen->task }}</h3>
                                            @elseif($userAbsen->status == 'pending')
                                                <h3 class="font-normal text-white text-[10px] leading-5">ketuk untuk absen</h3>
                                            @endif
                                        </div>
                                        <div class="w-[35px]">
                                            {!! $svg[$userAbsen->status] !!}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endif
                        <div id="forms-{{ $i }}" class="bg-white border rounded-lg border-gray p-4 mb-4 hidden">
                            <div class="flex flex-col text-center mb-5">
                                <h2 class="font-semibold text-2xl">Kehadiran</h2>
                                <h3 class="font-normal text-lg">{{ $userAbsen->absen->date }}</h3>
                            </div>
                            <form action="/member/absen/add/{{ $userAbsen->id }}" method="post">
                                @csrf
                                @if($userAbsen->status_desc != 'Alpha')
                                    <div class="">
                                        <h2 class="font-semibold text-xl">Sistem Kerja</h2>
                                        <div class="flex justify-between pr-12">
                                            @foreach($works as $work) 
                                                <label for="{{ $work }}-{{ $i }}">
                                                    <input {{ ($userAbsen->work == $work) ? 'checked' : '' }} {{ ($userAbsen->work != null) ? 'disabled' : '' }} required value="{{ $work }}"
                                                        type="radio" id="{{ $work }}-{{ $i }}" name="sistem-kerja" class="focus:ring-0 border-2 border-primary checked:bg-primary checked:ring-offset-0"> {{ $work }}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="my-2">
                                        <h2 class="font-semibold text-xl">Deskripsi Tugas</h2>
                                        <label for="task-{{ $i }}">
                                            <select name="tugas" id="task-{{ $i }}" class="p-1 w-full rounded-lg my-2" onchange="kelikk('task-{{ $i }}', 'task-desc-{{ $i }}')" {{ ($userAbsen->task != null) ? 'disabled' : '' }} required>
                                                <option value="Lainnya" {{ $userAbsen->task == 'Lainnya' ? 'selected' : '' }} >Lainnya</option>
                                                <option value="Bot" {{ $userAbsen->task == 'Bot' ? 'selected' : '' }} >Bot</option>
                                                <option value="Clone" {{ $userAbsen->task == 'Clone' ? 'selected' : '' }} >Clone</option>
                                            </select>
                                        </label>
                                        <label class="" for="task-desc-{{ $i }}">
                                            <input type="text" name="deskripsi-tugas" id="task-desc-{{ $i }}" placeholder="deskripsi tugas" class="p-1 w-full rounded-lg" {{ ($userAbsen->task_desc != null) ? 'disabled' : '' }} value="{{ $userAbsen->task_desc }}" required>
                                        </label>
                                    </div>
                                @else
                                    <div class="my-2">
                                        <h2 class="font-semibold text-xl">Semoga tidak lupa lagi kedepannya.</h2>
                                    </div>
                                @endif
                                <div class="flex justify-between mt-7 w-full">
                                    @if($userAbsen->status != 'pending')
                                        <div onclick="kelik('forms-{{ $i }}', 'stats-{{ $i }}')" class="font-semibold text-white rounded-md text-2xl w-full py-2 bg-black hover:bg-opacity-80 text-center cursor-pointer">TUTUP</div>
                                    @else
                                        <div onclick="kelik('forms-{{ $i }}', 'stats-{{ $i }}')" class="font-semibold text-white rounded-md text-2xl w-[48%] py-2 bg-black hover:bg-opacity-80 text-center cursor-pointer">BATAL</div>
                                        <button type="submit" class="font-semibold text-white rounded-md text-2xl w-[48%] py-2 bg-primary hover:bg-opacity-80 text-center">KIRIM</button>
                                    @endif
                                </div>
                            </form>
                        </div>
                        @php $i++ @endphp
                    @endforeach
                </div>


                <div class="fixed lg:right-24 xl:right-16 2xl:right-14 top-20 hidden lg:flex flex-col w-1/2 lg:w-[400px] 2xl:w-[500px]">
                    <div class="flex justify-between items-center bg-dark rounded-lg py-4 px-7 sticky top-20">
                        <div>
                            <h1 class="font-semibold text-white text-2xl">Absen Hari Ini</h1>
                            <h3 class="font-normal text-white text-sm">{{ $dateToday }}</h3>
                        </div>
                        <div  onclick="kelik('stats-1', 'forms-1')">
                            <div class="font-bold text-white text-2xl bg-{{ $latestUsrAbsen->status }} hover:bg-opacity-80 inline-block px-8 py-3 rounded-md cursor-pointer">{{ strtoupper($latestUsrAbsen->status_desc) }}</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End List Kehadiran -->

    <script>
        function kelik(kelas, kelas2) {
            if(kelas == 'stats-1' && kelas2 == 'forms-1') {
                group2 = document.getElementById(kelas2);
                group2.classList.add('block');
                group2.classList.remove('hidden');

                if(group1 = document.getElementById(kelas)) {
                    group1.classList.add('hidden');
                    group1.classList.remove('block');
                }
                
                window.location.href = '/member/absen#kehadiran';
            } else {
                group1 = document.getElementById(kelas);

                group1.classList.add('hidden');
                group1.classList.remove('block');
                
                if(group2 = document.getElementById(kelas2)) {
                    group2.classList.add('block');
                    group2.classList.remove('hidden');
                }
            }
        }

        function kelikk(kelas, kelas2) {
            let optionValue = document.getElementById(kelas).value;
            
            if(optionValue == 'Lainnya') {
                document.getElementById(kelas2).type = 'text';
                document.getElementById(kelas2).placeholder = 'deskripsi tugas';
            } else {
                document.getElementById(kelas2).type = 'number';
                document.getElementById(kelas2).placeholder = 'masukkan jumlah ' + optionValue;
            }
        }
    </script>
@endsection