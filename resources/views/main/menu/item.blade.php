<div
    class="
    col-lg-6
    menu-item
    @foreach ($item->menuCategories as $category)
        filter-{{ $category->slug }}
    @endforeach
">
    <img src="{{ asset($item->imageUrl) }}" class="menu-img-starter" alt=""
        style="border: 4px solid {{ $item->color }}BB;">

    <div class="menu-content">
        <a href="#">{{ $item->title }}</a><span>€{{ $item->price }}</span>
    </div>
    <div class="menu-ingredients">
        {{ $item->subtitle }}
    </div>
    <div class="menu-ingredients mt-1">
        @foreach ($item->allergens as $allergen)
            <span>
                <img
                    src="{{ asset($allergen->image_path) }}"
                    alt="{{ $allergen->name }}"
                    title="Contiene {{ Str::lower($allergen->name) }}"
                    style="
                        max-height: 22px;
                        cursor: pointer;
                    "
                >
            </span>
        @endforeach
    </div>
</div>
