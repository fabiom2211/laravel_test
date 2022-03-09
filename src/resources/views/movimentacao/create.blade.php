@extends('layout')

@section('cabecalho')
    Cadastrar Movimentação
@endsection

@section('conteudo')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="/movimentacao/criar">
        @csrf
        <div class="row form-group">
            <div class="col-md-2">
                <label for="tipo_movimentacao" class="">Tipo Movimentação</label>
                <select class="form-control" name="tipo_movimentacao" id="tipo_movimentacao">
                    <option></option>
                    <option value="entrada">Entrada</option>
                    <option value="saida">Saída</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="valor" class="">Valor</label>
                <input type="text" class="form-control" name="valor" id="valor">
            </div>
            <div class="col-md-2">
                <label for="funcionario_id" class="">Funcionário</label>
                <select class="form-control" name="funcionario_id" id="funcionario_id">
                    <option></option>
                    @foreach ($funcionarios as $funcionario)
                        <option
                            value={{$funcionario->id}}
                            @if (isset($funcionarioId) && $funcionario->id == $funcionarioId) selected @endif
                        >
                            {{ $funcionario->nome_completo }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-6">
                <label for="observacao" class="">Observação</label>
                <input type="text" class="form-control" name="observacao" id="observacaosenha">
            </div>
        </div>
        <button class="btn btn-primary mt-2">Adicionar</button>
    </form>
@endsection
