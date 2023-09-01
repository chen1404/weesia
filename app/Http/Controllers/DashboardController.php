<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Absen;
use App\Models\AbsenUsers;
use App\Exports\AbsenUsersExport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Excel as ExcelExcel;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function exportAbsen(Request $request) {
        $task = $request->task;
        
        list($from, $to) = $this->dashboardAbsenDate($request->moves, $request->date);
        list(
            $activeStats, 
            $colDates, 
            $colLastDate,
            $rowNames,
            $rowDatas,
            $acumulations
        ) = $this->dashboardAbsen($from, $to, $request);

        return Excel::download(new AbsenUsersExport(
            $activeStats, 
            $colDates,
            $rowNames,
            $rowDatas,
            $acumulations,
            $task,
        ), 'absen.xlsx', ExcelExcel::XLSX);
    }
    
    public function toDashboard(Request $request) {
        list($from, $to) = $this->dashboardAbsenDate($request->moves, $request->date);
        list(
            $activeStats, 
            $colDates, 
            $colLastDate,
            $rowNames,
            $rowDatas,
            $acumulations
        ) = $this->dashboardAbsen($from, $to, $request);

        return view('dashboard.absen', [
            'activeStats' => $activeStats,
            'colDates' => $colDates,
            'colLastDate' => $colLastDate,
            'rowNames' => $rowNames,
            'rowDatas' => $rowDatas,
            'acumulations' => $acumulations,
            'dateShown' => [$from, $to],
        ]);
    }
    
    public function dashboardAbsenDate($moves, $date) {
        if($moves == 'next') {
            $from = Carbon::parse($date)->format('Y-m-d');
            $to = (Carbon::parse($date)->format('d') == 16)
                ? Carbon::parse($date)->lastOfMonth()->addDay()->format('Y-m-d')
                : Carbon::parse($from)->setDay(16)->format('Y-m-d');
        } else if($moves == 'prev') {
            $to = Carbon::parse($date)->format('Y-m-d');
            $from = (Carbon::parse($date)->format('d') == 1)
                ? Carbon::parse($to)->setDay(16)->subMonth()->format('Y-m-d')
                : Carbon::parse($to)->startOfMonth()->format('Y-m-d');
        } else {
            $from = Carbon::now()->startOfMonth()->format('Y-m-d');
            $to = Carbon::now()->setDay(16)->format('Y-m-d');
    
            if(Carbon::now()->format('d') > 15) {
                $from = $to;
                $to = Carbon::now()->lastOfMonth()->format('Y-m-d');
            }
        }

        return array($from, $to);
    }
    
    public function dashboardAbsen($from, $to, $request) {
        //--- Active Status Section
        $totalBot = Absen::all()->whereBetween('created_at', [$from, $to])->sum('count_bot');
        $totalClone = Absen::all()->whereBetween('created_at', [$from, $to])->sum('count_clone');

        $playMe = Absen::all()->whereBetween('created_at', [$from, $to])->sum('count_alpha');
        $totalUser = AbsenUsers::all()->whereBetween('created_at', [$from, $to])->groupBy('user_id')->count();
        $absenPercentage = (int) ((16 * $totalUser - $playMe) / $totalUser * 6.25);

        $activeStats = [
            'bot' => $totalBot,
            'clone' => $totalClone,
            'percentage' => $absenPercentage,
        ];
        //--- End Active Status Section
        

        //--- Substract 'to' date
        $toMinusOne = Carbon::parse($to)->subDay();


        //--- Date Section
        $colDates = AbsenUsers::all()->whereBetween('created_at', [$from, $toMinusOne])->groupBy('absen');
        $colLastDate = Absen::all()->first();
        //--- End Date Section


        //--- Data user section
        $rowNames = DB::table('users')
                        ->select('users.name')
                        ->join('absen_users','users.id','=','absen_users.user_id')
                        ->where('name', 'Like', '%' . $request->name . '%') // ++ Search ++
                        ->whereBetween('absen_users.created_at', [$from, $toMinusOne])
                        ->groupBy('users.name')->get();
        $rowDatas = AbsenUsers::all()->whereBetween('created_at', [$from, $toMinusOne]);
        //--- End Data user section


        //--- Acumulation Section
        $acumulations = DB::table('absen_users')
                    ->join('users', 'absen_users.user_id', '=', 'users.id')
                    ->select('users.name', DB::raw(
                        'COUNT(CASE WHEN absen_users.status_desc = "Alpha" THEN 1 END) AS alphas, 
                        COUNT(CASE WHEN absen_users.status_desc = "Telat" THEN 1 END) AS telats, 
                        COUNT(CASE WHEN absen_users.work = "Izin" THEN 1 END) AS izins,
                        SUM(CASE WHEN task = "Clone" THEN task_desc END) AS clones,
                        SUM(CASE WHEN task = "Bot" THEN task_desc END) AS bots'
                    ))
                    ->where('name', 'Like', '%' . $request->name . '%')
                    ->whereBetween('absen_users.created_at', [$from, $toMinusOne])
                    ->groupBy('users.name')
                    ->get();

        if ($request->sort && $request->order) {
            $acumulations = DB::table('absen_users')
                    ->join('users', 'absen_users.user_id', '=', 'users.id')
                    ->select('users.name', DB::raw(
                        'COUNT(CASE WHEN absen_users.status_desc = "Alpha" THEN 1 END) AS alphas, 
                        COUNT(CASE WHEN absen_users.status_desc = "Telat" THEN 1 END) AS telats, 
                        COUNT(CASE WHEN absen_users.work = "Izin" THEN 1 END) AS izins,
                        SUM(CASE WHEN task = "Clone" THEN task_desc END) AS clones,
                        SUM(CASE WHEN task = "Bot" THEN task_desc END) AS bots'
                    ))
                    ->where('name', 'Like', '%' . $request->name . '%')
                    ->orderBy($request->sort, $request->order)
                    ->whereBetween('absen_users.created_at', [$from, $toMinusOne])
                    ->groupBy('users.name')
                    ->get();
        }
        //--- End Acumulation Section


        return array(
            $activeStats,
            $colDates,
            $colLastDate,
            $rowNames,
            $rowDatas,
            $acumulations,
        );
    }

    public function toDashboardMember(Request $request) {
        if(!$request->role || $request->role == 'member') {
            $title = 'member';
            $users = User::all()->where('level', '!=', 'admin')->where('level', '!=', 'customer')->sortBy('name');
        } else {
            $title = $request->role;
            $users = User::all()->where('level', $request->role)->sortBy('name');
        }

        foreach($users as $user) {
            $user->date = Carbon::parse($user->created_at)->translatedFormat('d F Y');
        }

        $result = $this->countUserRole();
        list($option, $roleQueue) = $this->dashboardMemberQueue($title);

        return view('dashboard.member', [
            'title' => ucfirst($title),
            'users' => $users,
            'roleQueue' => $roleQueue,
            'option' => $option,
            'count' => $result,
        ]);
    }

    public function countUserRole() {
        $totalMember = User::all()->where('level', '!=', 'admin')->where('level', '!=', 'customer')->count();
        $totalCustomer = User::all()->where('level', 'customer')->count();
        $totalAdmin = User::all()->where('level', 'admin')->count();

        return array(
            'member' => $totalMember,
            'customer' => $totalCustomer,
            'admin' => $totalAdmin,
        );
    }

    public function dashboardMemberQueue($role) {
        switch($role) {
            case 'member':
                $option = 'kick';
                $roleQueue = ['customer', 'admin'];
                break;
            case 'admin':
                $option = 'demote';
                $roleQueue = ['member', 'customer'];
                break;
            case 'customer':
                $option = 'banned';
                $roleQueue = ['admin', 'member'];
                break;
        }

        return array($option, $roleQueue);
    }

    public function dashboardMemberDelete($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/dashboard/member');
    }
    public function dashboardMemberDemoted($id) {
        $user = User::findOrFail($id);
        $user->update(['level' => 'elder']);

        return redirect('/dashboard/member');
    }

    public function dashboardMemberRole(Request $request) {
        $id = $request->id;
        $level = $request->level;

        $user = User::findOrFail($id);
        $user->update(['level' => $level]);

        return redirect('/dashboard/member');
    }

    public function dashboardMemberToken(Request $request) {
        // get token from params
        $token = $request->code;
        // edit config for current runtime
        config(['constants.TOKEN_MEMBER' => $token]);
        // open config file for writing
        $fp = fopen(base_path() .'/config/constants.php' , 'w');
        // write updated runtime config to file
        fwrite($fp, '<?php return ' . var_export(config('constants'), true) . ';');
        // close the file
        fclose($fp);
        // clear config cache
        Artisan::call('config:cache');
        // return back
        // return redirect('http://127.0.0.1:8000/dashboard/member');
        return redirect('https://weesia.com/dashboard/member');
    }

}
