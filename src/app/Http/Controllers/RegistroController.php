<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function create()
    {
        return view('registro.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        Auth::login($user);
        $adminstrador_id = Auth::id();

        $administrador = new Administrador();
        $administrador->nome_completo = $user->name;
        $administrador->user_id = $adminstrador_id;
        $administrador->save();

        return redirect()->route('lista_funcionario');
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/entrar");
    }
}
