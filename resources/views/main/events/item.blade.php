<div class="swiper-slide">
    <div class="row event-item">
        <div class="col-lg-5 col-md-6">
            <img src="{{ asset($event->imageUrl) }}" class="img-fluid" alt="">
        </div>
        <div class="col-lg-7 col-md-6 pt-4 pt-lg-0 content">
            <h3 class="mb-3">{{ $event->title }}</h3>
            <div class="subtitle">
            <p><span>{{ $event->subtitle }}</span></p>
            </div>

            {!! $event->content !!}

        </div>
    </div>
</div>
