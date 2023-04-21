@extends('layouts._main')


@section('content')

    @foreach($page_blocks as $page_block)
        @if($page_block->type == '1')
            <section class="page-block" id="block{{$page_block->id}}">
                <div class="container">
                    <h1>{{ $page_block->header }}</h1>
                    {!! $page_block->text !!}
                </div>
            </section>
        @elseif($page_block->type=='2')
            <div class="blo-photo" id="block{{$page_block->id}}">
                <div class="container pos-r">
                    <h3>{{ $page_block->header }}</h3>
                    <div class="blo-photo-item">
                        <img src="/uploads/{{ $page_block->image }}" alt="{{ $page_block->header }}">
                    </div>
                    <div class="blo-photo-txt">
                        {!! $page_block->text !!}
                    </div>
                </div>
            </div>
        @elseif($page_block->type=='3')
            <section class="w3l-feature-1"  id="block{{$page_block->id}}">
                <div class="grid top-bottom mb-lg-5 pb-lg-5">
                    <div class="container">
                        <div class="middle-section grid-column text-center">
                            <div class="three-grids-columns">
                                <span class="fa fa-laptop"></span>
                                <h3>{{ $page_block->header }}</h3>
                                {!! $page_block->text !!}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @elseif($page_block->type=='4')
            <section class="page-block-doc" id="block{{$page_block->id}}">
                <div class="container">
                    <h1>{{ $page_block->header }}</h1>
                    {!! $page_block->text !!}
                </div>
            </section>
        @elseif($page_block->type=='5')
            <section class="page-block-link" id="block{{$page_block->id}}">
                <div class="container">
                    <h1>{{ $page_block->header }}</h1>
                    {!! $page_block->text !!}
                </div>
            </section>
        @elseif($page_block->type=='6')
            <section class="page-block-pdf" id="block{{$page_block->id}}">
                <div class="container">
                    <h1>{{ $page_block->header }}</h1>
                    {!! $page_block->text !!}
                </div>
            </section>
        @elseif($page_block->type=='7')
            <div class="owl-carousel slide-one-item">
                @foreach($page_block->sliders as $slider)
                            @foreach($slider->items as $slider_item)
                                <div class="site-section-cover overlay img-bg-section"
                                     style="background-image: url('/uploads/{{$slider_item->image}}'); " >
                            <div class="container">
                                <div class="row align-items-center justify-content-center text-center">
                                    <div class="col-md-12 col-lg-8">
                                        <h1 data-aos="fade-up" data-aos-delay="">{{ $slider_item->title }}</h1>
                                        <p class="mb-5" data-aos="fade-up" data-aos-delay="100">
                                            {{ $slider_item->text }}
                                        </p>
                                        <p data-aos="fade-up" data-aos-delay="200">
                                            <a href="{{ $slider_item->url }}"
                                               class="btn btn-outline-white border-w-2 btn-md">Узнать подробнее</a>
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                            @endforeach
                @endforeach
            </div>
        @endif
    @endforeach

    <section class="w3l-feature-3"  id="block_directs">
        <div class="grid top-bottom mb-lg-5 pb-lg-5">
            <div class="container">
                <div class="middle-section grid-column text-center">
                    @foreach($directs as $item)

                        <div class="three-grids-columns">
                            <span class="fa fa-laptop"></span>
                            <h3>{{ $item->header }}</h3>
                            {!! $item->text !!}
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </section>

@stop
