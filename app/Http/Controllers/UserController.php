<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller {
        
    private $user;
    
    /**
     *
     * @param User $user
     */
    public function __construct(User $user) {
        $this->user = $user;
    }

    public function home() {
        
        return view('home');
    }


    /**
     * Retornando a view para formulario de cadastro
     *
     * @return void
     */
    public function register() {
        
        return view('users.register');
    }

    /**
     * Criando um novo usuário
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request) {
        
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        
        $this->user->create($data);

        return redirect()->route('home');
    }
}
