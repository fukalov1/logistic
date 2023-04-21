<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="#" class="text-white"><span class="mr-2 text-white icon-envelope-open-o"></span> <span class="d-none d-md-inline-block">{{ config('email') }}</span></a>
                <span class="mx-md-2 d-inline-block"></span>
                <div class="float-right">
                    <a href="#" class="text-white"><span class="mr-2 text-white icon-phone"></span> <span class="d-none d-md-inline-block">{{ config('phone') }}</span></a>
                </div>

            </div>

        </div>

    </div>
</div>

<header class="site-navbar js-sticky-header site-navbar-target" role="banner">

    <div class="container">
        <div class="row align-items-center position-relative">
            <div class="site-logo">
                <img src="images/layer45278-a7dr.svg" alt="Layer45278" class="desktop-layer42"/>
                <img src="images/layer45278-xkal.svg" alt="Layer45278" class="desktop-layer43"/>
                <!--              <div class="site-logo-text">-->
                <a href="index.html" class="text-black"><div class="text-primary site-logo-text">{{ config('company_name') }}</div></a>
                <!--              </div>-->
            </div>

            <div class="col-12">
                <nav class="site-navigation text-right ml-auto " role="navigation">

                    <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                        @if(isset($pages))
                            @foreach($pages as $page)
                                @if()
                                <li><a href="{{ $page->url }}" class="nav-link">{{ $page->name }}</a></li>
                                @else
                                    <li class="has-children">
                                        <a href="#services-section" class="nav-link">Услуги</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                        <li><a href="#home-section" class="nav-link">Главная</a></li>
                        <li class="has-children">
                            <a href="#services-section" class="nav-link">Услуги</a>
                            <ul class="dropdown arrow-top">
                                <li><a href="#team-section" class="nav-link">Внутрироссийские перевозки</a></li>
                                <li><a href="#pricing-section" class="nav-link">Международная логистика</a></li>
                                <li><a href="#faq-section" class="nav-link">Контейнерные перевозки</a></li>
                                <li><a href="#faq-section" class="nav-link">Логистика нефтяных и газовых месторождений</a></li>
                                <li><a href="#faq-section" class="nav-link">Перевозки негабаритных грузов</a></li>
                                <li><a href="#faq-section" class="nav-link">Перевозки зерновых культур</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="#about-section" class="nav-link">О компании</a>
                        </li>

                        <li><a href="#contact-section" class="nav-link">Контакты</a></li>
                    </ul>
                </nav>

            </div>

            <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

        </div>
    </div>

</header>

<!-- Top Menu 1 -->
<section class="w3l-top-menu-1">
    <div class="top-hd">
        <div class="container">
            <header class="row top-menu-top">
                <div class="accounts col-md-9 col-6">
                    <li class="top_li"><span class="fa fa-phone"></span><a href="tel:{{ config('phone') }}">{{ config('phone') }}</a> </li>
                    <li class="top_li1"><span class="fa fa-envelope-o"></span> <a href="mailto:{{ config('email') }}" class="mail"> {{ config('email') }}</a>	</li>
                </div>

            </header>
        </div>
    </div>
</section>
<!-- //Top Menu 1 -->
<section class="w3l-bootstrap-header">
    <nav class="navbar navbar-expand-lg navbar-light py-lg-2 py-2">
        <div class="container">
{{--            <a class="navbar-brand" href="index.html"><span class="fa fa-pencil-square-o "></span>РКЦ-Консалтинг Сервис</a>--}}
          <a class="navbar-brand" href="/">
              <img src="{{asset('assets/images/logo.png')}}" alt="{{ config('company_name') }}" title="{{ config('company_name') }}" style="height:35px;" />
          </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fa fa-bars"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    @if(isset($pages))
                    @foreach($pages as $page)
                    <li class="nav-item">
                            <a class="nav-link" href="/{{ $page->url }}">{{ $page->name }}</a>
                    </li>
                    @endforeach
                    @endif
                </ul>
{{--                <form action="search-results.html" class="form-inline position-relative my-2 my-lg-0">--}}
{{--                    <input class="form-control search" type="search" placeholder="Search here..." aria-label="Search" required="">--}}
{{--                    <button class="btn btn-search position-absolute" type="submit"><span class="fa fa-search" aria-hidden="true"></span></button>--}}
{{--                </form>--}}
            </div>
        </div>
    </nav>
</section>
