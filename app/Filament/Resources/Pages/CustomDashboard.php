<?php

namespace App\Filament\Pages;

class CustomDashboard extends \Filament\Pages\Dashboard
{
    protected static string $routePath = '/';

    protected static ?int $navigationSort = -2;

    protected static ?string $title = 'Custom Dashboard';
}
