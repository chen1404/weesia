<?php

namespace App\Exports;

use App\Models\AbsenUsers;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AbsenUsersExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // { FromCollection, 
    //     return AbsenUsers::all();
    // }

    protected $activeStats,
            $colDates,
            $rowNames,
            $rowDatas,
            $acumulations,
            $task;

    function __construct($activeStats, $colDates, $rowNames, $rowDatas, $acumulations, $task) {
        $this->activeStats = $activeStats;
        $this->colDates = $colDates;
        $this->rowNames = $rowNames;
        $this->rowDatas = $rowDatas;
        $this->acumulations = $acumulations;
        $this->task = $task;
    }

    public function view(): View {
        return view('dashboard.export.absen', [
            'activeStats' => $this->activeStats,
            'colDates' => $this->colDates,
            'rowNames' => $this->rowNames,
            'rowDatas' => $this->rowDatas,
            'acumulations' => $this->acumulations,
            'task' => $this->task,
        ]);
    }
}
