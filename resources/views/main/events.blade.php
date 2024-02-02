<style>
    .events {
    background: url({{ asset('assets/img/events-bg3.jpg') }}) center center no-repeat;
    background-size: cover;
    position: relative;
    }
</style>

<section id="events" class="events">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Eventi</h2>
            <p>I prossimi eventi al Castello</p>
        </div>

        <div class="events-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">


                @foreach($events as $event)
                  @include('main.events.item')
                @endforeach



            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section><!-- End Events Section -->
