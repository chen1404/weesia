<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm() {
        return view('auth.login');
    }
    public function regisForm() {
        return view('auth.register');
    }

    public function register(Request $request) {
        if ($request->get('password') == $request->get('confirm_password')) {
            $emailExist = DB::table('users')->where('email', $request->email)->first();
            if($emailExist) {
                session()->flash('error', 'Email yang anda masukkan sudah digunakan');
                return redirect('/register');
            } else {
                $regis = True;
                if($request->get('is_member') == 'member') {
                    $usrToken = $request->get('token');
                    $tokenCode = config('constants.TOKEN_MEMBER');
                    $regis = ($usrToken == $tokenCode) ? True : False;
                }
                if($regis) {
                    User::create([
                        'name' => $request->get('name'),
                        'mobile' => $request->get('mobile'),
                        'email' => $request->get('email'),
                        'password' => Hash::make($request->get('password')),
                        'level' => $request->get('is_member'),
                    ]);
        
                    session()->flash('success', 'Berhasil mendaftarkan akun anda!');
                    return redirect('/');
                } else {
                    session()->flash('error', 'Token yang anda masukkan salah');
                    return redirect('/register');
                }
            }
        } else {
            session()->flash('error', 'Konfirmasi password anda berbeda');
            return redirect('/register');
        }
    }

    public function login(Request $request) {
        $data = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];

        if (Auth::Attempt($data)) {
            AbsenController::absenCheck();
            if(Auth::user()->level == 'admin') {
                return redirect('/dashboard/member');
            } else {
                return redirect('/member');
            }
        } else {
            session()->flash('error', 'Email atau Password Salah');

            return redirect('/');
        }
    }

    public function logout() {
        Auth::logout();
        session()->flash('success-logout', 'Berhasil Logout');
        return redirect('/');
    }
}
