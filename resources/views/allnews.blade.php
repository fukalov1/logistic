@extends('layouts._news')


@section('content')


    <div class="breadcrumbs">
        <div class="container">
            {!! $bread_crumbs !!}
        </div>
    </div>

    <section class="page-block">
        <div class="container">

    @foreach($data as $item)
            <div class="one-news">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 date">
                        <div>{{ $item->date }}</div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3>{{ $item->name }}</h3>
                    <p><a href="/company-new/{{ $item->id }}">{!! $item->anons !!}</a></p>
                    </div>
                </div>
            </div>
    @endforeach
        </div>
    </section>



@stop
