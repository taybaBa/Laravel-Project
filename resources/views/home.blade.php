@extends('app')
@section('section')
    <style>
        :root {
            --orange: #fd9940;
            --darkorange: #dd7d25;
            --platinum: #e5e5e5;
            --black: #2b2d42;
            --white: #fff;
            --thumb: #edf2f4;
        }

        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }



        .container {
            max-width: 1400px;
            padding: 0 15px;
            margin: 0 auto;
        }

        h2 {
            font-size: 32px;
            margin-bottom: 1em;
        }

        .cards {
            display: grid;
            grid-auto-columns: 100%;
            grid-column-gap: 10px;
            grid-auto-flow: column;
            padding: 25px 0px;
            list-style: none;
            overflow-x: scroll;
            -ms-scroll-snap-type: x mandatory;
            scroll-snap-type: x mandatory;
        }

        .card {
            display: flex;
            flex-direction: column;
            padding: 20px;
            background: var(--white);
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 15%);
            scroll-snap-align: start;
            transition: all 0.2s;
        }

        .card:hover {
            color: var(--white);
            background: var(--orange);
        }

        .card .card-title {
            font-size: 20px;
        }

        .card .card-content {
            margin: 20px 0;
            max-width: 85%;
        }

        .card .card-link-wrapper {
            margin-top: auto;
        }

        .card .card-link {
            display: inline-block;
            text-decoration: none;
            color: white;
            background: var(--orange);
            padding: 6px 12px;
            border-radius: 8px;
            transition: background 0.2s;
        }

        .card:hover .card-link {
            background: var(--darkorange);
        }

        .cards::-webkit-scrollbar {
            height: 12px;
        }

        .cards::-webkit-scrollbar-thumb,
        .cards::-webkit-scrollbar-track {
            border-radius: 92px;
        }

        .cards::-webkit-scrollbar-thumb {
            background: var(--darkorange);
        }

        .cards::-webkit-scrollbar-track {
            background: var(--thumb);
        }

        @media (min-width: 500px) {
            .cards {
                grid-auto-columns: calc(50% - 10px);
                grid-column-gap: 20px;
            }
        }

        @media (min-width: 700px) {
            .cards {
                grid-auto-columns: calc(calc(100% / 3) - 20px);
                grid-column-gap: 30px;
            }
        }

        @media (min-width: 1100px) {
            .cards {
                grid-auto-columns: calc(25% - 30px);
                grid-column-gap: 40px;
            }
        }
        .img-fluid {
            max-width:50%;
            height: auto;
        }

    </style>
