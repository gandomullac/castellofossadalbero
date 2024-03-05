<div class="swiper-slide">
    <div class="testimonial-item">
        <p>
            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
            {{ $item->content }}
            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
        </p>
        <img src="{{ asset('assets/img/placeholders/avatar-person.svg') }}" class="testimonial-img" alt="">
        <h3>{{ $item->author }}</h3>
        <h4>
            <a href="{{ $item->url }}" target="_blank">
                {{ $item->platform }}
            </a>
        </h4>

    </div>
</div>
