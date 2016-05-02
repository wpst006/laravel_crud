<html>
<head>
    <title>Laravel - CRUD</title>
    <!-- CSS And JavaScript -->
    <link rel="stylesheet"
          href="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css')}}">
</head>

<body>
    <!-- Displaying Message -->
    @include('common.message')

    @yield('content')
</body>
</html>