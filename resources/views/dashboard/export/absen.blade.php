<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th style="font-weight: bold; vertical-align: middle; text-align: center;">NAMA</th>
                @foreach ($colDates as $colDate)
                    <th style="font-weight: bold; vertical-align: middle; text-align: center;">{{ $colDate[0]->absen->date }}</th>
                @endforeach
                <th style="font-weight: bold; vertical-align: middle; text-align: center;">Alpha</th>
                <th style="font-weight: bold; vertical-align: middle; text-align: center;">Telat</th>
                <th style="font-weight: bold; vertical-align: middle; text-align: center;">Izin</th>
                <th style="font-weight: bold; vertical-align: middle; text-align: center;">{{ $task }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($acumulations as $acumulation)
                <tr>
                    @foreach ($rowNames as $userName)
                        @if($acumulation->name == $userName->name)
                            <td style="font-weight: bold; vertical-align: middle; text-align: center;" rowspan="2">{{ $userName->name }}</td>
                        @endif
                    @endforeach
                    
                    @php $elseTask = $task == 'Bot' ? 'Clone' : 'Bot'; @endphp
                    @foreach ($rowDatas as $userData)
                        @if($userData->user->name == $acumulation->name && $userData->task != $elseTask)
                            <td style="vertical-align: middle; text-align: center;">{{ $userData->status_desc }}</td>
                        @elseif($userData->user->name == $acumulation->name)
                            <td style="vertical-align: middle; text-align: center;"> - </td>
                        @endif
                    @endforeach

                    <td style="vertical-align: middle; text-align: center;" rowspan="2">{{ $acumulation->alphas }}</td>
                    <td style="vertical-align: middle; text-align: center;" rowspan="2">{{ $acumulation->telats }}</td>
                    <td style="vertical-align: middle; text-align: center;" rowspan="2">{{ $acumulation->izins }}</td>
                    <td style="vertical-align: middle; text-align: center;" rowspan="2">{{
                        $task == 'Bot' ? $acumulation->bots : $acumulation->clones
                    }}</td>
                </tr>
                <tr>
                    @foreach ($rowDatas as $userData)
                        @if($userData->user->name == $acumulation->name && ($userData->task == $task || $userData->task == 'Lainnya'))
                            <td style="vertical-align: middle; text-align: center;">{{ $userData->task_desc }}</td>
                        @elseif($userData->user->name == $acumulation->name)
                            <td style="vertical-align: middle; text-align: center;"> - </td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>