<div>
    <!-- Hero 5 - Bootstrap Brain Component -->
    <section class="bsb-hero-5 px-3 bsb-overlay" style="background-image: url('./images/hero-img-1.webp');">
        <div class="container">
            <div class="row justify-content-md-center align-items-center">
                <div class="col-12 col-md-11 col-lg-9 col-xl-8 col-xxl-7">
                    <h2 class="display-1 text-white text-center fw-bold mb-4">Dream of Success</h2>
                    <p class="lead text-white text-center mb-5 d-flex justify-content-sm-center">
                        <span class="col-12 col-sm-10 col-md-8 col-xxl-7">There are three ways to ultimate success: The first way is to be kind. The second way is to be kind. The third way is to be kind.</span>
                    </p>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                        <button type="button" class="btn bsb-btn-2xl btn-outline-light">Free Consultation</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <a href="{{url('/create-post')}}" class="btn btn-primary">Add Your New Blog</a>

   <div class="row">
       @foreach($posts->take(3) as $post)
    <div class="col-sm-6 card m-4" style="width: 18rem;">
        <img class="card-img-top" src="{{ asset('storage/uploads/' . $post->image) }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{Str::limit($post->content,50)}}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
       @endforeach
   </div>
        <h1>Most Viewed Blogs</h1>
        <div class="container">
            <h2>Scrolling Card UI With CSS Grid</h2>
            <ul class="cards">
                <li class="card">
                    <div>
                        <h3 class="card-title">Service 1</h3>
                        <div class="card-content">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    <div class="card-link-wrapper">
                        <a href="" class="card-link">Learn More</a>
                    </div>
                </li>
                <li class="card">
                    <div>
                        <h3 class="card-title">Service 2</h3>
                        <div class="card-content">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab repudiandae magnam harum natus fuga et repellat in maiores.</p>
                        </div>
                    </div>
                    <div class="card-link-wrapper">
                        <a href="" class="card-link">Learn More</a>
                    </div>
                </li>
                <li class="card">
                    <div>
                        <h3 class="card-title">Service 3</h3>
                        <div class="card-content">
                            <p>Phasellus ultrices lorem vel bibendum ultricies. In hendrerit nulla a ante dapibus pulvinar eu eget quam.</p>
                        </div>
                    </div>
                    <div class="card-link-wrapper">
                        <a href="" class="card-link">Learn More</a>
                    </div>
                </li>
                <li class="card">
                    <div>
                        <h3 class="card-title">Service 4</h3>
                        <div class="card-content">
                            <p>Aenean posuere mauris quam, pellentesque auctor mi bibendum nec. Sed scelerisque lacus nisi, quis auctor lorem ornare vel.</p>
                        </div>
                    </div>
                    <div class="card-link-wrapper">
                        <a href="" class="card-link">Learn More</a>
                    </div>
                </li>
                <li class="card">
                    <div>
                        <h3 class="card-title">Service 5</h3>
                        <div class="card-content">
                            <p>Vestibulum pharetra fringilla felis sit amet tempor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras et arcu sit amet est consequat feugiat. Nam ut sapien pulvinar.</p>
                        </div>
                    </div>
                    <div class="card-link-wrapper">
                        <a href="" class="card-link">Learn More</a>
                    </div>
                </li>
                <li class="card">
                    <div>
                        <h3 class="card-title">Service 6</h3>
                        <div class="card-content">
                            <p>Donec ut tincidunt nisl. Vivamus eget eros id elit feugiat mollis. Nam sed sem quis libero finibus tempor.</p>
                        </div>
                    </div>
                    <div class="card-link-wrapper">
                        <a href="" class="card-link">Learn More</a>
                    </div>
                </li>
                <li class="card">
                    <div>
                        <h3 class="card-title">Service 7</h3>
                        <div class="card-content">
                            <p>Aliquam eget nisl auctor, sollicitudin ipsum at, dignissim ligula. Donec tincidunt in elit et pellentesque. Integer posuere metus ac massa mollis euismod.</p>
                        </div>
                    </div>
                    <div class="card-link-wrapper">
                        <a href="" class="card-link">Learn More</a>
                    </div>
                </li>
                <li class="card">
                    <div>
                        <h3 class="card-title">Service 8</h3>
                        <div class="card-content">
                            <p> Vivamus eget eros id elit feugiat mollis. Nam sed sem quis libero finibus tempor.</p>
                        </div>
                    </div>
                    <div class="card-link-wrapper">
                        <a href="" class="card-link">Learn More</a>
                    </div>
                </li>
                <li class="card">
                    <div>
                        <h3 class="card-title">Service 9</h3>
                        <div class="card-content">
                            <p>Duis id congue turpis. Donec sodales porta felis, nec ultricies ante. Nam placerat vitae metus sit amet tempor. Aliquam ac dictum est.</p>
                        </div>
                    </div>
                    <div class="card-link-wrapper">
                        <a href="" class="card-link">Learn More</a>
                    </div>
                </li>
                <li class="card">
                    <div>
                        <h3 class="card-title">Service 10</h3>
                        <div class="card-content">
                            <p>Pellentesque eget eros eget justo efficitur fermentum.</p>
                        </div>
                    </div>
                    <div class="card-link-wrapper">
                        <a href="" class="card-link">Learn More</a>
                    </div>
                </li>
                <li class="card">
                    <div>
                        <h3 class="card-title">Service 11</h3>
                        <div class="card-content">
                            <p>Phasellus posuere nec nibh ut tincidunt. Aenean mollis turpis non eros posuere, at luctus leo hendrerit. Integer non libero sapien.</p>
                        </div>
                    </div>
                    <div class="card-link-wrapper">
                        <a href="" class="card-link">Learn More</a>
                    </div>
                </li>
                <li class="card">
                    <div>
                        <h3 class="card-title">Service 12</h3>
                        <div class="card-content">
                            <p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vestibulum ornare metus ac lectus scelerisque volutpat.</p>
                        </div>
                    </div>
                    <div class="card-link-wrapper">
                        <a href="" class="card-link">Learn More</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        @foreach($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{Str::limit($post->content,50)}}</td>
                <td><img src="{{ asset('storage/uploads/' . $post->image) }}" class="img-fluid" alt="Post Image"></td>
                <td><a href="{{url('edit',$post->id)}}">Edit</a></td>
                <td><a href="{{url('delete',$post->id)}}">Delete</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $posts->links('pagination::bootstrap-4') }}

</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.carousel').carousel({
            interval: 2000
        });
    });
</script>
@endsection
