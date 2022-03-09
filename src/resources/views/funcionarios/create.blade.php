@extends('layout')

@section('cabecalho')
    Cadastrar Funcionário
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

    <form method="post">
        @csrf
        <div class="row form-group">
            <div class="col-md-6">
                <label for="nome_completo" class="">Nome Completo</label>
                <input type="text" class="form-control" name="nome_completo" id="nome_completo">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-3">
                <label for="login" class="">Email</label>
                <input type="text" class="form-control" name="login" id="login">
            </div>
            <div class="col-md-3">
                <label for="senha" class="">Senha</label>
                <input type="password" class="form-control" name="senha" id="senha">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <button class="btn btn-primary mt-2">Cadastrar</button>
            </div>
        </div>
    </form>
@endsection
