<?php

use App\Filament\Resources\PostResource\Pages\ListPosts;

use function Pest\Livewire\livewire;
 
it('can render page', function () {
    livewire(ListPosts::class)->assertSuccessful();
});