@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>@lang('Trainers') </h1>        
        <a class="btn btn-primary" href="{{ route('trainers.create') }}">Add Trainer</a>
        
        @forelse($trainers as $trainer)            
            <div class="card" style="width: 18rem;">
                <img src="{{ url('storage/images') }}/{{ $trainer->img }}" class="card-img-top" alt="{{ $trainer->name }}">
                <div class="card-body text-center">
                    <h5 class="card-title text-center">{{ $trainer->name }}</h5>            
                    <a href="{{ route('trainers.show', $trainer->slug) }}" class="btn btn-primary">@lang('View Profile')</a>
                </div>
            </div>            
        @empty
            <p>No hay nada</p>
        @endforelse
    </div>
    

@endsection