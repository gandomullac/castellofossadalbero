<div
    class="
    col-lg-6
    menu-item
    @foreach ($item->menuCategories as $category)
        filter-{{ $category->slug }} @endforeach
">
    <img src="{{ asset($item->Image) }}" class="menu-img-starter" alt=""
        style="border: 4px solid {{ $item->color }}BB;">

    <div class="menu-content">
        <a href="#">{{ $item->title }}</a><span>€{{ $item->price }}</span>
    </div>
    <div class="menu-ingredients">
        {{ $item->subtitle }}
    </div>
</div>
