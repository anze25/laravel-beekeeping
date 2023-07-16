@extends('frontend.main_master')
@section('content')
@section('title')
    @if (session()->get('language') == 'slovenian')
        Napaka 404
    @else
        Error 404
    @endif
@endsection
<div class="bee-content-block" id="maincontent">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-10 offset-lg-1">
                <div class="error-section"> <img src="{{ asset('frontend/assets/images/404.png') }}" alt="" />
                    @if (session()->get('language') == 'slovenian')
                        <h1>Stran ni najdena</h1>
                        <p>Dobrodošli na naši strani 404! Razumemo, da morda niste nameravali pristati tukaj, vendar vam
                            zagotavljamo, da bomo storili vse, kar je v naši moči, da vam pomagamo najti iskano. Zdi se,
                            da stran, ki ste poskušali dostopati, ne obstaja na naši spletni strani.<br> To je lahko
                            posledica napake na naši strani ali pa je bila stran premaknjena ali odstranjena. Prosimo,
                            preverite vneseni URL ali poskusite poiskati vsebino, ki jo iščete, s pomočjo našega
                            iskalnega polja. Če še vedno ne najdete želenega, se obrnite na našo podporno ekipo za
                            nadaljnjo pomoč.<br>
                            Opravičujemo se za morebitne nevšečnosti in se vam zahvaljujemo za potrpežljivost.</p>
                        <a href="{{ url('/') }}" class="bee-button cta-btn">Nazaj na domačo stran</a>
                    @else
                        <h1>Page not found</h1>
                        <p>Welcome to our 404 page! We understand that arriving here might not have been your intention,
                            but
                            we assure you that we'll do our best to help you find what you're looking for. The page you
                            were
                            trying to access doesn't seem to exist on our website.<br> This might be because of a
                            mistake on
                            our part, or because the page has been moved or removed. Please double-check the URL you
                            entered, or
                            try searching for the content you're looking for using our search bar. If you're still
                            unable to
                            find what you're looking for, don't hesitate to contact our support team for further
                            assistance.<br>
                            We apologize for any inconvenience this may have caused and thank you for your patience.</p>
                        <a href="{{ url('/') }}" class="bee-button cta-btn">Back to Home</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
