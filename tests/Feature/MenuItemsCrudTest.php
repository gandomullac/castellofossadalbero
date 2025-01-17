<?php

use App\Models\MenuItem;

const MENU_COUNT = 1;

describe('Menu items can be handled', function (): void {

    afterEach(function (): void {
        MenuItem::all()->each(fn($item) => $item->delete());
    });

    test('Menu items can be created', function (): void {
        MenuItem::factory()->count(MENU_COUNT)->create();

        expect(MenuItem::count())->toBe(MENU_COUNT);
    });

    test('A menu item can be retrieved', function (): void {
        $item = MenuItem::factory()->create();
        $retrieved = MenuItem::find($item->id);

        expect($retrieved->id)->toBe($item->id);
        expect($retrieved->title)->toBe($item->title);
    });

    test('All menu items can be retrieved', function (): void {
        MenuItem::factory()->count(MENU_COUNT)->create();
        $items = MenuItem::all();

        expect(count($items))->toBe(MENU_COUNT);
    });

    test('A menu item can be updated', function (): void {
        $item = MenuItem::factory()->create();
        $item->update(['title' => 'New title']);

        expect($item->title)->toBe('New title');
    });

    test('A menu item can be deleted', function (): void {
        $item = MenuItem::factory()->create();
        $item->delete();

        expect(MenuItem::count())->toBe(0);
    });

    test('A menu item image can be deleted from disk', function (): void {
        $item = MenuItem::factory()->create();
        $itemImage = $item->image;
        $item->delete();

        expect(file_exists(public_path($itemImage)))->toBeFalse();
    });

    test('A menu item image can be updated', function (): void {})->skip();

});
