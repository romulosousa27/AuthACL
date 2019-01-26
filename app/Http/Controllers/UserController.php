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

    public function list() {

        $users = $this->user->all();

        return view('users.list', compact('users'));
    }

    public function edit($id) {
        
        // Verificando permissão
        $this->authorize('update', $this->user);

        $user = $this->user->find($id);
         
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id) {
        
        // Verificando permissão
        $this->authorize('update', $this->user);
        
        $data = $request->all();
        
        $user = $this->user->find($id);
        
        // Verificação de Senha
        if(!$data['password']) {
            $old = $user->password;
            $data['senha'] = $old;
            $user->update($data);
        }
        else{
            $new = bcrypt($data['password']);
            $data['password'] = $new;
            $user->update($data);
        }
      
        return redirect()->route('list');
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
