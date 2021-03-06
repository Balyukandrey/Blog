@extends('main')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <img src="{{ asset('images/' . $post->image) }}" height="400px" width="800" alt="">
            <h1>{{ $post->title }}</h1>
            <p>{!! $post->body !!}</p>
            <hr>
            <p> Posted in: {{ $post->category->name }} by <a href="{{ route('getUser' , $post->user->id) }}"> {{ $post->user->name }}</a></p>

            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3 class="comments-title"> <span class="glyphicon glyphicon-comment"></span>{{ $post->comments()->count() }} Comments</h3>
            @foreach($post->comments as $comment)
                <div class="comment">
                    <div class="author-info">
                        <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($comment->email))) .
                         "?s=50&d=retro"}}"
                             class="author-image">
                        <div class="author-name">
                            <h4>{{ $comment->name }}</h4>
                            <p class="author-time">{{date('F nS, Y - g:iA',strtotime( $comment->created_at)) }}</p>
                        </div>

                    </div>

                    <div class="comment-content">
                        {!! $comment->comment !!}
                    </div>
                </div>

            @endforeach
        </div>
    </div>

    @if(Auth::check())
    <div class="row">
        <div id="comment-form" class="col-md-8  col-md-offset-2" style="margin-top: 50px">
            {{ Form::open(['route' => ['comments.store' , $post->id], 'method' => 'POST']) }}



                    <div class="col-md-12">
                        {{ Form::label('comment' , 'Comment:') }}
                        {{ Form::textarea('comment' , null, ['class' => 'form-control', 'rows' => '5']) }}
                        {{ Form::submit('Add comment', ['class' => 'btn btn-success btn-block','style' => 'margin-top:15px']) }}
                    </div>



                </div>

            {{ Form::close() }}
        </div>
    </div>
    @else
        <div style="margin-bottom: 18px; , font-family: sans-serif; " class="text-center">

            <h3>Enter, to add comment</h3>
            <hr>
        </div>
    @endif
@endsection