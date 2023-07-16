@extends('frontend.main_master')
@section('content')
@section('title')
    @if (session()->get('language') == 'slovenian')
        O nas
    @else
        About Us
    @endif
@endsection

<!-- Company Overview start -->
<div class="bee-content-block">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (session()->get('language') == 'slovenian')
                    <div class="inner-content"> <img src="assets/images/about.jpg" class="rounded float-lg-left mb40"
                            alt="" />
                        <h4 class="mt0">O podjetju</h4>
                        <p>Naključno čebelarsko podjetje je družinsko podjetje, ki deluje že več kot 30 let.
                            Specializirani so za trajnostne čebelarske prakse, s poudarkom na pridelavi ekološkega medu
                            in ohranjanju avtohtonih vrst čebel.<br> S svojim močnim zavezanostjo do varovanja okolja
                            ponujajo tudi izobraževalne programe in možnosti posvojitve panjev za skupnost.
                        </p>
                        <h4>Naše poslanstvo</h4>
                        <p>Poslanstvo naključnega čebelarskega podjetja je spodbujanje blaginje čebel in njihove vloge
                            pri opraševanju, hkrati pa zagotavljanje visokokakovostnega medu in izdelkov povezanih s
                            čebelami. <br> Trudijo se ozaveščati javnost o pomembnosti čebel in trajnostnih čebelarskih
                            praks
                            za okolje. Njihov končni cilj je prispevati k ohranjanju populacij čebel in splošnemu
                            zdravju ekosistemov.
                        </p>
                        <h4>Naša vizija</h4>
                        <p>Vizija naključnega čebelarskega podjetja je izkoriščanje čebeljih družin za maksimiranje
                            dobička brez upoštevanja zdravja čebel ali okoljske trajnosti. Njihov fokus je izključno na
                            komercialni korist, ne upoštevajoč ključne vloge čebel pri opraševanju in ekološkem
                            ravnovesju. <br> Njihova kratkovidna vizija zanemarja dolgoročne posledice njihovih dejanj
                            na
                            populacije čebel in ekosisteme.
                        </p>
                        <div class="products-specification">
                            <h3>Naši produkti</h3>
                            <ul>
                                <li>
                                    <h5>Najboljša kvaliteta</h5>
                                    <p>Lorem Ipsum je slepo besedilo, ki se uporablja pri razvoju tipografij in
                                        pripravi različnih materialov v tisku in digitalnem okolju. Povedano drugače,
                                        slepo besedilo uporabimo v primerih, ko končnega besedila še nimamo, želimo pa
                                        pri predstavitvi doseči končen izgled za lažjo predstavo.
                                        <br>
                                        Besedilo Lorem Ipsum je v uporabi že več, kot petsto let, saj prvi primeri
                                        zapisov segajo v začetke 16. stoletja
                                    </p>
                                </li>
                                <li>
                                    <h5>Različne ugodnosti</h5>
                                    <p>Lorem Ipsum je slepo besedilo, ki se uporablja pri razvoju tipografij in
                                        pripravi različnih materialov v tisku in digitalnem okolju. Povedano drugače,
                                        slepo besedilo uporabimo v primerih, ko končnega besedila še nimamo, želimo pa
                                        pri predstavitvi doseči končen izgled za lažjo predstavo.
                                        <br>
                                        Besedilo Lorem Ipsum je v uporabi že več, kot petsto let, saj prvi primeri
                                        zapisov segajo v začetke 16. stoletja
                                    </p>
                                </li>
                                <li>
                                    <h5>100% garancija zadovoljstva</h5>
                                    <p>Lorem Ipsum je slepo besedilo, ki se uporablja pri razvoju tipografij in
                                        pripravi različnih materialov v tisku in digitalnem okolju. Povedano drugače,
                                        slepo besedilo uporabimo v primerih, ko končnega besedila še nimamo, želimo pa
                                        pri predstavitvi doseči končen izgled za lažjo predstavo.
                                        <br>
                                        Besedilo Lorem Ipsum je v uporabi že več, kot petsto let, saj prvi primeri
                                        zapisov segajo v začetke 16. stoletja
                                    </p>
                                </li>
                                <li>
                                    <h5>Brezplačna dostava</h5>
                                    <p>Lorem Ipsum je slepo besedilo, ki se uporablja pri razvoju tipografij in
                                        pripravi različnih materialov v tisku in digitalnem okolju. Povedano drugače,
                                        slepo besedilo uporabimo v primerih, ko končnega besedila še nimamo, želimo pa
                                        pri predstavitvi doseči končen izgled za lažjo predstavo.
                                        <br>
                                        Besedilo Lorem Ipsum je v uporabi že več, kot petsto let, saj prvi primeri
                                        zapisov segajo v začetke 16. stoletja
                                    </p>
                                </li>
                            </ul>
                        </div>
                        <div class="about-bee-sec">
                            <h3>O čebelah</h3>
                            <div class="about-bee-holder">
                                <div class="bee-icon"><img src="{{ asset('frontend/assets/images/queen-bee.png') }}"
                                        alt="Queen Bee" /></div>
                                <div class="about-bee-details">
                                    <h5>Čebelja matica</h5>
                                    <p>Lorem Ipsum je slepo besedilo, ki se uporablja pri razvoju tipografij in
                                        pripravi različnih materialov v tisku in digitalnem okolju. Povedano drugače,
                                        slepo besedilo uporabimo v primerih, ko končnega besedila še nimamo, želimo pa
                                        pri predstavitvi doseči končen izgled za lažjo predstavo.
                                        <br>
                                        Besedilo Lorem Ipsum je v uporabi že več, kot petsto let, saj prvi primeri
                                        zapisov segajo v začetke 16. stoletja
                                    </p>
                                </div>
                            </div>
                            <div class="about-bee-holder">
                                <div class="bee-icon"><img src="{{ asset('frontend/assets/images/drone-bee.png') }}"
                                        alt="Drone Bee" /></div>
                                <div class="about-bee-details">
                                    <h5>Čebelji Trot</h5>
                                    <p>Lorem Ipsum je slepo besedilo, ki se uporablja pri razvoju tipografij in
                                        pripravi različnih materialov v tisku in digitalnem okolju. Povedano drugače,
                                        slepo besedilo uporabimo v primerih, ko končnega besedila še nimamo, želimo pa
                                        pri predstavitvi doseči končen izgled za lažjo predstavo.
                                        <br>
                                        Besedilo Lorem Ipsum je v uporabi že več, kot petsto let, saj prvi primeri
                                        zapisov segajo v začetke 16. stoletja
                                    </p>
                                </div>
                            </div>
                            <div class="about-bee-holder">
                                <div class="bee-icon"><img src="{{ asset('frontend/assets/images/worker-bee.png') }}"
                                        alt="Worker Bee" />
                                </div>
                                <div class="about-bee-details">
                                    <h5>Čebela delavka</h5>
                                    <p>Lorem Ipsum je slepo besedilo, ki se uporablja pri razvoju tipografij in
                                        pripravi različnih materialov v tisku in digitalnem okolju. Povedano drugače,
                                        slepo besedilo uporabimo v primerih, ko končnega besedila še nimamo, želimo pa
                                        pri predstavitvi doseči končen izgled za lažjo predstavo.
                                        <br>
                                        Besedilo Lorem Ipsum je v uporabi že več, kot petsto let, saj prvi primeri
                                        zapisov segajo v začetke 16. stoletja
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="inner-content"> <img src="assets/images/about.jpg" class="rounded float-lg-left mb40"
                            alt="" />
                        <h4 class="mt0">About company</h4>
                        <p>The random beekeeping company is a family-owned business that has been operating for over 30
                            years. They specialize in sustainable beekeeping practices, focusing on organic honey
                            production and the preservation of native bee species. <br> With their strong commitment to
                            environmental stewardship, they also offer educational programs and hive adoption
                            opportunities for the community. </p>
                        <h4>Our Mission</h4>
                        <p>The mission of the random beekeeping company is to promote the well-being of bees and their
                            role in pollination while providing high-quality honey and bee-related products. They strive
                            to educate the public about the importance of bees and sustainable beekeeping practices for
                            the environment. <br> Their ultimate goal is to contribute to the preservation of bee
                            populations
                            and the overall health of ecosystems. </p>
                        <h4>Our Vision</h4>
                        <p>The vision of the random beekeeping company is to exploit honey bee colonies for maximum
                            profit
                            without regard for bee health or environmental sustainability. Their focus is solely on
                            commercial gain, disregarding the vital role of bees in pollination and ecological balance.
                            <br>
                            Their short-sighted vision neglects the long-term consequences of their actions on bee
                            populations and ecosystems.
                        </p>
                        <div class="products-specification">
                            <h3>Our products Specification</h3>
                            <ul>
                                <li>
                                    <h5>Best quality product</h5>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book.
                                    </p>
                                </li>
                                <li>
                                    <h5>One month free service</h5>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book.
                                        It has survived not only five centuries. </p>
                                </li>
                                <li>
                                    <h5>100% Guarantee</h5>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book.
                                    </p>
                                </li>
                                <li>
                                    <h5>Free home delivery</h5>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book.
                                        It has survived not only five centuries. </p>
                                </li>
                            </ul>
                        </div>
                        <div class="about-bee-sec">
                            <h3>About Bees</h3>
                            <div class="about-bee-holder">
                                <div class="bee-icon"><img src="{{ asset('frontend/assets/images/queen-bee.png') }}"
                                        alt="Queen Bee" /></div>
                                <div class="about-bee-details">
                                    <h5>Queen Bee</h5>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book.
                                        It has survived not only five centuries. </p>
                                </div>
                            </div>
                            <div class="about-bee-holder">
                                <div class="bee-icon"><img src="{{ asset('frontend/assets/images/drone-bee.png') }}"
                                        alt="Drone Bee" /></div>
                                <div class="about-bee-details">
                                    <h5>Drone Bee</h5>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book.
                                        It has survived not only five centuries. </p>
                                </div>
                            </div>
                            <div class="about-bee-holder">
                                <div class="bee-icon"><img src="{{ asset('frontend/assets/images/worker-bee.png') }}"
                                        alt="Worker Bee" />
                                </div>
                                <div class="about-bee-details">
                                    <h5>Worker Bee</h5>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book.
                                        It has survived not only five centuries. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Company Overview End -->

<!-- Contact Button start -->
{{-- @include('partials.contact-button') --}}
<!-- Contact Button End -->

<!-- testimonial start -->
@include('frontend.common.testimonials')
<!-- testimonial end -->
@endsection
