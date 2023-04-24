@extends('layouts._pages')


@section('content')

    <section class="w3l-about-breadcrum">
        <div class="breadcrum-bg py-sm-5 py-4">
            <div class="container py-lg-3">
                <h2>Объявления</h2>
                <p><a href="/">Главная</a> &nbsp; / &nbsp; Новости</p>
            </div>
        </div>
    </section>
    <!-- content-with-photo4 block -->
    <section class="w3l-content-with-photo-4">
        <div id="content-with-photo4-block" class="pt-5">
            <div class="container py-md-5">
                <div class="one-news">
                    <div class="row">
                        <div class="col-lg-2 col-md-2 col-sm-2 date">
                            <div>{{ $data->date }}</div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h3>{{ $data->name }}</h3>
                            <p>{!! $data->text !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
