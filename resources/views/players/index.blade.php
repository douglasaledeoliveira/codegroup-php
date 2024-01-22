@extends('layouts/app')

@section('content')
    <h3>Jogadores</h3>

    @component('components.breadcrumbs')
        <li class="breadcrumb-item"><a href="{{ route('players') }}">Início</a></li>
        <li class="breadcrumb-item"><a href="{{ route('players.index') }}">Gerenciar jogadores</a></li>
        <li class="breadcrumb-item active" aria-current="page">Gerenciar</li>
    @endcomponent

    <div class="container">
        <div class="table-responsive">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Nível</th>
                        <th>Goleiro</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($players as $player)
                        <tr>
                            <td>{{ $player->name }}</td>
                            <td>{{ $player->skill_level }}</td>
                            <td>{{ $player->is_goalkeeper ? 'Sim' : 'Não' }}</td>
                            <td class="actions">
                                <form action="{{ route('players.destroy', $player->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('players.edit', $player->id) }}" class="link-btn link-btn-blue" style="margin-right: 10px;"><i class="fa-regular fa-pen-to-square"></i> <span>Editar</span></a>
                                    <button type="submit" class="btn btn-red" onclick="return confirm('Tem certeza que deseja excluir o jogador {{ $player->name }}?')"><i class="fa-solid fa-trash-can"></i> <span>Excluir</span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4 py-4">
        {{ $players->links() }}
    </div>
    
@endsection