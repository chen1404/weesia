<?php
    print_r($value);
?>

Backend Data
{{-- public function dashboardAbsen($from, $to) {
    $toMinusOne = Carbon::parse($to)->subDay();

    //--- Active Status
    $totalBot = Absen::all()->whereBetween('created_at', [$from, $to])->sum('count_bot');
    $totalClone = Absen::all()->whereBetween('created_at', [$from, $to])->sum('count_clone');

    $playMe = Absen::all()->whereBetween('created_at', [$from, $to])->sum('count_alpha');
    $totalUser = AbsenUsers::all()->whereBetween('created_at', [$from, $to])->groupBy('user_id')->count();
    // $from = Carbon::parse('2022-01-01'); $to = Carbon::parse('2022-01-15')->addDay(); $totalDays = $from->diffInDays($to);
    $absenPercentage = (int) ((16 * $totalUser - $playMe) / $totalUser * 6.25);

    $activeStats = [
        'bot' => $totalBot,
        'clone' => $totalClone,
        'percentage' => $absenPercentage,
    ];

    //--- Date normie
    // $colDates = Absen::all()->whereBetween('created_at', [$from, $to]);
    $colDates = AbsenUsers::all()->whereBetween('created_at', [$from, $toMinusOne])->groupBy('absen');
    $colLastDate = Absen::all()->first();

    //--- Users names
    $userNames = DB::table('users')
                    ->select('users.name')
                    ->join('absen_users','users.id','=','absen_users.user_id')
                    ->where('name', 'Like', '%' . '' . '%') // ++ Search ++
                    ->whereBetween('absen_users.created_at', [$from, $toMinusOne])
                    ->groupBy('users.name')->get();

    // --- Data users // ++ Kategori ++  ->where('status_desc', 'Alpha') COBA PAJE GROUP
    $userDatas = AbsenUsers::all()->whereBetween('created_at', [$from, $toMinusOne]);

    $userRows = [
        'names' => $userNames, 
        'datas' => $userDatas,
    ];

    $acumulations = DB::table('absen_users')
                ->join('users', 'absen_users.user_id', '=', 'users.id')
                ->select('users.name', DB::raw(
                    'COUNT(CASE WHEN absen_users.status_desc = "Alpha" THEN 1 END) AS alphas, 
                    COUNT(CASE WHEN absen_users.status_desc = "Telat" THEN 1 END) AS telats, 
                    COUNT(CASE WHEN absen_users.work = "Izin" THEN 1 END) AS izins,
                    SUM(CASE WHEN task = "Clone" THEN task_desc END) AS clones,
                    SUM(CASE WHEN task = "Bot" THEN task_desc END) AS bots'
                ))
                ->where('name', 'Like', '%' . '' . '%')
                ->whereBetween('absen_users.created_at', [$from, $toMinusOne])
                // ->orderBy('bots', 'desc') // ++ SORT BY
                ->groupBy('users.name')
                ->get();

    return array(
        $activeStats,
        $colDates,
        $colLastDate,
        $userRows,
        $acumulations,
    );
} --}}


Frontend dashboard blade

