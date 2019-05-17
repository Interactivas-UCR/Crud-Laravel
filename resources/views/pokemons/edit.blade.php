@extends('layouts.app')

@section('title', 'Pokemon')

@section('content')    
    
    @component('components.form_pokemon', [
        'pokemon' => $pokemon,
        'action' => route('pokemons.update', $pokemon->slug),
        'imagen_pokemon' => $pokemon->img,
        'trainer' => $pokemon->trainer->slug
    ])
        @slot('method')
            @method('PUT')
        @endslot
        
        @slot('button_text')
            @lang('Update')
        @endslot
    @endcomponent

@endsection