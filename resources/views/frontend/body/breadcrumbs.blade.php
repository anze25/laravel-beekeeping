<div class="bee-content-block bee-breadcroumb inner-bg-1">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-7">
                <h1>@yield('title')</h1>
                <a href="/" title="Home">
                    @if (session()->get('language') == 'slovenian')
                        Domov
                    @else
                        Home
                    @endif
                </a> / @yield('title')
            </div>
            <div class="col-12 col-lg-5 text-right">
                @if (session()->get('language') == 'slovenian')
                    <h4>Najboljša svetovna kakovost izdelkov in usposabljanja za <span>čebelarstvo</span>
                    </h4>
                @else
                    <h4>The world best quality of product and Training, for <span>Beekeeping</span> with
                        <span>Bee!</span>
                    </h4>
                @endif
            </div>
        </div>
    </div>
</div>
