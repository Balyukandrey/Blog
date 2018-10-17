<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog </title>

    <link rel="stylesheet" href="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')}}"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>

    <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js')}}"></script>
    {{--<script type="text/javascript" src="{{url('/js/like.js')}}"></script>--}}
    {{ Html::script('js/like.js') }}
    {{ Html::script('js/to-top.js') }}
    {{ Html::script('js/chat.js') }}



    <script type="text/javascript">

        var url = "{{ route('like') }}";
        var token = "{{ Session::token() }}";
        var url_dis = "{{ route('dislike') }}";
        var url_message = "{{ route('sendMessage') }}";
        var url_messageGet = "{{ route('getMessage') }}";

    </script>



    <script>
        tinymce.init({
            selector:'textarea',
            plugins: 'link',
            menu: {
                view: {title: 'Edit', items: 'cut, copy, paste'}
            }
        });
    </script>


    {{ Html::style('css/parsley.css') }}
    {{ Html::style('css/select2.min.css') }}
    {{ Html::style('css/style.css') }}
    {{ Html::style('css/to-top.css') }}





</head>
<body>

@include('partials._nav')
        <div class="container" style="">
            @include('partials._messages')


            @yield('content')
        </div>

    <div class="container" id="footer" style="height: 30px; width: 100%">
        @include('partials._footer')
    </div>
<a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js')}}"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
{{ Html::script('js/parsley.min.js') }}
{{ Html::script('js/select2.min.js') }}
{{--{{ Html::script('js/like.js') }}--}}


<script type="text/javascript">
    $('.select2-multi').select2();
</script>

{{--<a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>--}}


</body>
</html>