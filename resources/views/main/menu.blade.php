<section id="menu" class="menu section-bg">
    <div class="container mb-5" data-aos="fade-up">

      <div class="section-title">
        <h2>Menu</h2>
        <p>Scopri il nostro menù</p>
      </div>


      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="menu-flters">

            @foreach($menuCategories as $category)
                <li data-filter=".filter-{{ $category->slug }}" @if ($loop->first) class="filter-active" @endif>{{ $category->name }}</li>
            @endforeach

          </ul>
        </div>
      </div>

      <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">

        @foreach ($menuItems as $item)
            @include('main.menu.item')
        @endforeach

    </div>

    <div class="container" data-aos="fade-up">
        <p class="mt-4 pt-4 text-center fst-italic">
            I commensali affetti da intolleranze e/o allergie, oppure che seguono specifici regimi
            alimentari, possono concordare i piatti con lo staff del Ristorante.
        </p>
    </div>

</section>
