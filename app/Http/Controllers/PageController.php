<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class PageController extends Controller
{
    // show homepage
    public function homepage()
    {
        $settings = Setting::getSettings();

        return view('layout', compact('settings'));
    }
}
