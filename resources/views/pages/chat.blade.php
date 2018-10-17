@extends('main')

@section('content')

    <div  class="row ">
        <h3 class="text-center" >Welcome {{ Auth::user()->name }}</h3>


        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    RECENT CHAT HISTORY
                </div>
                <div style="overflow-y: scroll; height: 500px" class="panel-body">
                    <ul class="media-list" id="message">

                    @foreach($messages as $message)
                        <li class="media">

                            <div class="media-body">

                                <div class="media">
                                    <a class="pull-left" href="#">
                                        <img class="media-object img-circle " src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim(Auth::user()->name)))."?s=50&d=mm"}}"/>
                                    </a>

                                    <div class="media-body" >
                                        {{ $message->message }}
                                        <br />
                                        <small class="text-muted">{{ $message->from_name }} | {{ $message->created_at }}</small>
                                        <hr />
                                    </div>
                                </div>

                            </div>
                        </li>
                    @endforeach

                    </ul>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input type="text" name="message" class="form-control" placeholder="Enter Message" />
                                    @csrf
                                    <input type="hidden" value="{{ Auth::user()->name }}" name="from_name">
                                    <span class="input-group-btn">
                                        <button  class="btn btn-info" id="send" type="button">SEND</button>
                                    </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2">

        </div>
    </div>

@endsection
