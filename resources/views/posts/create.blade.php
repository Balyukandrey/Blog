@extends('main')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create new post</h1>
            <hr>

            {!! Form::open(['route' => 'posts.store' , 'data-parsley-validate'=> '' , 'files' => 'true'])  !!}
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, array('class' => 'form-control', 'required' => '')) }}

                {{ Form::label('slug', 'Slug:') }}
                {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255' )) }}

                {{ Form::label('category_id', 'Category') }}
                <select class="form-control " name="category_id" >
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                {{ Form::label('tags', 'Tags:') }}
                <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>

                {{ Form::label('featured_image', 'Upload featured image:') }}
                {{ Form::file('featured_image') }}

                {{ Form::label('body', 'Post body:')}}
                {{ Form::textarea('body', null, array('class' => 'form-control', 'maxlenght' => '255')) }}

                {{ Form::submit('Create post', array('class' => 'btn btn-success btn-lg btn-block')) }}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
