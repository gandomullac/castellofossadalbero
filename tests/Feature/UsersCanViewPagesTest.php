<?php

use App\Filament\Resources\AttachmentResource\Pages\ListAttachments;
use App\Filament\Resources\MenuCategoryResource\Pages\ListMenuCategories;
use App\Filament\Resources\MenuItemResource\Pages\ListMenuItems;
use App\Filament\Resources\PostResource\Pages\ListPosts;
use App\Filament\Resources\ReviewResource\Pages\ListReviews;
use App\Filament\Resources\SettingResource\Pages\ListSettings;

use function Pest\Livewire\livewire;



describe('Users can view pages', function () {
    beforeEach(function () {
        // $this->user = $this->createUser();
        // $this->actingAs($this->user);
    });


    it('can render posts page', function () {
        livewire(ListPosts::class)->assertSuccessful();
    });
    
    it('can render reviews page', function () {
        livewire(ListReviews::class)->assertSuccessful();
    });
    
    it('can render attachments page', function () {
        livewire(ListAttachments::class)->assertSuccessful();
    });
    
    it('can render menu categories page', function () {
        livewire(ListMenuCategories::class)->assertSuccessful();
    });
    
    it('can render menu items page', function () {
        livewire(ListMenuItems::class)->assertSuccessful();
    });
    
    it('can render settings page', function () {
        livewire(ListSettings::class)->assertSuccessful();
    });
});
