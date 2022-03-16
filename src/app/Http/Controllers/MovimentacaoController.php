<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovimentacaoFormRequest;
use App\Models\Funcionario;
use App\Models\Movimentacao;
use Illuminate\Support\Facades\Auth;

class MovimentacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index(int $funcionarioId)
    {
        $movimentacoes = Funcionario::find($funcionarioId)->movimentacao;
        return view('movimentacao.index', compact("movimentacoes", "funcionarioId"));
    }

    public function criarMovimentacao($funcionarioId)
    {
        $funcionarios = Funcionario::all();
        return view('movimentacao.create', compact('funcionarios','funcionarioId'));
    }

    public function create()
    {
        $funcionarios = Funcionario::all();
        return view('movimentacao.create', compact('funcionarios'));
    }

    public function store(MovimentacaoFormRequest $request)
    {
        $data = $request->except('_token');
        $data["administrador_id"] = Auth::id();
        $movimentacao = Movimentacao::create($data);

        $funcionario = Funcionario::find($movimentacao->funcionario_id);
        $funcionario->saldo_atual = $this->saldoAtual($movimentacao->funcionario_id);
        $funcionario->save();

        $request->session()
            ->flash(
                'mensagem',
                "Movimentacao {$movimentacao->id} criado com sucesso"
            );

        return redirect()->route('lista_funcionario');
    }

    public function saldoAtual($funcioario_id){
        $entrada = Movimentacao::where('funcionario_id', $funcioario_id)->where("tipo_movimentacao", 'entrada')->sum("valor");
        $saida = Movimentacao::where('funcionario_id', $funcioario_id)->where("tipo_movimentacao", 'saida')->sum("valor");
        $saldo_atual = $entrada - $saida;
        return $saldo_atual;
    }
}
