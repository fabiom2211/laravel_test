<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controle Funcionário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-md-12 d-flex justify-content-end align-items-center">
                @auth
                    <a href="/sair" class="text-danger">Sair</a>
                @endauth
                @guest
                    <a href="/entrar">Entrar</a>
                @endguest
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 text-muted" href="{{ route("lista_funcionario") }}">Lista de Funcionários</a>
            <a class="p-2 text-muted" href="{{ route("form_criar_funcionario") }}">Cadastrar Funcionário</a>
            <a class="p-2 text-muted" href="{{ route("form_criar_movimentacao") }}">Nova Movimentação</a>
        </nav>
    </div>

    <hr>
    <h3>@yield('cabecalho')</h3>
    <hr>

    @yield('conteudo')
</div>
</body>
</html>
