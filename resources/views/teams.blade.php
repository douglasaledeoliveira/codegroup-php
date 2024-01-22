@extends('layouts/app')

@section('content')
    <h3>Times Sorteados</h3>

    @component('components.breadcrumbs')
        <li class="breadcrumb-item"><a href="{{ route('players') }}">Início</a></li>
        <li class="breadcrumb-item"><a href="{{ route('players.index') }}">Gerenciar jogadores</a></li>
        <li class="breadcrumb-item active" aria-current="page">Resultado do sorteio</li>
    @endcomponent

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="teams-container">
        @foreach($sortedTeams as $index => $team)
            <div class="team">
                <h2>Time {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</h2>
                @if($team['goalkeeper'])
                    <p>Goleiro: {{ $team['goalkeeper']->name }}</p>
                @else
                    <p>Goleiro: Não definido</p>
                @endif

                <span>Jogadores de Linha:</span>
                
                @foreach($team['fieldPlayers'] as $player)
                    <p>{{ $player->name }} - {{ $player->skill_level }}</p>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection