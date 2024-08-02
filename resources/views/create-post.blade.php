@extends('app')
@section('section')



    <form action="create" method="post" enctype="multipart/form-data">
       @csrf
       <div class="mt-2">
           <label class="">Enter title</label>
           <input type="text" name="title">
       </div>
       <div class="mt-2">
           <label class="">Enter content</label>
           <input type="text" name="content">
       </div>
       <div class="mt-2">
           <label class="">Upload image</label>
           <input type="file" name="image" id="imageInput">
       </div>
<button type="submit">create</button>

   </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pica/8.0.0/pica.min.js"></script>
    <script>
        document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            // Perform client-side image processing
        });
    </script>
@endsection
