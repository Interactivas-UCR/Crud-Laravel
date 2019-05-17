
<img class="image-pokemon circle-image" style="cursor: pointer" width="100" height="100" src="{{ url('/storage/pokemons/' . $imagen_pokemon) }}" alt="">

<form method="POST" action="{{ $action }}" enctype="multipart/form-data">
    
    @csrf
    {{ $method }}

    <div>
        <label for="imagen_pokemon">@lang('Image')</label>                    
        <div class="custom-file">
            <input onchange="changeImage(this)" id="imagen_pokemon" name="imagen_pokemon" type="file">            
        </div>    
    </div> <br>

    <div>
        <label for="name">@lang('Name')</label><br>
        <input type="text" id="name" name="name" value="{{ $pokemon['name'] }}" placeholder="@lang('Name')">        
    </div> <br>
    
    <div>
        <label for="type">@lang('Type')</label><br>
        <input type="text" id="type" name="type" value="{{ $pokemon['type'] }}" placeholder="@lang('Type')">        
    </div> <br>
    
    <div>
        <label for="level">@lang('Level')</label><br>
        <input type="number" id="level" name="level" value="{{ $pokemon['level'] }}" placeholder="@lang('Level')">        
    </div> <br>

    <div>
        <label for="nickname">@lang('Nickname')</label><br>
        <input type="text" id="nickname" name="nickname" value="{{ $pokemon['nickname'] }}" placeholder="@lang('Nickname')">        
    </div> <br>

    <input type="hidden" name="trainer" value="{{ $trainer }}">
    
    <button type="submit">
        {{ $button_text }}        
    </button>
</form>

@section('scripts')    
    <script>        
        let imageDOM = document.querySelector('.image-pokemon');
        
        imageDOM.addEventListener('click', function(){
            document.querySelector('#imagen_pokemon').click();
        });

        function changeImage(input){            
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    imageDOM.src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            }
        };
    </script>
@endsection