@extends('app')
@section('section')
  <form action="{{route('edit.post',$post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="mt-2">
            <label class="">Enter title</label>
            <input type="text" name="title" value="{{$post->title}}">
        </div>
        <div class="mt-2">
            <label class="">Enter content</label>
            <input type="text" name="content" value="{{$post->content}}">
        </div>
       <div class="mt-2">
            <label class="">image</label>
                <img src="{{ asset('storage/uploads/' . $post->image) }}" alt="">
        </div>
            <div class="mt-2">
                <label class="">Upload image</label>
                <input type="file" name="image" id="imageInput" >
                <br>
                <img src="" alt="" id="imagePreview" style="display: none;max-width:300px;max-height: 300px">
            </div>
        <button type="submit">Edit Details</button>

    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pica/8.0.0/pica.min.js"></script>
    <script>

            document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
            const imagePreview = document.getElementById('imagePreview');
            imagePreview.src = e.target.result;
            imagePreview.style.display = 'block'; // Show the image preview
        }
            reader.readAsDataURL(file); // Convert file to data URL
        } else {
            const imagePreview = document.getElementById('imagePreview');
            imagePreview.src = '';
            imagePreview.style.display = 'none'; // Hide the image preview
        }
        });


  document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            // Perform client-side image processing
        });
    </script>
@endsection
