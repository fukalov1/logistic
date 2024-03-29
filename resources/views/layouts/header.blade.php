<header class="header">
    <div class="wrapper">
        <div class="header-block-1">
            <div id="top"></div>
            <img src="{{asset('/img/logo-header.PNG')}}" alt="{{ config('company_name') }}">
            <div class="nav">
                <div class="nav-line-1">
                    <div class="{{ $data->id == 1 ? 'green-table' : 'white-table' }}">
                        <p><a href='/'>Главная страница</a></p>
                    </div>
                </div>
                <div class="nav-line-2">
                    @if(isset($pages))
                        @foreach($pages as $page)
                            @if($page->id != 1)
                            <div class="{{ $page->id == $data->id ? 'green-table' : 'white-table' }}">
                            @if($page->redirect=='')
                                    <p><a href='/{{ $page->url }}'>{!! $page->name  !!} </a></p>
                                @else
                                    <p><a href='/{{ $page->redirect }}'>{!! $page->name  !!} </a></p>
                                @endif
                            </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="header-decoration-line"></div>
        <div class="header-block-2">
            @if(config('phone') != '-')
            <p class="text-of-number">Звонок бесплатный для всех регионов РФ</p>
            <p class="number">{{ config('phone') }}</p>
            @endif
        </div>
        <div class="green-banner">
            <p>
                <a href="/Presentation_PLK.pdf" title="презентация Первой логистической компании " target="_blank">
               Ссылка на презентацию компании
                </a>
            </p>
            <div class="erorr"></div>
        </div>
    </div>
</header>
