
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'multi dmc admin') }}</title>

    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
    {{--    <!--===============================================================================================-->--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/fonts/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    {{--    <!--===============================================================================================-->--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/fonts/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/vendor/animate/animate.css') }}">
    {{--    <!--===============================================================================================-->--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/vendor/css-hamburgers/hamburgers.min.css') }}">
    {{--    <!--===============================================================================================-->--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/vendor/select2/select2.min.css') }}">
    {{--    <!--===============================================================================================-->--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/util.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/main.css') }}">
    <!--===============================================================================================-->

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{ asset('js/html5shiv.js') }}"></script>
    <script src=" {{ asset('js/respond.min.js') }}"></script>
    <![endif]-->
</head>