{{-- <!-- Absen Clone --> <div class="bg-white border border-gray mb-6">
    <div class="flex lg:justify-between items-center p-3 overflow-scroll no-scrollbar">
        <div class="md:block hidden whitespace-nowrap">
            <h1 class="font-bold text-2xl lg:text-3xl">Absen Clone</h1>
        </div>
        <div class="flex items-center md:justify-end">
            <a href=" {{ 
                route('dashboard.absen.export', [
                'moves' => app('request')->input('moves'),
                'date' => app('request')->input('date'),
            ]) }} " class="bg-primary text-white rounded-lg px-3 lg:px-4 py-2 mr-2">Export</a>
            <select name="status" id="urutkan" onchange="addParamSort()" class="focus:ring-1 focus:ring-primary focus:border-gray flex items-center border border-gray font-semibold rounded-lg lg:pr-9 lg:py-[7px] p-2 mr-2 bg-filter-svg">
                <option disabled @if(!app('request')->input('sort')) {{ 'selected' }} @endif>Urutkan</option>
                <option value="clones" {{ app('request')->input('sort') == 'clones' ? 'selected' : '' }} class="hover:bg">Clone</option>
                <option value="bots" {{ app('request')->input('sort') == 'bots' ? 'selected' : '' }}>Bot</option>
            </select>
            {{-- <span class="flex items-center border border-gray font-semibold rounded-lg lg:px-4 p-2 mr-2">
                <p>Urutkan</p> 
                <div class="w-[15px] ml-2">
                    <svg viewBox="0 0 512 448" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.4119 29.4131L17.44 29.3548L17.4675 29.2963C21.5958 20.5393 30.3166 15 39.9997 15H472C481.683 15 490.404 20.5393 494.532 29.2963C498.674 38.0819 497.415 48.3985 491.285 55.9083C491.284 55.9095 491.283 55.9108 491.282 55.912L308.391 279.4L305 283.545V288.9V416C305 422.457 301.379 428.316 295.641 431.159C289.728 434.088 282.905 433.442 277.819 429.615L277.81 429.607L277.8 429.6L213.8 381.6L213.764 381.573L213.728 381.547C209.521 378.43 207 373.44 207 368V288.9V283.544L203.608 279.4L20.6264 55.8227C20.6236 55.8193 20.6209 55.8159 20.6181 55.8126C14.5425 48.351 13.2833 37.9783 17.4119 29.4131Z" stroke="black" stroke-width="60"/></svg>
                </div>
            </span>
            <form action="{{ route('dashboard.absen') }}" method="get" class="hover:ring-1 hover:ring-primary flex justify-between items-center min-w-[120px] w-full md:w-[25%] lg:w-full border border-gray rounded-lg p-2">
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
                    <th class="p-3 border border-r-0 border-gray">Clone</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($userRows['names'] as $userName)
                @foreach ($acumulations as $acumulation)
                    <tr class="border-b border-gray">
                        @foreach ($userRows['names'] as $userName)
                            @if($acumulation->name == $userName->name)
                                <td rowspan="2" class="border-r border-gray bg-white outline outline-1 outline-gray sticky left-0">{{ $userName->name }}</td>
                            @endif
                        @endforeach

                        @foreach ($userRows['datas'] as $userData)
                            @if($userData->user->name == $acumulation->name && $userData->task != 'Bot')
                                <td class="border-r border-gray">{{ $userData->status_desc }}</td>
                            @elseif($userData->user->name == $acumulation->name)
                                <td class="border-r border-gray"> - </td>
                            @endif
                        @endforeach
                        
                        @foreach($acumulations as $acumulation)
                            @if($acumulation->name == $userName->name)
                                <td rowspan="2" class="border-r border-gray">{{ $acumulation->alphas }}</td>
                                <td rowspan="2" class="border-r border-gray">{{ $acumulation->telats }}</td>
                                <td rowspan="2" class="border-r border-gray">{{ $acumulation->izins }}</td>
                                <td rowspan="2" class="border-gray">{{ $acumulation->clones }}</td>
                            @endif
                        @endforeach
                    </tr>
                    <tr class="border-b border-dark">
                        @foreach ($userRows['datas'] as $userData)
                            @if($userData->user->name == $acumulation->name && $userData->task == 'Clone')
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

    <div>
        <a href="{{ route('dashboard.absen', [
            'moves' => 'prev', 'date' => $dateShown[0]
        ]) }}" class="
            {{ $colLastDate->created_at->format('Y-m-d') >= $dateShown[0] ? 'pointer-events-none' : '' }}
        ">Previous</a>
        <a href="{{ route('dashboard.absen', [
            'moves' => 'next', 'date' => $dateShown[1]
        ]) }}" class="
            {{ $colDates->last()[0]->created_at->addDay()->format('Y-m-d') >= $dateShown[1] ? '' : 'pointer-events-none' }}
        ">Next</a>
    </div>
</div> --}}


