<footer class="footer">
    <div class="wrapper">
        <div class="footer-wrapper">
            <img class="logo-footer" src="{{asset('/img/logo-footer.PNG')}}" alt="">
            <div class="footer-center-block">
                <div class="footer-center-block-line-1">
                    <div class="green-table-footer">
                        <p><a href="#top">Наверх</a></p>
                    </div>
                </div>

                <div class="footer-center-block-line-2">
                    @if(isset($pages))
                        @foreach($pages as $page)
                            @if($page->id != 1)
                                <div class="blue-table">
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
            <div class="footer-right">
                @if(config('phone') != '-')
                <p class="ahtung">Звонок бесплатный для всех регионов РФ</p>
                <p class="number">{{ config('phone') }}</p>
                @endif
            </div>
        </div>
    </div>

    <div class="airplane">
        <p>
            <a href="/Presentation_PLK.pdf" title="презентация Первой логистической компании " target="_blank">
                Ссылка на презентацию компании
            </a>
        </p>
        <div class="erorr"></div>
    </div>

</footer>
