@extends('main')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1>All posts</h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary " style="margin-top:18px">Create new post</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Body</th>
                    @isAdmin
                    <th>Posted by</th>
                    @endisAdmin
                    <th>Created at</th>
                    <th></th>
                </thead>
                @if(count($posts) == 0)
                    <h4 class="text-center" style="margin-bottom: 20px">You have no notations, but you can fix it</h4>
                @endif
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th>{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{!!   substr(strip_tags($post->body),0,50) !!} {{ strlen($post->body)>50 ? "...":"" }}</td>
                            @isAdmin
                            <td>{{ $post->user->name }}</td>
                            @endisAdmin
                            <td>{{ date('M j, Y',strtotime($post->created_at)) }}</td>
                            <td><a href="{{route('posts.show',$post->id)}}" class="btn btn-default btn-sm">View</a>
                                <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-default btn-sm">Edit</a></td>
                        </tr>


                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection