@extends('main')

@section('content')
    
    <div class="col-lg-8 col-lg-offset-2  col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1" style="height: 75vh; margin-top: 2%;">

        <div class="row" style="border-bottom: 1px solid rgba(203, 178, 183, 0.3);padding-bottom: 15px">
            <div class="col-sm-6">

                <h4>Name: {{ $user->name }}</h4>
                <h4>Email: {{ $user->email }}</h4>
                <h4>Registered at: {{ date('M j, Y' , strtotime($user->created_at)) }}</h4>

            </div>

            <div class="col-sm-12">
                <h3>Notations(<small>{{ count($posts) }}</small>)</h3>
                <ul>
                    @foreach($posts as $post)
                    <li><a href="{{ url('blog/'.$post->slug) }}"> {{ $post->title }} </a></li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
    
@endsection