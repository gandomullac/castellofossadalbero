<?php

namespace App\Filament\Resources\ReviewResource\Widgets;

use App\Models\Review;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ReviewsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Number of reviews', Review::count())
                ->label(__('castello.number_of_reviews')),
        ];
    }
}
