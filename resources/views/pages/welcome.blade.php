@extends('main')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8">

                @foreach($posts as $post)
                <div class="post">
                    <img src="{{ asset('images/' . $post->image) }}" height="400px" width="800" alt="">

                    <a href="{{ url('blog/'.$post->slug) }}" ><h3>{{ $post->title }}</h3>  </a>

                    <p>{{ substr(strip_tags($post->body), 0,300) }}{{ strlen($post->body)>0 ? "..." : "" }}</p>
                    <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read more</a>
                </div>
                <hr>
                @endforeach
            </div>
            <div class="col-md-3 col-md-offset-1">
                <h1>Sidebar</h1>
            </div>
        </div>
    </div>

@endsection