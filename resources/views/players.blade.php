@extends('layouts/app')

@section('content')
    <h3>Realizar sorteio de jogadores</h3>

    @component('components.breadcrumbs')
        <li class="breadcrumb-item"><a href="{{ route('players') }}">Início</a></li>
        <li class="breadcrumb-item"><a href="{{ route('players.index') }}">Gerenciar jogadores</a></li>
        <li class="breadcrumb-item active" aria-current="page">Gerar sorteio</li>
    @endcomponent
    
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <b>{{ $error }}</b>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('teams.sort') }}">
            @csrf
     

            <table class="custom-table">
                <thead>
                    <tr>
                        <th><a href="{{ url('/?sort=name&order=' . $order) }}">Nome</a></th>
                        <th><a href="{{ url('/?sort=skill_level&order=' . $order) }}">Nível</a></th>
                        <th><a href="{{ url('/?sort=is_goalkeeper&order=' . $order) }}">Goleiro</a></th>
                        <th>
                            <input type="checkbox" id="select-all" /> Confirmado
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($players as $player)
                        <tr>
                            <td>{{ $player->name }}</td>
                            <td>{{ $player->skill_level }}</td>
                            <td>{{ $player->is_goalkeeper ? 'Sim' : 'Não' }}</td>
                            <td>
                                <input type="checkbox" name="player_ids[]" value="{{ $player->id }}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="form-group">
                <label for="players_per_team">Jogadores por time:</label>
                <input type="number" class="form-control" id="players_per_team" name="players_per_team" disabled min="6" max="6" value="6" required>
            </div>
            <button type="submit" class="btn btn-green">Sortear Times</button>
        </form>
    </div>

    <script>
        document.getElementById('select-all').addEventListener('click', function(event) {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = event.target.checked;
            });
        });
    </script>
@endsection