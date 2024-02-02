<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <h3 style="margin-bottom: 36px;">Castello di Fossadalbero</h3>
                    <div class="row">

                        <div class="col-lg-6 col-md-6">
                            <div class="footer-info">
                                <p>
                                    {{ $settings['company_address'] }}
                                    <br>
                                    P.IVA: {{ $settings['company_vat'] }}
                                    <br>
                                    Capitale sociale: {{ $settings['company_social_capital'] }}
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="footer-info">
                                <p>

                                    <!-- <strong>Telefono:</strong> <a href="tel:0532241194">0532 241194</a><br> -->
                                    <strong>Telefono:</strong> <a
                                        href="tel:{{ $string = str_replace(' ', '', $settings['company_phone_number']); }}">{{ $settings['company_phone_number'] }}</a><br>
                                    <strong>E-Mail:</strong> <a
                                        href="mailto:{{ $settings['company_email_address'] }}">{{ $settings['company_email_address'] }}</a><br>
                                </p>
                                <div class="social-links mt-3">
                                    <a href="{{ $settings['company_facebook'] }}"
                                        class="facebook"><i class="bx bxl-facebook"></i></a>
                                    <a href="{{ $settings['company_instagram_1'] }}"
                                        class="instagram mx-3"><i class="bx bxl-instagram"></i></a>
                                    <a href="{{ $settings['company_instagram_2'] }}"
                                        class="instagram"><i class="bx bxl-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 col-md-6 footer-newsletter">
                    <h4>La nostra Newsletter</h4>
                    <p>
                        Il Castello è sede di numerose attività: iscriviti alla nostra newsletter per non perdere
                        alcuna offerta, evento o menù speciale del ristorante.
                    </p>
                    <p>
                        Potrai annullare l'iscrizione facilmente dal messaggio di posta elettronica.
                    </p>

                    <div class="text-center pt-3">

                        <a href="{{ $settings['company_newsletter_signup'] }}"
                            class="book-a-table-btn">Iscriviti alla newsletter</a>

                    </div>


                </div>

            </div>
        </div>

    </div>
    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>Immobiliare Castello di Fossadalbero S.p.A.</span></strong>, tutti i diritti
            sono riservati
        </div>
        <div class="credits">
            <a href="https://www.linkedin.com/in/claudio-gandini-fe/">@gandomullac</a>
        </div>
    </div>
</footer><!-- End Footer -->
