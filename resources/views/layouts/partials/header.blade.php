<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset( $title ) ? $title . ' ' . env( 'PROJECT_NAME' ) : 'Pangaea Assessment' }}</title>
    <link rel="stylesheet" href="{{asset('assets/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}?v={{ filemtime(public_path('assets/css/app.css')) }}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
