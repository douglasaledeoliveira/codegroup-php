<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteador de Times de Futebol</title>
    <link rel="shortcut icon" href="https://codegroup-54552efc0bf4.herokuapp.com/img/favicon.png" />
    <link rel="stylesheet" href="https://codegroup-54552efc0bf4.herokuapp.com/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f9c3742dc8.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="horizontal-menu">
        <a href="{{ route('players') }}" title="Ir ao Início">Início</a>
        <a href="{{ route('players.create') }}" title="Cadastrar jogador">Cadastrar</a>
        <a href="{{ route('players.index') }}" title="Gerenciar jogadores">Gerenciar</a>
    </div>

    <aside class="sidebar">
        <div class="logo">
            <img src="https://codegroup-54552efc0bf4.herokuapp.com/img/codegroup.png" alt="{{ config('app.name') }} logo" title="{{ config('app.name') }}">
        </div>

        <hr class="spacer" />

        <nav class="menu">
            <ul class="sidebar-links">
                <li><a href="{{ route('players') }}" title="Ir ao Início"><i class="fa-solid fa-house"></i> Início</a></li>
                <li><a href="{{ route('players.create') }}" title="Cadastrar jogador"><i class="fa-solid fa-user"></i> Cadastrar jogador</a></li>
                <li><a href="{{ route('players.index') }}" title="Gerenciar jogadores"><i class="fa-solid fa-futbol"></i> Gerenciar jogadores</a></li>
                <li><a href="https://github.com/douglasaledeoliveira/codegroup-php" title="Acessar o reposótorio" target="_blank"><i class="fa-brands fa-github"></i> Repositório</a></li>
            </ul>
        </nav>
    </aside>

    <main class="main-content">
        <section class="main-feature">
            <h1>Sorteador de Times de Futebol</h1>
            <h2>Society de Poços de Caldas</h2>
        </section>

        <div class="content">
            @yield('content')
        </div>

        <footer class="main-footer">
            <div>
                <p>&copy; {{ date('Y') }} {{ config('app.name') }} - Todos os direitos reservados.</p>
            </div>
        </footer>
    </main>
</body>
</html>