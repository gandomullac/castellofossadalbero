<section id="menu" class="menu section-bg">
    <div class="container mb-5" data-aos="fade-up">

      <div class="section-title">
        <h2>Menu</h2>
        <p>Dai un'occhiata al nostro menù</p>
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

    


  </section>