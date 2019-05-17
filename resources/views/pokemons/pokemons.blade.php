@extends('layouts.app')

@section('content')

    <h1>@lang('Pokemon')</h1>

    @forelse ($pokemons as $pokemon)
        <div class="pokemon-content">
            <img width="150" src="{{ url('storage/pokemons/' . $pokemon->img) }}" alt="{{ $pokemon->name }}">
            <h2>{{ $pokemon->name }}</h2>
            <p>{{ $pokemon->nickname}}</p>
            <p>{{ $pokemon->type}}</p>
            <p>{{ $pokemon->level}}</p>
            <a href="{{ route('pokemons.show', $pokemon->slug) }}">@lang('View Profile')</a>
        </div>
    @empty
        @lang('There are no pokemons')
    @endforelse
@endsection