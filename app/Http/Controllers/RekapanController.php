<?php

namespace App\Http\Controllers;

use App\Models\Rekapan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RekapanController extends Controller
{
    public function createForm() {
        // $bahasaMonth = $this->convertMothtoBahasa(date("F"));
        // $dateToday = date("d ") . $bahasaMonth . date(" Y");
        // return view('member.rekapan.create', [
        //     'date' => $dateToday,
        // ]);

        return view('member.rekapan.create');
    }

    public function updateForm(Rekapan $id) {
        // $bahasaMonth = $this->convertMonttoBahasa(strtotime(date("F")));
        // $dateToday = date("d ") . $bahasaMonth . date(" Y");
        // 'date' => $dateToday,
        
        return view('member.rekapan.update', [
            'recap' => $id,
        ]);
    }
    

    public function readRekapan() {
        $recaps = Rekapan::all()->sortByDesc('title');
        
        // $bahasaMonth = $dateClass->convertMonthtoBahasa(date("F"));
        // $lastChanged = date("d ", strtotime($date)) . $bahasaMonth . date(" Y", strtotime($date));
        $dateChanged = DB::table('recaps')->pluck('updated_at')->sortByDesc('updated_at')->last();
        list($date) = explode(" ", str($dateChanged));
        $lastChanged = Carbon::parse($date)->translatedFormat('d F Y');

        return view('member.rekapan', [
            'recaps' => $recaps,
            'date' => $lastChanged,
        ]);
    }

    public function createRekapan(Request $request) {
        $request->validate([
            "dateFrom" => 'required|string|date',
            "dateTo" => 'required|string|date',
            "link" => 'required|string',
        ]);


        $latestTask = DB::table('recaps')->pluck('title')->last();
        $arrTask = explode(' ', str($latestTask));
        $incrTask = ++$arrTask[1];


        $fromDate = $request->get('dateFrom');
        $toDate = $request->get('dateTo');
        $dateArr = [$fromDate, $toDate];

        // $bulan = $dateClass->convertMonthtoBahasa(date('F', strtotime($date)));
        // $formatDate = date('d ', strtotime($date)) . $bulan . date(' Y', strtotime($date));
        $i = 0;
        foreach($dateArr as $date) {
            $formatDate = Carbon::parse($date)->translatedFormat('d F Y');
            $dateArr[$i++] = $formatDate;
        }
        $formatDate = $dateArr[0] . ' - ' . $dateArr[1];

        
        $recap = new Rekapan([
            "title" => 'Tugas ' . str($incrTask),
            "date" => $formatDate,
            "link" => $request->get('link')
        ]);
        $recap->save();

        return redirect('/member/rekapan')->with('success', 'Tugas berhasil ditambahkan!');
    }

    public function updateRekapan(Request $request, $id) {
        $recap = Rekapan::findOrFail($id);

        $validateData = $request->validate([
            "date" => 'required|string',
            "link" => 'required|string',
        ]);
        $recap->update($validateData);

        return redirect('/member/rekapan')->with('success', 'Tugas berhasil diperbarui!');
    }

    public function deleteRekapan($id) {
        $recap = Rekapan::findOrFail($id);
        $recap->delete();

        return redirect('/member/rekapan')->with('success', 'Tugas berhasil dihapus!');
    }
}