{{--<!-- Absen Bot -->
<div class="bg-white border border-gray mb-6">
    <div class="flex lg:justify-between items-center p-3 overflow-scroll no-scrollbar">
        <div class="md:block hidden whitespace-nowrap">
            <h1 class="font-bold text-2xl lg:text-3xl">Absen Bot</h1>
        </div>
        <div class="flex items-center md:justify-end">
            <a href="{{ route('dashboard.absen.export', [
                'moves' => app('request')->input('moves'),
                'date' => app('request')->input('date'),
            ]) }}" class="bg-primary text-white rounded-lg px-3 lg:px-4 py-2 mr-2">Export</a>
            <span onclick="addParamSort()" class="flex items-center border border-gray font-semibold rounded-lg cursor-pointer lg:px-4 p-2 mr-2">
                <p>Kategori</p> 
                <div class="w-[20px] ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10 3H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zM9 9H5V5h4v4zm11 4h-6a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1zm-1 6h-4v-4h4v4zM17 3c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2zM7 13c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4zm0 6c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2-.897 2-2 2z"/></svg>
                </div>
            </span>
            <span class="flex items-center border border-gray font-semibold rounded-lg lg:px-4 p-2 mr-2">
                <p>Urutkan</p> 
                <div class="w-[15px] ml-2">
                    <svg viewBox="0 0 512 448" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.4119 29.4131L17.44 29.3548L17.4675 29.2963C21.5958 20.5393 30.3166 15 39.9997 15H472C481.683 15 490.404 20.5393 494.532 29.2963C498.674 38.0819 497.415 48.3985 491.285 55.9083C491.284 55.9095 491.283 55.9108 491.282 55.912L308.391 279.4L305 283.545V288.9V416C305 422.457 301.379 428.316 295.641 431.159C289.728 434.088 282.905 433.442 277.819 429.615L277.81 429.607L277.8 429.6L213.8 381.6L213.764 381.573L213.728 381.547C209.521 378.43 207 373.44 207 368V288.9V283.544L203.608 279.4L20.6264 55.8227C20.6236 55.8193 20.6209 55.8159 20.6181 55.8126C14.5425 48.351 13.2833 37.9783 17.4119 29.4131Z" stroke="black" stroke-width="60"/></svg>
                </div>
            </span>
            <form action="{{ route('dashboard.absen', [
                'moves' => app('request')->input('moves'),
                'date' => app('request')->input('date'),
                'feature' => 'search'
            ]) }}" method="GET" class="flex justify-between items-center min-w-[120px] w-full md:w-[25%] lg:w-full border border-gray rounded-lg p-2">
                <input type="text" placeholder="Cari" class="border-none focus:ring-0 w-full p-0">
                <div class="cursor-pointer border-l border-slate-500 pl-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="15px" viewBox="0 0 512 512" fill="rgb(116,123,136)"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352c79.5 0 144-64.5 144-144s-64.5-144-144-144S64 128.5 64 208s64.5 144 144 144z"/></svg>
                </div>
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
                        @foreach ($userRows['names'] as $userName)
                            @if($acumulation->name == $userName->name)
                                <td rowspan="2" class="border-r border-gray bg-white outline outline-1 outline-gray sticky left-0">{{ $userName->name }}</td>
                            @endif
                        @endforeach
                        @foreach ($userRows['datas'] as $userData)
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
                        @foreach ($userRows['datas'] as $userData)
                            @if($userData->user->name == $acumulation->name && $userData->task == 'Bot')
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
    
    <div>
        <a href="{{ route('dashboard.absen', [
            'moves' => 'prev', 'date' => $dateShown[0]
        ]) }}" class="
            {{ $colLastDate->created_at->format('Y-m-d') >= $dateShown[0] ? 'pointer-events-none' : '' }}
        ">Previous</a>
        <a href="{{ route('dashboard.absen', [
            'moves' => 'next', 'date' => $dateShown[1]
        ]) }}" class="
            {{ $colDates->last()[0]->created_at->addDay()->format('Y-m-d') >= $dateShown[1] ? '' : 'pointer-events-none' }}
        ">Next</a>
    </div>
</div> --}}