<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthenticateController extends Controller {
    
    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function home() {
        
        return view('home');
    } 

    public function dashboard() {
        return view('auth.dashboard');
    }

    public function login() {
        
        return view('auth.login');
    }

    public function logar(Request $request) {

        $data = $request->all();

        $login = $data['login'];
        $password = $data['password'];

        $user = $this->user->where('login', $login)->first();
        
        if(Auth::check() || ($user && Hash::check($password, $user->password) ) ) {
            Auth::login($user);

            return redirect( route('dashboard') );
        }
        else{
            return redirect( route('login') );
        }
    }

    public function logout() {
        
        Auth::logout();

        return redirect(route('home'));
    }
}
