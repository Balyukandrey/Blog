@extends('main')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">

                    {!! Form::open() !!}

                        {{ Form::label('name', 'Name:') }}
                        {{ Form::text('name', null, ['class' => 'form-control']) }}

                        {{ Form::label('email', 'Email:') }}
                        {{ Form::email('email',null, ['class' => 'form-control']) }}

                        {{ Form::label('password', 'Password:') }}
                        {{ Form::password('password', ['class' => 'form-control']) }}

                        {{ Form::label('password_confirmation', 'Confirm password:') }}
                        {{ Form::password('password_confirmation' , ['class' => 'form-control']) }}

                        {{ Form::label('is_admin', 'Register as  admin'  , ['style' => 'margin-top:10px']) }}
                        {{ Form::checkbox('is_admin', null,null, ['class' => 'form-check']) }}

                        <div style="margin-top: 18px">
                        {{ Form::submit('Register', ['class' => 'btn btn-primary']) }}
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection