@extends('layouts.app')

@section('content')

        <label for="">@lang('Image:')</label>
        <img width="200" src="{{ url('storage/images/' . $trainer->img) }}" alt="">
        <br>

        <label for="">@lang('Slug:')</label>
        <p>{{ $trainer->slug }}</p>

        <label for="">@lang('Name:')</label>
        <p>{{ $trainer->name }}</p>

        <label for="">@lang('Lavel:')</label>
        <p>{{ $trainer->lavel }}</p>

        <label for="">@lang('Birthday:')</label>
        <p>{{ $trainer->age }}</p>
        <br>

        <h2>@lang('Pokemon')</h2>
        @forelse($trainer->pokemons as $pokemon)
            <a href="{{ route('pokemons.show', $pokemon->slug) }}">
                <img src="{{ url('storage/pokemons') }}/{{ $pokemon->img }}" alt="" width="100">
            </a>            
            <p>@lang('Name'): <a href="{{ route('pokemons.show', $pokemon->slug) }}">{{ $pokemon->name }}</a></p>            
            <p>@lang('Nickname'): {{ $pokemon->nickname }}</p>
            <p>@lang('Type'): {{ $pokemon->type }}</p>
        @empty
            <p>@lang('No tiene pokemons')</p>
        @endforelse


        <a href="{{ route('pokemons.create', $trainer->slug) }}">@lang('Add Pokemon')</a>
        <br>
        <br>

        <a href="{{ route('trainers.edit', $trainer->slug) }}">@lang('Edit')</a>

        <form method="POST" action="{{ route('trainers.destroy', $trainer->slug) }}">

            @csrf
            @method('DELETE')
            <button type="submit">@lang('content.delete')</button>
        </form>

@endsection