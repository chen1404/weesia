<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\AbsenUsers;
use App\Models\User;
// use Carbon\Carbon as CarbonCarbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AbsenController extends Controller
{
    public function absenHome() {
        
        $lastAbsenUsr = AbsenUsers::where('user_id', Auth::user()->id)->latest()->first();
        $todaysDate = Carbon::parse($lastAbsenUsr->created_at)->translatedFormat('l, d F Y');
        $absenUser = AbsenUsers::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        
        $works = ['WFO', 'WFH', 'Izin'];
        $icons = [
            '<svg viewBox="0 0 512 512" fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_283_2)"><path d="M243.8 339.8C232.9 350.7 215.1 350.7 204.2 339.8L140.2 275.8C129.3 264.9 129.3 247.1 140.2 236.2C151.1 225.3 168.9 225.3 179.8 236.2L224 280.4L332.2 172.2C343.1 161.3 360.9 161.3 371.8 172.2C382.7 183.1 382.7 200.9 371.8 211.8L243.8 339.8ZM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256ZM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48Z" /></g><defs><clipPath id="clip0_283_2"><rect width="512" height="512" /></clipPath></defs>
            </svg>',
            '<svg xmlns="http://www.w3.org/2000/svg" fill="#FFFFFF" viewBox="0 0 512 512">
                <path d="M175 175C184.4 165.7 199.6 165.7 208.1 175L255.1 222.1L303 175C312.4 165.7 327.6 165.7 336.1 175C346.3 184.4 346.3 199.6 336.1 208.1L289.9 255.1L336.1 303C346.3 312.4 346.3 327.6 336.1 336.1C327.6 346.3 312.4 346.3 303 336.1L255.1 289.9L208.1 336.1C199.6 346.3 184.4 346.3 175 336.1C165.7 327.6 165.7 312.4 175 303L222.1 255.1L175 208.1C165.7 199.6 165.7 184.4 175 175V175zM512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256zM256 48C141.1 48 48 141.1 48 256C48 370.9 141.1 464 256 464C370.9 464 464 370.9 464 256C464 141.1 370.9 48 256 48z"/>
            </svg>',
        ];
        $svg = [
            'done' => $icons[0],
            'pending' => $icons[1],
            'pass' => $icons[1],
        ];

        return view('member.absen', [
            'userAbsens' => $absenUser,
            'works' => $works,
            'svg' => $svg,
            'latestUsrAbsen' => $lastAbsenUsr,
            'dateToday' => $todaysDate,
        ]);
    }

    public function absenAdd(Request $request, $id) {
        //--- validate input data
        $request->validate([
            "sistem-kerja" => 'required|string',
            "tugas" => 'required|string',
            "deskripsi-tugas" => 'required',
        ]);
        
        //--- find a row from user's absen table by id
        $absenUser = AbsenUsers::findOrFail($id);
        //--- format the date into: Year month day
        $dateAbsen = $absenUser->created_at->format('Y-m-d');
        //--- get local's date today, with a same format
        $todaysDate = Carbon::now('Asia/Makassar')->format('Y-m-d');
        
        //--- parse both date to be the same date type, for comparing
        $dateCreatedAt = Carbon::parse($dateAbsen);
        $todaysDate = Carbon::parse($todaysDate);
        //--- if both dates are equal, status description will be 'Hadir' else 'Telat'
        $desc = $dateCreatedAt->isSameDay($todaysDate) ? 'Hadir' : 'Telat';

        //--- updates user's absen row
        $absenUser->update([
            'work' => $request->get('sistem-kerja'),
            'task' => $request->get('tugas'),
            'task_desc' => $request->get('deskripsi-tugas'),
            'status' => 'done',
            'status_desc' => $desc,
        ]);


        //--- Updates work count
        $absenDate = Absen::findOrFail($absenUser->absen->id);
        if($request->get('tugas') == 'Bot') {
            $absenDate->update([
                'count_bot' => $absenDate->count_bot + $request->get('deskripsi-tugas'),
            ]);
        } elseif($request->get('tugas') == 'Clone') {
            $absenDate->update([
                'count_clone' => $absenDate->count_clone + $request->get('deskripsi-tugas'),
            ]);
        }

        return redirect('/member/absen#kehadiran');
    }

    public static function absenCheck() {
        //--- get latest record from table absens
        $absenDate = DB::table('absens')->orderBy('created_at', 'desc')->value('created_at');

        //--- get local's date today
        $todaysDate = Carbon::now('Asia/Makassar');

        //--- counts the interval between latest date to today's date, and get the gap
        $dateToday = Carbon::parse($todaysDate);
        $dateAbsen = Carbon::parse($absenDate);
        $gapday = $dateAbsen->diffInDays($dateToday);
        
        //--- Create a new Absen record as many as the gap day is
        $pastDate = $dateAbsen;
        // dd($absenDate, $gapday);
        for ($i = 0; $i < $gapday; $i++) {

            //--- sum the latest absen to 1 day
            $pastDate = Carbon::parse($pastDate)->addDay();
            
            //--- make the date format readable
            $dateNormie = Carbon::parse($pastDate)->translatedFormat('d F Y');

            //--- Do, if the result of sum date is more than today's date
            if($pastDate > $todaysDate) {
                //--- stop the loop
                break;
            }

            //--- create a new absens record
            Absen::create([
                'date' => $dateNormie,
                'count_clone' => 0,
                'count_bot' => 0,
                'count_alpha' => 0,
                'created_at' => date_format($pastDate, 'Y-m-d'),
            ]);
        }

        //--- update users absen
        self::userAbsenCheck();
    }

    public static function userAbsenCheck() {
        //--- get all record from absens table
        $absens = Absen::get();
        $users = User::where('level', '!=', 'admin')->where('level', '!=', 'customer')->get();
        
        //--- Check every absen to be equal to user's absen
        foreach($absens as $absen) {
            $alphaCount = $absen->count_alpha;

            //--- Check every user
            foreach($users as $user) {
                //--- get date from absen's row
                $absenDate = $absen->created_at->format('Y-m-d 00:00:00');
                //--- get a row from user's absen where date is equal to absen's date
                $userAbsen = AbsenUsers::where('user_id', $user->id)->where('created_at', $absenDate)->first();

                //--- If the data is found, Update it. Else, Create it
                if($userAbsen) {
                    //--- If the data's status is pending, do-
                    if($userAbsen->status == 'pending') {
                        //--- get status and the description, from a function that return array
                        list($status, $status_desc) = self::getStatusDesc($absenDate);
        
                        //--- Update the row
                        AbsenUsers::findOrFail($userAbsen->id)->update([
                            'status' => $status,
                            'status_desc' => $status_desc,
                        ]);

                        //--- Check if its alpha, then Count
                        if($status_desc == 'Alpha') {
                            Absen::findOrFail($absen->id)->update([
                                'count_alpha' => ++$alphaCount,
                            ]);
                        }
                    } 
                //--- Create user's absen data
                } else {
                    // NEW CODE BUGABLE
                    if(Carbon::parse($absen->created_at)->format('Y-m') >= Carbon::parse($user->created_at)->format('Y-m')) {
                        //--- get status and the description, from a function that return array
                        list($status, $status_desc) = self::getStatusDesc($absenDate);
    
                        //--- Create a row of user's absen data
                        AbsenUsers::create([
                            'status' => $status,
                            'status_desc' => $status_desc,
                            'absen_id' => $absen->id,
                            'user_id' => $user->id,
                            'created_at' => $absen->created_at,
                        ]);
    
                        //--- Check if its alpha, then Count
                        if($status_desc == 'Alpha') {
                            Absen::findOrFail($absen->id)->update([
                                'count_alpha' => ++$alphaCount,
                            ]);
                        }
                    }
                }
            }
        }
    }

    public static function getStatusDesc($dateCreatedAt) {
        //--- get local's date today
        $todaysDate = Carbon::now('Asia/Makassar')->format('Y-m-d 00:00:00');
        
        //--- parse both date to be the same date type, for comparing
        $dateCreatedAt = Carbon::parse($dateCreatedAt);
        $todaysDate = Carbon::parse($todaysDate);

        //--- 2 conditions get the same value. therefore, set a variable and its value
        $status = 'pending';

        //--- If user's absen date is equal to today's date, do-
        if($dateCreatedAt->isSameDay($todaysDate)) {
            $status_desc = 'Absen';
        //--- If user's absen date plus One, is equal to today's date, do-
        } else if(Carbon::parse($dateCreatedAt)->addDay() == $todaysDate) {
            $status_desc = 'Telat';
        //--- Else, set the description to Alpha and the status is pass
        } else {
            $status = 'pass';
            $status_desc = 'Alpha';
        }

        //--- return status and its description, using array
        return array($status, $status_desc);
    }

}