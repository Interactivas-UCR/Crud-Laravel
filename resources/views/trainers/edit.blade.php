@extends('layouts.app')

@section('content')

    @component('components.trainer_form', [
        'trainer' => $trainer,
        'action' => route('trainers.update', $trainer->slug),
        'img' => $trainer['img']
    ])
        @slot('method')
            @method('PUT')
        @endslot

        @slot('button_text')
            @lang('content.update')
        @endslot
    @endcomponent

@endsection