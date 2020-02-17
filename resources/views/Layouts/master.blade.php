<html>
<head>
    <title>
        Testing
    </title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
</head>
<body>
<div id="app">
    @yield('content')

</div>
</body>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/bs.js')}}"></script>
{{--<script src="https://gist.github.com/nonsocode/e6f34a685f8be1422c425e3a20a69a4b.js"></script>--}}
<script src="{{ mix('js/app.js') }}"></script>

</html>
