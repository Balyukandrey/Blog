@extends('main')

@section('content')

    <div class="row">
        {!! Form::model($post, ['route'=>['posts.update',$post->id] , 'method'=>'PUT', 'files' => 'true']) !!}
        <div class="col-md-8" >
            {{ Form::label('title', 'Title:') }}
            {{ Form::text('title',null, ["class"=>'form-control input-lg']) }}

        <div style="margin-top:30px">
            {{ Form::label('slug', 'Slug:') }}
            {{ Form::text('slug', null, array('class' => 'form-control')) }}
        </div>

         <div style="margin-top:30px">
            {{ Form::label('category_id','Category:') }}
            {{ Form::select('category_id',$categories,null , ['class' => 'form-control']) }}
         </div>

         <div style="margin-top: 18px">
            {{ Form::label('tags' , 'Tags:') }}
            {{ Form::select('tags[]',$tags, null,['class' => 'select2-multi form-control', 'multiple' => 'multiple']) }}
         </div>

            <div style="margin-top: 18px">

            {{ Form::label('featured_image' , "Update featured image") }}
            {{ Form::file('featured_image') }}
            </div>

        <div style="margin-top:30px">
            {{Form::label('body', 'Body:')}}
            {{ Form::textarea('body',null,["class"=>'form-control']) }}
        </div>
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created at:</dt>
                    <dd>{{ date('M j, Y H:i',strtotime( $post->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last updated:</dt>
                    <dd>{{ date('M j, Y H:i',strtotime( $post->update_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {{ Html::linkroute('posts.show', 'Cancel', array($post->id),array('class'=> 'btn btn-danger btn-block' )) }}
                    </div>
                    <div class="col-sm-6">
                        {{ Form::submit('Save changes', ['class' => 'btn btn-success btn-block' ]) }}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>



@endsection