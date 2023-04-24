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
                <img src="{{ asset('images/layer45278-a7dr.svg') }}" alt="Layer45278" class="desktop-layer42"/>
                <img src="{{ asset('images/layer45278-xkal.svg') }}" alt="Layer45278" class="desktop-layer43"/>
                <!--              <div class="site-logo-text">-->
                <a href="index.html" class="text-black"><div class="text-primary site-logo-text">{{ config('company_name') }}</div></a>
                <!--              </div>-->
            </div>

            <div class="col-12">
                <nav class="site-navigation text-right ml-auto " role="navigation">
                    <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                        @if(isset($pages))
                            @foreach($pages as $page)
                                <li {{ $page->relation ? "class=has-children" : "" }}>
                                    @if($page->redirect=='')
                                        <a href='/{{ $page->url }}'>{!! $page->name  !!} </a>
                                    @else
                                        <a href='/{{ $page->redirect }}'>{!! $page->name  !!} </a>
                                    @endif
                                    @if ($page->relation)
                                        <ul class="dropdown arrow-top">
                                            @foreach($page->sub_pages as $sub_page)
                                                <li>
                                                    @if($sub_page->redirect=='')
                                                        <a href='/{{ $sub_page->url }}'>{{ $sub_page->name }}</a>
                                                    @else
                                                        <a href='/{{ $sub_page->redirect }}'>{{ $sub_page->name }}</a>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </nav>

            </div>

            <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

        </div>
    </div>

</header>

