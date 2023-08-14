<!DOCTYPE html>
<!--[if lt IE 7]><html lang="ru" class="lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html lang="ru" class="lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html lang="ru" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="ru">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
{{--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>{{ $data->title }}</title>
    <meta name="description" content="{{ $data->description }}" />
    <meta name="keywords" content="{{ $data->keywords }}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="format-detection" content="telephone=no">
    <link rel="shortcut icon" href="images/favicon.png" type="image/png"/>
    @include('layouts.styles')
</head>
<body style="min-width: 1280px;">
<div class="wrapper">
    <div class="background-gradient">
        @include('layouts.header')

        <div class="banner">
            <div class="wrapper">
                <div class="banner-image">
                    <div class="gallary-image-position">
                        <div class="gallary-image">
                            <div class="line-1">
                                <div class="card-hover">
                                    <img class="gallary-image-item" src="{{asset('/uploads/'.$directs[0]->image )}}" alt="">
                                    <a class="link-partner" class href="">{{ $directs[0]->name }} </a>
                                </div>

                            </div>
                            <div class="line-2">
                                <div class="card-hover line-2-fixed-card">
                                    <img class="gallary-image-item" src="{{asset('/uploads/'.$directs[1]->image )}}" alt="">
                                    <a class="link-partner" class href="">{{ $directs[1]->name }} </a>
                                </div>
                                <div class="card-hover">
                                    <img class="gallary-image-item fixed-card" src="{{asset('/uploads/'.$directs[2]->image )}}" alt="">
                                    <a class="link-partner link-partner-fixed" class href="">{{ $directs[2]->name }} </a>
                                </div>


                            </div>
                            <div class="line-3">
                                <div class="card-hover">
                                    <img class="gallary-image-item" src="{{asset('/uploads/'.$directs[3]->image )}}" alt="">
                                    <a class="link-partner" class href="">{{ $directs[3]->name }} </a>
                                </div>

                                <div class="card-hover">
                                    <img class="gallary-image-item  fixed-card" src="{{asset('/uploads/'.$directs[4]->image )}}" alt="">
                                    <a class="link-partner link-partner-fixed" class href="">{{ $directs[4]->name }} </a>
                                </div>
                                <div class="card-hover ">
                                    <img class="gallary-image-item  fixed-card fix-padding-bottom" src="{{asset('/uploads/'.$directs[5]->image )}}" alt="">
                                    <a class="link-partner link-partner-fixed" class href="">{{ $directs[5]->name }} </a>
                                </div>



                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        @yield('content')


        @include('layouts.footer')
    </div>
</div>

@include('layouts.scripts')
</body>
</html>
