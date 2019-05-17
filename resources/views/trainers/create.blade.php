@extends('layouts.app')

@section('content')

<div class="container">
    @component('components.trainer_form', [
    'trainer' => null,
    'action' => route('trainers.store'),
    'img' => 'notfound.png'
    ])
    @slot('method')
    @method('POST')
    @endslot

    @slot('button_text')
    @lang('content.create')
    @endslot
    @endcomponent
</div>

@endsection