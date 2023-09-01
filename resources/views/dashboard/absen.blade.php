@extends('layouts.pages.member')

@section('title')
    Admin Dashboard
@endsection
    
@section('body-class')
    h-screen bg-light flex flex-col justify-between
@endsection

@section('active_absen')
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
                        <h1 class="font-bold text-3xl lg:text-4xl mb-6 lg:mb-8">Absen Dashboard</h1>
                    </div>
                    <div class="flex flex-row overflow-scroll justify-between no-scrollbar">
                        <div class="flex items-center md:w-full bg-white border border-gray rounded-lg w-fit p-4 mx-2 lg:ml-0">
                            <div class="w-[50px] h-[50px] bg-sky-400 bg-opacity-40 rounded-md p-2 mr-2">
                                <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="rgb(56 189 248)"><title>Bot</title><path d="M23.5154 13.4558c-.2744-1.8854-.692-3.7828-.9904-5.0477-.358-1.5035-1.6349-2.5775-3.1742-2.673-1.5155-.0955-4.0215-.2028-7.3627-.2028-3.3413 0-5.8472.1074-7.3627.2028-1.5394.0955-2.8163 1.1695-3.1743 2.673-.2983 1.265-.716 3.1623-.9904 5.0477-.191 1.2769-.3341 2.7685-.4535 4.463-.0596.9427.2506 1.8496.8831 2.5537.6324.704 1.4916 1.1217 2.4463 1.1575 2.0763.0955 5.2625.2148 8.6634.2148 3.401 0 6.587-.1193 8.6634-.2148.9427-.0477 1.8139-.4535 2.4463-1.1575.6325-.704.9427-1.611.883-2.5537-.1312-1.6945-.2863-3.198-.4773-4.463zm-1.6467 5.9188c-.3342.37-.7876.5848-1.2888.6086-2.0644.0955-5.2148.2148-8.5918.2148-3.3771 0-6.5274-.1193-8.5919-.2148-.5011-.0239-.9546-.2386-1.2887-.6086-.3342-.3699-.5012-.8472-.4654-1.3484.1074-1.6468.2506-3.1026.4415-4.3317.2625-1.8258.6683-3.6754.9666-4.9045.191-.7995.8592-1.3604 1.6826-1.42C6.2244 7.2745 8.6945 7.167 12 7.167c3.2935 0 5.7756.1074 7.2673.2029.8114.0477 1.4916.6205 1.6825 1.42.2864 1.2291.6921 3.0787.9666 4.9045.179 1.2291.3222 2.685.4415 4.3317 0 .5012-.167.9785-.4892 1.3484zM11.988 4.1958c.5608 0 1.0262-.4535 1.0262-1.0143 0-.561-.4534-1.0263-1.0262-1.0263-.5609 0-1.0263.4535-1.0263 1.0263 0 .5489.4654 1.0143 1.0263 1.0143zm5.9665 7.84c-.9069 0-1.6468.7399-1.6468 1.6468h3.2936c0-.907-.728-1.6468-1.6468-1.6468zm-11.933 0c-.907 0-1.6468.7399-1.6468 1.6468h3.2935c0-.907-.728-1.6468-1.6468-1.6468zm5.9665 5.9665c1.4677 0 2.661-1.1933 2.661-2.661h-5.334c0 1.4558 1.1933 2.661 2.673 2.661z"/></svg>
                            </div>
                            <div>
                                <h3 class="font-normal text-base lg:text-lg whitespace-nowrap">Jumlah Bot</h3>
                                <h2 class="font-semibold text-xl lg:text-2xl">{{ $activeStats['bot'] }}</h2>
                            </div>
                        </div>
                        <div class="flex items-center md:w-full bg-white border border-gray rounded-lg w-fit p-4 mx-2">
                            <div class="w-[50px] h-[50px] bg-[#F62B61] bg-opacity-40 rounded-md p-3 mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="rgb(246 43 97)"><title>Cloning</title><path d="M64 464H288C296.8 464 304 456.8 304 448V384H352V448C352 483.3 323.3 512 288 512H64C28.65 512 0 483.3 0 448V224C0 188.7 28.65 160 64 160H128V208H64C55.16 208 48 215.2 48 224V448C48 456.8 55.16 464 64 464zM160 64C160 28.65 188.7 0 224 0H448C483.3 0 512 28.65 512 64V288C512 323.3 483.3 352 448 352H224C188.7 352 160 323.3 160 288V64zM224 304H448C456.8 304 464 296.8 464 288V64C464 55.16 456.8 48 448 48H224C215.2 48 208 55.16 208 64V288C208 296.8 215.2 304 224 304z"/></svg>
                            </div>
                            <div>
                                <h3 class="font-normal text-base lg:text-lg whitespace-nowrap">Total Clone</h3>
                                <h2 class="font-semibold text-xl lg:text-2xl">{{ $activeStats['clone'] }}</h2>
                            </div>
                        </div>
                        <div class="flex items-center md:w-full bg-white border border-gray rounded-lg w-fit p-4 mx-2 lg:mr-0">
                            <div class="w-[50px] h-[50px] bg-green-400 bg-opacity-40 rounded-md p-3 mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgb(49 196 141)"><title>Calender</title><path d="M7 11h2v2H7zm0 4h2v2H7zm4-4h2v2h-2zm0 4h2v2h-2zm4-4h2v2h-2zm0 4h2v2h-2z"></path><path d="M5 22h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2h-2V2h-2v2H9V2H7v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2zM19 8l.001 12H5V8h14z"></path></svg>
                            </div>
                            <div>
                                <h3 class="font-normal text-base lg:text-lg whitespace-nowrap">Kehadiran</h3>
                                <h2 class="font-semibold text-xl lg:text-2xl">{{ $activeStats['percentage'] }}%</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Section -->
    
        <!-- Absen Table Section -->
        <section class="py-10">
            <div class="sm:container px-4">
                <div class="flex flex-col items-center">
                    <!-- Absen Clone -->
                    <div class="bg-white border border-gray mb-6 w-fit max-w-full">
                        <div class="flex lg:justify-between items-center p-3 overflow-scroll no-scrollbar">
                            <div class="md:block hidden whitespace-nowrap">
                                <h1 class="font-bold text-2xl lg:text-3xl">Absen Clone</h1>
                            </div>
                            <div class="flex items-center md:justify-end">
                                <a href=" {{ 
                                    route('dashboard.absen.export', [
                                    'moves' => app('request')->input('moves'),
                                    'date' => app('request')->input('date'),
                                    'task' => 'Clone'
                                ]) }} " class="bg-primary text-white rounded-lg px-3 lg:px-4 py-2 mr-2">Export</a>
                                <select name="order" id="order-by2" onchange="addParamSort('clones')" class="focus:ring-1 focus:ring-primary focus:border-gray flex items-center border border-gray font-semibold rounded-lg pr-9 lg:py-[7px] p-2 mr-2 bg-filter-svg">
                                    <option disabled @if(app('request')->input('sort') != 'clones') {{ 'selected' }} @endif>Urutkan</option>
                                    <option value="asc" {{ app('request')->input('order') == 'asc' && app('request')->input('sort') == 'clones' ? 'selected' : '' }}>Ascending</option>
                                    <option value="desc" {{ app('request')->input('order') == 'desc' && app('request')->input('sort') == 'clones' ? 'selected' : '' }}>Descending</option>
                                </select>
                                <form action="{{ route('dashboard.absen') }}" method="get" class="focus-within:ring-1 focus-within:ring-primary flex justify-between items-center min-w-[120px] w-full md:w-[25%] lg:w-full border border-gray rounded-lg lg:py-[7px] p-2">
                                    <input type="hidden" name="moves" value="{{ app('request')->input('moves') }}" hidden>
                                    <input type="hidden" name="date" value="{{ app('request')->input('date') }}" hidden>
                                    <input type="text" placeholder="Cari" name="name" class="border-none focus:ring-0 w-full p-0">
                                    <button type="submit" class="cursor-pointer border-l border-slate-500 pl-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15px" viewBox="0 0 512 512" fill="rgb(116,123,136)"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352c79.5 0 144-64.5 144-144s-64.5-144-144-144S64 128.5 64 208s64.5 144 144 144z"/></svg>
                                    </button>
                                </form>
                            </div>
                        </div>
    
                        <div class="overflow-scroll no-scrollbar">
                            <table class="text-center">
                                <thead>
                                    <tr class="whitespace-nowrap">
                                        <th class="p-3 border border-l-0 border-gray bg-white outline outline-1 outline-gray sticky left-0">NAMA</th>
                                        @foreach ($colDates as $colDate)
                                            <th class="p-3 border border-gray">{{ $colDate[0]->absen->date }}</th>
                                        @endforeach
                                        <th class="p-3 border border-gray">Alpha</th>
                                        <th class="p-3 border border-gray">Telat</th>
                                        <th class="p-3 border border-gray">Izin</th>
                                        <th class="p-3 border border-r-0 border-gray">Clone</th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @foreach ($acumulations as $acumulation)
                                        <tr class="border-b border-gray">
                                            @foreach ($rowNames as $userName)
                                                @if($acumulation->name == $userName->name)
                                                    <td rowspan="2" class="border-r border-gray bg-white outline outline-1 outline-gray sticky left-0">{{ $userName->name }}</td>
                                                @endif
                                            @endforeach
    
                                            @foreach ($rowDatas as $userData)
                                                @if($userData->user->name == $acumulation->name && $userData->task != 'Bot')
                                                    <td class="border-r border-gray">{{ $userData->status_desc }}</td>
                                                @elseif($userData->user->name == $acumulation->name)
                                                    <td class="border-r border-gray"> - </td>
                                                @endif
                                            @endforeach
                                            
                                            <td rowspan="2" class="border-r border-gray">{{ $acumulation->alphas }}</td>
                                            <td rowspan="2" class="border-r border-gray">{{ $acumulation->telats }}</td>
                                            <td rowspan="2" class="border-r border-gray">{{ $acumulation->izins }}</td>
                                            <td rowspan="2" class="border-gray">{{ $acumulation->clones }}</td>
                                        </tr>
                                        <tr class="border-b border-dark">
                                            @foreach ($rowDatas as $userData)
                                                @if($userData->user->name == $acumulation->name && ($userData->task == 'Clone' || $userData->task == 'Lainnya'))
                                                    <td class="border-r border-gray">{{ $userData->task_desc }}</td>
                                                @elseif($userData->user->name == $acumulation->name)
                                                    <td class="border-r border-gray"> - </td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
    
                        <div class="flex justify-between px-4 py-3">
                            <div class="
                                {{ $colLastDate->created_at->format('Y-m-d') >= $dateShown[0] ? 'hover:cursor-not-allowed' : '' }}
                            ">
                                <a href="{{ route('dashboard.absen', [
                                    'moves' => 'prev', 'date' => $dateShown[0]] )
                                }}" class="
                                    flex items-center
                                    {{ $colLastDate->created_at->format('Y-m-d') >= $dateShown[0] ? 'pointer-events-none' : '' }}
                                ">
                                    <div class="w-[20px] mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M109.3 288L480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288z"/></svg>
                                    </div>
                                    <span class="hover:font-medium">SEBELUMNYA</span>
                                </a>
                            </div>
                            <div class="
                                {{ $colDates->last()[0]->created_at->addDay()->format('Y-m-d') >= $dateShown[1] ? '' : 'hover:cursor-not-allowed' }}
                            ">
                                <a href="{{ route('dashboard.absen', [
                                    'moves' => 'next', 'date' => $dateShown[1]] )
                                }}" class=" 
                                    flex items-center
                                    {{ $colDates->last()[0]->created_at->addDay()->format('Y-m-d') >= $dateShown[1] ? '' : 'pointer-events-none' }}
                                ">
                                    <span class="hover:font-medium">SELANJUTNYA</span>
                                    <div class="w-[20px] ml-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"/></svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
    
    
                    <!-- Absen Bot -->
                    <div class="bg-white border border-gray mb-6 w-fit max-w-full">
                        <div class="flex lg:justify-between items-center p-3 overflow-scroll no-scrollbar">
                            <div class="md:block hidden whitespace-nowrap">
                                <h1 class="font-bold text-2xl lg:text-3xl">Absen Bot</h1>
                            </div>
                            <div class="flex items-center md:justify-end">
                                <a href="{{ route('dashboard.absen.export', [
                                    'moves' => app('request')->input('moves'),
                                    'date' => app('request')->input('date'),
                                    'task' => 'Bot'
                                ]) }}" class="bg-primary text-white rounded-lg px-3 lg:px-4 py-2 mr-2">Export</a>
                                <select name="order" id="order-by1" onchange="addParamSort('bots')" class="focus:ring-1 focus:ring-primary focus:border-gray flex items-center border border-gray font-semibold rounded-lg pr-9 lg:py-[7px] p-2 mr-2 bg-filter-svg">
                                    <option disabled @if(app('request')->input('sort') != 'bots') {{ 'selected' }} @endif>Urutkan</option>
                                    <option value="asc" {{ app('request')->input('order') == 'asc' && app('request')->input('sort') == 'bots' ? 'selected' : '' }}>Ascending</option>
                                    <option value="desc" {{ app('request')->input('order') == 'desc' && app('request')->input('sort') == 'bots' ? 'selected' : '' }}>Descending</option>
                                </select>
                                <form action="{{ route('dashboard.absen') }}" method="get" class="focus-within:ring-1 focus-within:ring-primary flex justify-between items-center min-w-[120px] w-full md:w-[25%] lg:w-full border border-gray rounded-lg lg:py-[7px] p-2">
                                    <input type="hidden" name="moves" value="{{ app('request')->input('moves') }}" hidden>
                                    <input type="hidden" name="date" value="{{ app('request')->input('date') }}" hidden>
                                    <input type="text" placeholder="Cari" name="name" class="border-none focus:ring-0 w-full p-0">
                                    <button type="submit" class="cursor-pointer border-l border-slate-500 pl-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15px" viewBox="0 0 512 512" fill="rgb(116,123,136)"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352c79.5 0 144-64.5 144-144s-64.5-144-144-144S64 128.5 64 208s64.5 144 144 144z"/></svg>
                                    </button>
                                </form>
                            </div>
                        </div>
    
                        <div class="overflow-scroll no-scrollbar">
                            <table class="text-center">
                                <thead>
                                    <tr class="whitespace-nowrap ">
                                        <th class="p-3 border border-l-0 border-gray bg-white outline outline-1 outline-gray sticky left-0">NAMA</th>
                                        @foreach ($colDates as $colDate)
                                            <th class="p-3 border border-gray">{{ $colDate[0]->absen->date }}</th>
                                        @endforeach
                                        <th class="p-3 border border-gray">Alpha</th>
                                        <th class="p-3 border border-gray">Telat</th>
                                        <th class="p-3 border border-gray">Izin</th>
                                        <th class="p-3 border border-r-0 border-gray">Bot</th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @foreach ($acumulations as $acumulation)
                                        <tr class="border-b border-gray">
                                            @foreach ($rowNames as $userName)
                                                @if($acumulation->name == $userName->name)
                                                    <td rowspan="2" class="border-r border-gray bg-white outline outline-1 outline-gray sticky left-0">{{ $userName->name }}</td>
                                                @endif
                                            @endforeach
    
                                            @foreach ($rowDatas as $userData)
                                                @if($userData->user->name == $acumulation->name && $userData->task != 'Clone')
                                                    <td class="border-r border-gray">{{ $userData->status_desc }}</td>
                                                @elseif($userData->user->name == $acumulation->name)
                                                    <td class="border-r border-gray"> - </td>
                                                @endif
                                            @endforeach
    
                                            <td rowspan="2" class="border-r border-gray">{{ $acumulation->alphas }}</td>
                                            <td rowspan="2" class="border-r border-gray">{{ $acumulation->telats }}</td>
                                            <td rowspan="2" class="border-r border-gray">{{ $acumulation->izins }}</td>
                                            <td rowspan="2" class="border-gray">{{ $acumulation->bots }}</td>
                                        </tr>
                                        <tr class="border-b border-dark">
                                            @foreach ($rowDatas as $userData)
                                                @if($userData->user->name == $acumulation->name && ($userData->task == 'Bot' || $userData->task == 'Lainnya'))
                                                    <td class="border-r border-gray">{{ $userData->task_desc }}</td>
                                                @elseif($userData->user->name == $acumulation->name)
                                                    <td class="border-r border-gray"> - </td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="flex justify-between px-4 py-3">
                            <div class="
                                {{ $colLastDate->created_at->format('Y-m-d') >= $dateShown[0] ? 'hover:cursor-not-allowed' : '' }}
                            ">
                                <a href="{{ route('dashboard.absen', [
                                    'moves' => 'prev', 'date' => $dateShown[0]] )
                                }}" class="
                                    flex items-center
                                    {{ $colLastDate->created_at->format('Y-m-d') >= $dateShown[0] ? 'pointer-events-none' : '' }}
                                ">
                                    <div class="w-[20px] mr-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M109.3 288L480 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-370.7 0 73.4-73.4c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-128 128c-12.5 12.5-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 288z"/></svg>
                                    </div>
                                    <span class="hover:font-medium">SEBELUMNYA</span>
                                </a>
                            </div>
                            <div class="
                                {{ $colDates->last()[0]->created_at->addDay()->format('Y-m-d') >= $dateShown[1] ? '' : 'hover:cursor-not-allowed' }}
                            ">
                                <a href="{{ route('dashboard.absen', [
                                    'moves' => 'next', 'date' => $dateShown[1]] )
                                }}" class=" 
                                    flex items-center
                                    {{ $colDates->last()[0]->created_at->addDay()->format('Y-m-d') >= $dateShown[1] ? '' : 'pointer-events-none' }}
                                ">
                                    <span class="hover:font-medium">SELANJUTNYA</span>
                                    <div class="w-[20px] ml-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"/></svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Absen Table Section -->
    </main>

    <script>
        function addParamSort(sortBy) {
            let orderBy = document.getElementById('order-by1').value;
            if(sortBy == 'clones') {
                orderBy = document.getElementById('order-by2').value;
            }

            const searchParams = new URLSearchParams(location.search);
            searchParams.set('sort', sortBy);
            searchParams.set('order', orderBy);

            const origin = window.location.origin;
            const path = window.location.pathname;
            const params = searchParams.toString();

            const href = origin + path + '?' + params;
            window.location = href;
        }
    </script>
@endsection