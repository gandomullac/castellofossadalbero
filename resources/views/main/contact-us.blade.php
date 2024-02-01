<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Contatti</h2>
            <p>Contattaci</p>
        </div>
    </div>

    <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;"
            src="https://maps.google.com/maps?q=via%20chiorboli%20366%20fossadalbero%20&t=&z=11&ie=UTF8&iwloc=&output=embed"
            frameborder="0" allowfullscreen></iframe>
    </div>

    <div class="container" data-aos="fade-up">

        <div class="row">

            <div class="col-lg-3">
                <div class="info">
                    <div class="open-hours">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Dove siamo:</h4>
                        <p>{{ $settings['company_address'] }}</p>
                    </div>
                </div>
            </div>


            <div class="col-lg-3">
                <div class="info">
                    <div class="open-hours">
                        <i class="bi bi-clock"></i>
                        <h4>I nostri orari:</h4>
                        <p>
                            {{ $settings['company_business_hours'] }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="info">
                    <div class="email">
                        <i class="bi bi-envelope"></i>
                        <h4>E-Mail:</h4>
                        <p>
                            <a href="mailto:{{ $settings['company_email'] }}">
                                {{ $settings['company_email'] }}
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            {{-- <div class="phone">
              <i class="bi bi-telephone"></i>
              <h4>Numero di telefono:</h4>
              <p><a href="tel:+390532241194">0532 241194</a></p>
            </div> --}}

            <div class="col-lg-3">
                <div class="info">
                    <div class="phone">
                        <i class="bi bi-telephone"></i>
                        <h4>Telefono:</h4>
                        <p><a
                                href="tel:+39{{ $string = str_replace(' ', '', $settings['company_phone_number']); }}">{{ $settings['company_phone_number'] }}</a>
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

</main>
