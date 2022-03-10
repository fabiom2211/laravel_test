@extends('layout')

@section('cabecalho')
    Funcionários
@endsection

@section('conteudo')

    @if(!empty($mensagem))
        <div class="alert alert-success">
            {{ $mensagem }}
        </div>
    @endif

    <div class="row form-group">
        <div class="col-md-6">
            <form action="{{ route('funcionario.search') }}" method="post" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtrar: " class="form-control mt-1">
                <button class="btn btn-outline-primary mt-1" type="submit">Filtrar</button>
            </form>
        </div>
        <div class="col-md-6 text-right ">
            <a href="{{ route('form_criar_funcionario') }}" class="btn btn-dark mb-2">Cadastrar Funcionário</a>
        </div>
    </div>

    <table class="table table-sm table-bordered mt-2">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome Completo</th>
            <th scope="col">Saldo</th>
            <th scope="col">Administrador</th>
            <th scope="col">Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($funcionarios as $funcionario)
            <tr>
                <td>{{$funcionario->id}}</td>
                <td>
                    <span id="nome-funcionario-{{ $funcionario->id }}">
                        {{ $funcionario->nome_completo }}
                    </span>
                    <div class="input-group w-50" hidden id="input-nome-funcionario-{{ $funcionario->id }}">
                        <input type="text" class="form-control" value="{{ $funcionario->nome_completo }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" onclick="editarFuncionario({{ $funcionario->id }})" title="Salvar Nome">
                                <i class="fas fa-check"></i>
                            </button>
                            @csrf
                        </div>
                    </div>
                </td>
                <td>{{ $funcionario->saldo_atual }}</td>
                <td>{{ $funcionario->administrador->nome_completo }}</td>
                <td class="d-flex text-center">
                    <button class="btn btn-warning btn-sm mr-1" onclick="toggleInput({{$funcionario->id}})"  title="Editar Nome">
                        <i class="far fa-edit"></i>
                    </button>
                    <a href="/funcionario/{{ $funcionario->id }}/movimentacao" class="btn btn-info btn-sm mr-1" title="Movimentação">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                    <form method="post" title="Excluir" action="/funcionarios/{{ $funcionario->id }}"
                          onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($funcionario->nome_completo) }}?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $funcionarios->links() }}
<script>
    function toggleInput(funcionarioId) {
        const nomeFuncionarioEl = document.getElementById(`nome-funcionario-${funcionarioId}`);
        const inputFuncionarioEl = document.getElementById(`input-nome-funcionario-${funcionarioId}`);
        if (nomeFuncionarioEl.hasAttribute('hidden')) {
            nomeFuncionarioEl.removeAttribute('hidden');
            inputFuncionarioEl.hidden = true;
        } else {
            inputFuncionarioEl.removeAttribute('hidden');
            nomeFuncionarioEl.hidden = true;
        }
    }

    function editarFuncionario(funcionarioId) {
        let formData = new FormData();
        const nome_completo = document
            .querySelector(`#input-nome-funcionario-${funcionarioId} > input`)
            .value;
        const token = document
            .querySelector(`input[name="_token"]`)
            .value;
        formData.append('nome_completo', nome_completo);
        formData.append('_token', token);
        const url = `/funcionarios/${funcionarioId}/editaNome`;
        fetch(url, {
            method: 'POST',
            body: formData
        }).then(() => {
            toggleInput(funcionarioId);
            document.getElementById(`nome-funcionario-${funcionarioId}`).textContent = nome_completo;
        });

    }
</script>
@endsection
