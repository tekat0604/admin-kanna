<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class LoginController extends Controller
{
    public function index()
    {
        $kanna["title"]  = 'login';
        if (Auth::check()) {
            return redirect('home');
        }else{
            return view('login', $kanna);
        }
    }

    public function actionlogin(Request $request)
    {
        $data = [
            'name' => $request->input('username'),
            'password' => $request->input('password'),
        ];
        if (Auth::Attempt($data)) {
            return redirect('login');
        }else{
            Session::flash('error', 'Username atau Password Salah !');
            return redirect('login');
        }
    }
    public function actionlogout()
    {
        Auth::logout();
        return redirect('login');
    }
    public function home()
    {
        $kanna["title"]    = 'Dashboard';
        $tahun             = date("Y",strtotime(now()));
        $kanna["tahun"]    = $tahun;

        return view('dashboard', $kanna);
    }
}
