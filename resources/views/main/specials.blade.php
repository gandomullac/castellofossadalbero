<section id="specials" class="specials">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Attività</h2>
        <p>Sport e relax nella Delizia Estense</p>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-3">
          <ul class="nav nav-tabs flex-column">
            <li class="nav-item">
              <a class="nav-link  active show" data-bs-toggle="tab" href="#tab-1">Campi da Tennis</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Piscina per adulti e bambini</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Itinerari in bicicletta</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Diventa socio</a>
            </li>
          </ul>

        </div>
        <!-- FIXME: fare in modo che il link soci apra la scheda soci -->
        <div class="col-lg-9 mt-4 mt-lg-0">
          <div class="tab-content">
            <div class="tab-pane active show" id="tab-1">
              <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3>Campi da tennis in terra rossa con illuminazione notturna</h3>
                  <p>Dai giardini della Delizia è possibile accedere ai due campi da tennis,
                    prenotabili in autonomia tramite la comoda web app <a
                      href="{{ $settings['company_wansport'] }}">Wansport</a>.</p>
                  <p> {{ $settings['tennis_promo'] }}
                  </p>
                  <p>Per qualsiasi informazione, vi invitiamo a contattarci all'indirizzo <a
                      href="mailto:info@castellofossadalbero.it">info@castellofossadalbero.it</a>.</p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2 mb-4">
                  <img src="{{ asset('assets/img/attivita/tennis.jpg') }}" alt="" class="img-fluid special-image">
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-2">
              <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3>Piscina per adulti e bambini attrezzata con ombrelloni e bar</h3>
                  <p>A fianco del Ristorante si può accedere all'incantevole piscina attrezzata del
                    Castello.</p>
                  <p>Si tratta di un impianto adatto per adulti e bambini, sempre supervisionato da un bagnino e
                    attrezzato con un bar, ombrelloni, sedie sdraio e tavolini: insomma, l'ambiente ideale per
                    rilassarsi,
                    lontano dal caos della città e dei lidi.</p>
                  <p>
                    <a href="{{ asset('assets/pdf/brochure_piscina.pdf') }}" download> Clicca qui per
                      scaricare la brochure della piscina 2024</a>.
                  </p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2 mb-4">
                  <img src="{{ asset('assets/img/attivita/foto piscina.jpg') }}" alt="" class="img-fluid special-image">
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-3">
              <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3>Splendidi percorsi per biciclette nelle campagne ferraresi</h3>
                  <p>Il Castello di Fossadalbero sorge nel pieno della campagna coltivata, resa fertile dal vicino e
                    maestoso fiume Po. In questo ambiente, ricco di paesaggi suggestivi e di fauna aviaria locale
                    (come gli aironi cenerini), è possibile godere di itinerari ciclistici molto suggestivi.</p>
                  <p>In particolare si consiglia da Ferrara di raggiungere il Castello in biciletta passando per
                    Malborghetto di Boara, oppure di approfittare del vicinissimo argine percorribile del Destra Po.
                  </p>
                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2 mb-4">
                  <img src="{{ asset('assets/img/attivita/po.jpg') }}" alt="" class="img-fluid special-image">
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tab-4">
              <div class="row">
                <div class="col-lg-8 details order-2 order-lg-1">
                  <h3>Diventa socio del Castello per avere vantaggi esclusivi</h3>
                  <p>Se il Castello di Fossadalbero è una meta comune per te e per la tua famiglia,
                    la possibilità di diventare socio della struttura ti può consentire di ottenere una tessera per
                    l'accesso alla piscina e di avere tariffe ridotte per l'uso dei campi da tennis. </p>
                  <p>Per qualsiasi informazione, vi invitiamo a contattarci all'indirizzo <a
                      href="mailto:info@castellofossadalbero.it">info@castellofossadalbero.it</a>.</p>

                </div>
                <div class="col-lg-4 text-center order-1 order-lg-2 mb-4">
                  <img src="{{ asset('assets/img/attivita/socio.jpg') }}" alt="" class="img-fluid special-image">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
