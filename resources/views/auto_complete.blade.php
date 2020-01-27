<html>
<head>
    <title>
        Testing
    </title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
</head>
<body>
{{--@yield('content')--}}
    <div id="app">
        <div class="row">
            <div class="col-sm-8">
                <h1>Building an Autocomplete Component with Vue.js and PHP Laravel 5.6</h1>
                <div class="panel panel-primary">
                    <form action="{{url('autocomplete/send')}}" method="post">
                        <div class="panel-heading">Please type here in text box to get search data</div>
{{--                        <div class="panel-body">--}}
                            <autocomplete></autocomplete>
{{--                        </div>--}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{asset('js/jquery.js')}}"></script>
{{--<script src="{{asset('js/bootstrap.min.js')}}"><

/script>--}}
<script src="{{asset('js/bs.js')}}"></script>
<script src="{{ mix('js/app.js') }}"></script>

</html>
