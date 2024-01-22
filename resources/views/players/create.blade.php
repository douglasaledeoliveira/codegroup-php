@extends('layouts/app')

@section('content')
    <h3>Cadastrar Jogadores</h3>

    @component('components.breadcrumbs')
        <li class="breadcrumb-item"><a href="{{ route('players') }}">Início</a></li>
        <li class="breadcrumb-item"><a href="{{ route('players.index') }}">Gerenciar jogadores</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cadastrar</li>
    @endcomponent

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="custom-form">
        <form action="{{ route('players.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nome do Jogador:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
    
            <div class="form-group">
                <label for="skill_level">Nível (1 a 5):</label>
                <select class="form-control" id="skill_level" name="skill_level">
                    @for ($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
    
            <div class="form-check">
                <input type="hidden" name="is_goalkeeper" value="0">
                <input type="checkbox" class="form-check-input" id="is_goalkeeper" name="is_goalkeeper" value="1" {{ old('is_goalkeeper') ? 'checked' : '' }}>
                <label class="form-check-label" for="is_goalkeeper">É goleiro?</label>
            </div>
    
            <button type="submit" class="btn btn-green">Cadastrar</button>
        </form>
    </div>
    
@endsection