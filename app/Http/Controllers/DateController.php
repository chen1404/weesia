<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DateController extends Controller
{
    public function convertDaytoBahasa($day) {
        switch($day) {
            case 'Sunday':
                return 'Minggu';
            case 'Monday':
                return 'Senin';
            case 'Tuesday';
                return 'Selasa';
            case 'Wednesday';
                return 'Rabu';
            case 'Thursday':
                return 'Kamis';
            case 'Friday':
                return 'Jumat';
            case 'Saturday':
                return 'Sabtu';
            default:
                return 'Hari';
        }
    }

    
    public function convertMonthtoBahasa($month) {
        switch ($bulan = $month) {
            case 'January':
                return 'Januari';
            case 'February':
                return 'Februari';
            case 'March':
                return 'Maret';
            case 'May':
                return 'Mei';
            case 'June':
                return 'Juni';
            case 'July':
                return 'Juli';
            case 'August':
                return 'Agustus';
            case 'October':
                return 'Oktober';
            case 'December':
                return 'Desember';
            default:
                return $bulan;
        }
    }


    public function intervalDay() {
        // $dateToday = date_create($todaysDate);
        // $dateAbsen = date_create($absenDate->created_at);
        // $interval = date_diff($dateAbsen, $dateToday);
    }
}
