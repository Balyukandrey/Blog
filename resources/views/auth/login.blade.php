@extends('main')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        {!! Form::open() !!}

                        {{ Form::label('email' , 'Email:') }}
                        {{ Form::email('email',null, ['class' => 'form-control']) }}

                        {{ Form::label('password', 'Password:') }}
                        {{ Form::password('password' , ['class' => 'form-control']) }}

                        {{ Form::label('remember' , 'Remember me') }}
                        {{ Form::checkbox('remember') }}
                        <div class="row" style="margin-left:1px; margin-top: 18px;">
                            {{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
                        </div>
                        {!! Form::close() !!}
                    </div>
            </div>
        </div>
    </div>

@endsection