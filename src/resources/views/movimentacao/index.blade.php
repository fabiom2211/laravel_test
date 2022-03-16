@extends('layout')

@section('cabecalho')
    Movimentações
@endsection

@section('conteudo')

    <div class="row form-group">
        <div class="col-md-12">
            <a href="{{ route('lista_funcionario') }}" class="btn btn-info btn-sm mr-1" title="Voltar para a lista de funcionários">
                Voltar
            </a>
            <a href="/movimentacao/{{ $funcionarioId }}/criar" class="btn btn-success btn-sm mr-1" title="cadastrar Movientação">
                Cadastrar
            </a>
        </div>
    </div>
    <table class="table table-sm table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Data</th>
            <th scope="col">Tipo</th>
            <th scope="col">Valor</th>
            <th scope="col">Observação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($movimentacoes as $movimentacao)
            <tr>
                <td>{{$movimentacao->id}}</td>
                <td>{{ date("d/m/Y", strtotime($movimentacao->created_at )) }}</td>
                <td>{{$movimentacao->tipo_movimentacao}}</td>
                <td>{{$movimentacao->valor}}</td>
                <td>{{$movimentacao->observacao}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
