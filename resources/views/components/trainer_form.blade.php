<img class="image-profile img-fluid" style="cursor: pointer" src="{{ url('/storage/images/'. $img) }}" alt="">
<br>
<br>

<form method="POST" action="{{ $action }}" enctype="multipart/form-data">

    @csrf
    {{ $method }}

    <div class="form-group">
        <label for="name">@lang('Name')</label>
        <input class="form-control" type="text" name="name" id="name" value="{{ $trainer['name']}}" placeholder="Name">
    </div>


    <div class="form-group">
        <label for="">@lang('Lavel')</label>
        <input class="form-control" type="number" name="lavel" id="lavel" min="1" max="100"
            value="{{ $trainer['lavel'] }}" placeholder="0">
    </div>

    <div class="form-group">
        <label for="">@lang('Birthday')</label>
        <input class="form-control" type="date" name="age" id="age" value="{{ $trainer['age']}}" placeholder="Age">
    </div>

    <div class="form-group">
        <label for="">@lang('Image')</label>
        <input class="form-control" onchange="changeImage(this)" type="file" name="img" id="img">
    </div>

    <button class="btn btn-danger" type="submit">
        {{ $button_text }}
    </button>
</form>

<script>
    let imageDOM = document.querySelector('.image-profile');
    
    imageDOM.addEventListener('click', function(){
        document.querySelector('#img').click();
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