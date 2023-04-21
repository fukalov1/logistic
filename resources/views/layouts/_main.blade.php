<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ru" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html lang="ru" class="lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html lang="ru" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="ru">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $data->title }}</title>
    <meta name="description" content="{{ $data->description }}" />
    <meta name="keywords" content="{{ $data->keywords }}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" href="images/favicon.png" type="image/png"/>
    @include('layouts.styles')
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<div id="overlayer"></div>
<div class="loader">
    <div class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>

<div class="site-wrap"  id="home-section">
    @include('layouts.header')

    @yield('content')

@include('layouts.footer')

</div>

@include('layouts.scripts')
</body>
</html>
