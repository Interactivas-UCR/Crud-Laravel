
{{-- un objeto y metodo --}}
@forelse ($errors->all() as $error)

    <div class= "alert" style="color: #f00">
        {{ $error }}
    </div>

@empty

@endforelse

@if (session('success'))
    
    <div class= "alert" style="color: #0f0">
        {{ session('success') }} 
    {{-- si hay algo en sesion mostramos lo que es --}}
    </div>
    
@endif

@if (session('error'))

     <div class= "alert" style="color: #f00">
        {{ session('error') }} 
    </div>
    
@endif