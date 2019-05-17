@extends('layouts.app')

@section('title', $pokemon->name)

@section('content')

<article>
    <img class="image-profile " src="{{ url('storage/pokemons/' . $pokemon->img) }}" alt="{{ $pokemon->name }}">
    <div>
        <h1>{{ $pokemon->name }}</h1>
        <h5>{{ $pokemon->slug }}</h5>
        
        <p>@lang('Level'): {{ $pokemon->level }}</p>
        <p>@lang('Name'): {{ $pokemon->name }}</p>
        <p>@lang('Type'): {{ $pokemon->type }}</p>
        <a href="{{ route('pokemons.edit', $pokemon->slug) }}">@lang('Edit profile')</a>
        <form action="{{ route('pokemons.destroy', $pokemon->slug) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
</article>


@endsection