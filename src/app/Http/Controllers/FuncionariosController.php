<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\Http\Requests\FuncionariosFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FuncionariosController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index(Request $request)
    {
        $funcionarios = Funcionario::query()
            ->orderBy('nome_completo')
            ->get();
        $mensagem = $request->session()->get('mensagem');

        return view('funcionarios.index', compact('funcionarios', 'mensagem'));

    }

    public function search(Request $request)
    {
        //TO DO
        //$results = $this->funcionario->search($request->filter);
        //dd($request->all());
        return redirect()->route('lista_funcionario');
    }


    public function create()
    {
        return view('funcionarios.create');
    }

    public function store(FuncionariosFormRequest $request)
    {
        $adminstrador_id = Auth::id(); // Administrador é o ID da pessoa que está logada
        $data = $request->except('_token');
        $data["senha"] = Hash::make($data['senha']); //Convertendo a senha para o hash do laravel

        $user = new \App\User();
        $user->name = $data['nome_completo'];
        $user->password = $data['senha'];
        $user->email = $data['login'];
        $user->save();

        $data["user_id"] = $user->id;
        $data["administrador_id"] = $adminstrador_id;
        $data["senha"] = Hash::make($data['senha']);
        $data["saldo_atual"] = Funcionario::SALDO_INICIO;

        $funcionario = Funcionario::create($data);

        $request->session()
            ->flash(
                'mensagem',
                "Funcionário {$funcionario->id} criado com sucesso {$funcionario->nome_completo}"
            );

        return redirect()->route('lista_funcionario');
    }

    public function destroy(Request $request)
    {
        Funcionario::destroy($request->id);
        $request->session()
            ->flash(
                'mensagem',
                "Funcionario removido com sucesso"
            );
        return redirect()->route('lista_funcionario');
    }

    public function editaNome($id,Request $request)
    {
        $novoNome = $request->nome_completo;
        $funcionario = Funcionario::find($id);
        $funcionario->nome_completo = $novoNome;
        $funcionario->save();

    }

}
