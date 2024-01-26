<section id="gallery" class="gallery">

    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Galleria</h2>
        <p>Alcune foto del Castello</p>
      </div>
    </div>

    <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

      <div class="row g-0">

        @include('main.gallery.item', ['image' => asset('assets/img/gallery/gallery-1.jpg') ])
        @include('main.gallery.item', ['image' => asset('assets/img/gallery/gallery-2.jpg') ])
        @include('main.gallery.item', ['image' => asset('assets/img/gallery/gallery-3.jpg') ])
        @include('main.gallery.item', ['image' => asset('assets/img/gallery/gallery-4.jpg') ])
        @include('main.gallery.item', ['image' => asset('assets/img/gallery/gallery-5.jpg') ])
        @include('main.gallery.item', ['image' => asset('assets/img/gallery/gallery-6.jpg') ])
        @include('main.gallery.item', ['image' => asset('assets/img/gallery/gallery-7.jpg') ])
        @include('main.gallery.item', ['image' => asset('assets/img/gallery/gallery-8.jpg') ])

      </div>

    </div>
  </section>