<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="{{asset('css/style.css') }}">
    <link rel="stylesheet" href="{{asset('css/header.css') }}">
    <link rel="stylesheet" href="{{asset('css/format/format.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">
    <link rel="stylesheet" href="{{ asset('css/disaster/disaster.css') }}">

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> --}}
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script> --}}
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1/10.3/jquery-ui.min.js"></script> --}}

    <script src="http://code.jquery.com/jquery-1.7.2.js" ></script>
    <script src="https://code.jquery.com/ui/1.7.2/jquery-ui.js" ></script>
    <title>Document</title>
</head>
<body>
    @include('layouts.header')
    @yield('content')

</body>
</html>