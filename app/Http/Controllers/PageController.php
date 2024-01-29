<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Setting;

class PageController extends Controller
{
    // show homepage
    public function homepage()
    {
        $settings = Setting::getSettings();
        $events = Post::published()->orderBy('order')->get();
        $menuItems = MenuItem::all();
        $menuCategories = MenuCategory::all();

        return view('layout', compact('settings', 'events', 'menuItems', 'menuCategories'));
    }
}
