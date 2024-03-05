<?php

use App\Filament\Resources\AttachmentResource\Pages\ListAttachments;
use App\Filament\Resources\MenuCategoryResource\Pages\ListMenuCategories;
use App\Filament\Resources\MenuItemResource\Pages\ListMenuItems;
use App\Filament\Resources\PostResource\Pages\ListPosts;
use App\Filament\Resources\ReviewResource\Pages\ListReviews;
use App\Filament\Resources\SettingResource\Pages\ListSettings;
use App\Models\User;

use function Pest\Livewire\livewire;

describe('Users can view pages', function (): void {
    beforeEach(function (): void {
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    });

    it('can render posts page', function (): void {
        livewire(ListPosts::class)->assertSuccessful();
    });

    it('can render reviews page', function (): void {
        livewire(ListReviews::class)->assertSuccessful();
    });

    it('can render attachments page', function (): void {
        livewire(ListAttachments::class)->assertSuccessful();
    });

    it('can render menu categories page', function (): void {
        livewire(ListMenuCategories::class)->assertSuccessful();
    });

    it('can render menu items page', function (): void {
        livewire(ListMenuItems::class)->assertSuccessful();
    });

    it('can render settings page', function (): void {
        livewire(ListSettings::class)->assertSuccessful();
    });
});
