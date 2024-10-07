<?php

namespace App\Http\Controllers;

// use Illuminate\Contracts\Session\Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function proses_login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('dashboard');
        } else {
            // return redirect()->route('login')->with('error');
            // return redirect()->route('dashboard');
            Session::flash('error', 'name atau password salah');
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        // dd('oke');
        Auth::logout();
        return redirect()->route('login')->with('success', 'kamu berhasil');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function proses_register(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
        ]);

        // $request = Validator::make(
        //     $request->all(),
        //     [
        //         'name' => 'required',
        //         'email' => 'required,|email|unique:user,email',
        //         'password' => 'required |min:8',
        //     ]
        // );
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            // 'is_admin' => true,
        ];
        User::create($data);
        return redirect()->route('login')->with('success', 'kamu berhasil');
    }
}
