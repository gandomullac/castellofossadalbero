<section id="testimonials" class="testimonials section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Feedback</h2>
        <p>Cosa dicono di noi</p>
      </div>

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
        <div class="swiper-wrapper">

            @foreach ($reviews as $item)
                @include('main.reviews.item')
            @endforeach

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section>