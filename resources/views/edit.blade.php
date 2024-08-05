@extends('app')
@section('section')
  <form action="{{route('edit.post',$post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="mt-2">
            <label class="form-label">Enter title</label>
            <input type="text" class="form-control"  name="title" value="{{$post->title}}">
        </div>
        <div class="mt-2">
            <label class="form-label">Enter content</label>
            <input type="text" class="form-control" name="content" value="{{$post->content}}">
        </div>
       <div class="mt-2">
            <label class="form-label">image</label>
                <img src="{{ asset('storage/uploads/' . $post->image) }}" width="150" height="150" alt="" class="img-fluid rounded"  >
        </div>
            <div class="mt-2">
                <label class="form-label">Upload New image</label>
                <input type="file" name="image" class="form-control"   id="imageInput" >
                <br>
                <img src="" alt="" id="imagePreview" style="display: none;max-width:300px;max-height: 300px">
            </div>
        <button class="btn btn-info" type="submit">Update Details</button>
        <a class="btn btn-danger" href="{{route('post.delete',$post->id)}}">Delete</a>

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
            imagePreview.style.display = 'block';
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
