<style>
    #hero {
        width: 100%;
        height: 100vh;
        background: url('{{ asset('assets/img/foto aerea CFA.jpg') }}') top center;
        background-size: cover;
        position: relative;
        padding: 0;
    }

    
</style>

<section id="hero" class="d-flex align-items-center" style="">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
        <div class="row">
            <div class="col-lg-8">
                <h1>Regalati una esperienza <span>indimenticabile</span></h1>
                <h2>Assapora i gusti locali e immergiti nella storia della delizia estense!</h2>


                {{-- <h3 class="mt-3" style="color:rgb(127, 234, 255); font-variant: small-caps; ">
                    <strong>Vieni a divertirti in piscina!</strong>
                </h3>
                <h3 style="color:rgb(127, 234, 255); font-variant: small-caps; ">
                    <strong>Stagione estiva 2023 al Castello di Fossadalbero</strong>
                </h3>
                <h3 style="color:rgb(127, 234, 255); font-variant: small-caps; ">
                    <strong><a href="#piscina">Clicca qui</a> per scoprire di più</strong>
                </h3> --}}


                {{-- <h3 style="color:rgb(255, 238, 1); font-variant: small-caps; ">
                    <strong>Attenzione, in data 25/07 la piscina rimane chiusa per maltempo!</strong>
                </h3> --}}

                {{-- <div class="btns">
                    <a href="#about" class="btn-menu animated fadeInUp scrollto">La nostra storia</a>
                    <a href="#menu" class="btn-book animated fadeInUp scrollto">Il menù del ristorante</a>
                </div> --}}

            </div>
            <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in"
                data-aos-delay="200">
                <a href="{{ $settings['company_youtube_promo'] }}" class="glightbox play-btn"></a>
            </div>

        </div>
    </div>
</section>
