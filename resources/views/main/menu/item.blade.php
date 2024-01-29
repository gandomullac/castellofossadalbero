<div class="
    col-lg-6
    menu-item
    @foreach ($item->menuCategories as $category)
    filter-{{ $category->slug }}
    @endforeach
">
    <img src="{{ asset('assets/img/food_placeholder.jpg') }}" class="menu-img-starter" alt="">
    {{-- <img src="{{ asset('/storage/' . $item->image) }}"
    class="menu-img-starter" alt=""> --}}

    <div class="menu-content">
        <a href="#">{{ $item->title }}</a><span>€{{ $item->price }}</span>
    </div>
    <div class="menu-ingredients">
        {{ $item->subtitle }}
    </div>
</div>
