@extends('main')



@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1></h1>
        </div>
    </div>

@foreach($posts as $post)

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{ url('blog/'.$post->slug) }}" ><img src="{{ asset('images/' . $post->image) }}" height="400px" width="800" alt=""></a>
            <a href="{{ url('blog/'.$post->slug) }}" ><h3>{{ $post->title }}</h3>  </a>
            <span   class="text-muted"> <b class="glyphicon glyphicon-time"></b> <em>Published date: {{ date('M j, Y' , strtotime($post->created_at)) }}</em></span>

            <p style="margin-top: 10px">{!!  substr(strip_tags($post->body), 0, 350) !!}{{ strlen($post->body)>350 ? '...' : ""  }}</p>

            <a href="{{ route('blog.single' , $post->slug) }}" class="btn btn-primary ">Read more</a>

            @php
                $like_count = 0;
                $dislike_count = 0;

                $like_status = "btn-secondary";
                $dislike_status = "btn-secondary";

            @endphp


            @foreach($post->likes as $like )

                @php

                    if($like->like == 1)
                        $like_count++;

                    if($like->like == 0)
                        $dislike_count++;


                if(Auth::check())
                    {
                    if($like->like == 1 && $like->user_id == Auth::user()->id)
                        $like_status = "btn-success";

                    if($like->like == 0 && $like->user_id == Auth::user()->id)
                        $dislike_status = "btn-danger";

                    }
                @endphp

            @endforeach


            @if(Auth::check())

            <button id="" style="float: right; width: 100px" type="button" data-postid="{{ $post->id }}_d" class="dislike btn {{ $dislike_status }}">Dislike
                <span class="glyphicon glyphicon-thumbs-down">
                </span><b> <span class="dislike_count">{{ $dislike_count }}</span></b></button>
            <button id="" style="float: right; width: 100px; " type="button" data-postid="{{ $post->id }}_l" data-like="{{ $like_status }}" class="like btn {{ $like_status }}">
                Like <span class="glyphicon glyphicon-thumbs-up">
                </span><b> <span class="like_count">{{ $like_count }}</span></b></button>

            @else
                <button onclick="alert('Please login')" id="" style="float: right; width: 100px" type="button"  class=" btn btn-secondary">Dislike
                <span class="glyphicon glyphicon-thumbs-down">
                </span><b> <span class="dislike_count">{{ $dislike_count }}</span></b></button>

                <button onclick="alert('Please login')" id="" style="float: right; width: 100px; " type="button"   class="btn btn-secondary">
                    Like <span class="glyphicon glyphicon-thumbs-up">
                </span><b> <span class="like_count">{{ $like_count }}</span></b></button>
            @endif

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