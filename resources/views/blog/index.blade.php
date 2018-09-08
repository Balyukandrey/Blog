@extends('main')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Blog</h1>
        </div>
    </div>

@foreach($posts as $post)

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <img src="{{ asset('images/' . $post->image) }}" height="400px" width="800" alt="">
            <h2>{{ $post->title }}</h2>
            <h5>Published date: {{ date('M j, Y' , strtotime($post->created_at)) }}</h5>

            <p>{{ substr(strip_tags($post->body), 0, 250) }}{{ strlen($post->body)>250 ? '...' : ""  }}</p>

            <a href="{{ route('blog.single' , $post->slug) }}" class="btn btn-primary ">Read more</a>
            <hr>
        </div>
    </div>

@endforeach

    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>


@endsection