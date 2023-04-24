@extends('layouts._main')


@section('content')

    @foreach($page_blocks as $page_block)
        @if($page_block->type == '1')
            <div class="site-section bg-light block-13" id="testimonials-section" data-aos="fade">
                <div class="container">
                    <div class="text-center mb-5">
                        <div class="block-heading-1">
                            <h2>{{ $page_block->header }}</h2>
                        </div>
                    </div>
                    <div>
                        <div class="block-testimony-1 text-center">
                            {!! $page_block->text !!}
                        </div>
                    </div>

                </div>
            </div>
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
            <div class="site-section" id="press-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            <div class="block-heading-1" data-aos="fade-right" data-aos-delay="">
                                <h2>Новости</h2>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                @foreach($company_news as $item)
                                <li class="mb-5" data-aos="fade-right" data-aos-delay="">
                                    <span class="d-block text-muted mb-3">{{ $item->date }}</span>
                                    <h2 class="h4">
                                        <a href="press-single.html" class="text-black">
                                            {{ $item->name }}
                                        </a>
                                    </h2>

                                    <a href="/company-new/{{$item->id}}">
                                    {!! $item->anons !!}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($page_block->type=='6')
            <section class="page-block-pdf" id="block{{$page_block->id}}">
                <div class="container">
                    <h1>{{ $page_block->header }}</h1>
                    {!! $page_block->text !!}
                </div>
            </section>
        @elseif($page_block->type=='14')
            <div class="site-section bg-dark" id="about-section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6 col-md-6 mb-4 col-lg-0 col-lg-3" data-aos="fade-up" data-aos-delay="">
                                    <div class="block-counter-1">
                                        <span class="number"><span data-number="{{ config('transported') }}">0</span>+</span>
                                        <span class="caption">
                                            {{ $config['transported']['description'] }}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 mb-4 col-lg-0 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                                    <div class="block-counter-1">
                                        <span class="number"><span data-number="{{ config('personal') }}">0</span>+</span>
                                        <span class="caption">
                                            {{ $config['personal']['description'] }}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 mb-4 col-lg-0 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                                    <div class="block-counter-1">
                                        <span class="number"><span data-number="{{ config('containers') }}">0</span>+</span>
                                        <span class="caption">
                                            {{ $config['containers']['description'] }}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 mb-4 col-lg-0 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                                    <div class="block-counter-1">
                                        <span class="number"><span data-number="{{ config('delivery') }}">0</span>+</span>
                                        <span class="caption">
                                            {{ $config['delivery']['description'] }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif($page_block->type=='13')
            <div class="site-section">
                @foreach($directs as $item)
                <div class="block__{{ $item->id }} mb-2" id="services-section{{ $item->id }}">
                    <div class="container">
                        <div class="row d-flex no-gutters align-items-stretch">
                            <div class="col-12 col-lg-6 block__{{ $item->id }}
                            {{ (($item->order % 2) == 0) ? 'order-lg-2' : ''}}"
                                 style="background-image: url('/uploads/{{ $item->image }}');"
                                 data-aos="fade-{{ (($item->order % 2) == 0) ? 'left' : 'right' }}" data-aos-delay="">
                            </div>
                            <div class="col-lg-5 ml-auto p-lg-5 mt-4 mt-lg-0 {{ (($item->order % 2) == 0) ? 'order-lg-1' : ''}}"
                                 data-aos="fade-{{ (($item->order % 2) == 0) ? 'left' : 'right' }}" data-aos-delay="">
                                <h2 class="mb-3 text-black">{!! $item->name !!}</h2>
                                <p>{{ $item->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
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
            @elseif($page_block->type=='10')
            @foreach($page_block->mail_forms as $item)
                <div class="site-section bg-light mail-form" id="block{{ $page_block->id }}">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center mb-5" data-aos="fade-up" data-aos-delay="">
                                <div class="block-heading-1">
                                    <h2>{{ $item->name }}</h2>
                                    <span>{!! $page_block->text  !!}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mb-12" data-aos="fade-up" data-aos-delay="100">
                                <form id="sendform{{ $item->id }}" class="send-form" method="post">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                @foreach($item->fields as $field)
                                    <div class="col-md-{{ round(12/($item->fields->count()+1)) }}">
                                   <input type="text" class="form-control" rel="{{ $field->field_name }}"
                                          id="{{ $field->field_name }}{{ $item->id }}"
                                          name="{{ $field->field_name }}" placeholder="{{ $field->field_value }}">
                                    </div>
                                @endforeach
                                <div class="col-md-{{ round(12/($item->fields->count()+1)) }} ml-auto">
                                <button type="button" class="btn btn-block btn-primary text-white py-3 px-5 submit-button"
                                        rel="{{ $item->id }}">
                                    Отправить
                                </button>
                            </div>
                            </div>
                            <input type="hidden" name="uid" value="{{ $item->id }}">
                        </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    @endforeach

@stop
