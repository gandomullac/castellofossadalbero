<style>
    .about {
        background: url('{{ asset('assets/img/CastelloNotteLow.jpg') }}') center center;
        background-size: cover;
        position: relative;
        padding: 80px 0;
    }

</style>



<section id="about" class="about">


    <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
                <div class="about-img">
                    <img src={{ asset('assets/img/Castello_fossadalbero_Wallpaper.jpg') }} alt="">
                </div>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                <h3 class="mb-4">Relax, storia e divertimento al Castello di Fossadalbero</h3>
                <div>
                    <p>
                        Il Castello di Fossadalbero, storica residenza della nobiltà estense, oggi rinasce come uno
                        splendido palazzo nelle campagne del Po, a pochi chilometri da Ferrara.
                    </p>
                    <p>
                        Tra i vari aspetti che caratterizzano questa suggestiva dimora risaltano la raffinata
                        architettura
                        medievale, in particolare l'antica torre merlata e il vasto giardino, e le installazioni
                        moderne, come
                        la
                        piscina e i campi da tennis.
                    </p>
                    <p>
                        A questi aspetti si aggiunge il Ristorante Castello di Fossadalbero, presso cui è possibile
                        godere dei
                        prelibati piatti della tradizione ferrarese ed emiliano-romagnola. Inoltre, il Castello si
                        presta
                        perfettamente per gioiosi happy hour e feste private, nonché per cerimonie indimenticabili nel
                        giorno
                        più bello.
                    </p>
                    <p class="mt-5">Goditi momenti di relax e di benessere senza paragoni al Castello di Fossadalbero.
                        <br>
                        Per informazioni: <a href="tel:+39{{ $string = str_replace(' ', '', $settings['company_phone_number']); }}">{{ $settings['company_phone_number'] }}</a></p>
                </div>

            </div>
        </div>

    </div>
</section>
