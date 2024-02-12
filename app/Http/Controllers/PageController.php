<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\Models\Post;
use App\Models\Review;
use App\Models\Setting;

class PageController extends Controller
{
    // show homepage
    public function homepage()
    {
        $settings = Setting::getSettings();

        $events = Post::published()
            ->orderByDesc('priority')
            ->orderBy('published_at')
            ->orderBy('unpublished_at')
            ->get();

        $menuItems = MenuItem::with('menuCategories')
            ->get()
            ->sortBy(function ($menuItem) {
                return $menuItem->menuCategories->sortBy('id')->last();
            });

        // dd($menuItems);

        $menuCategories = MenuCategory::all();
        $reviews = Review::all();

        return view('layout', compact(
            'settings',
            'events',
            'menuItems',
            'menuCategories',
            'reviews'
        ));
    }
}
