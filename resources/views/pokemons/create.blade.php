@extends('layouts.app')

@section('content')
    
    @component('components.form_pokemon', [
        'pokemon' => null,
        'action' => route('pokemons.store'),
        'imagen_pokemon' => 'image-not-found.png',
        'trainer' => $trainer
    ])
        @slot('method')
            @method('POST')
        @endslot
        
        @slot('button_text')
            @lang('Save')
        @endslot
    @endcomponent

@endsection