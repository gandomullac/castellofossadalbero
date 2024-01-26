<?php

namespace App\Filament\Resources\PostResource\Widgets;

use App\Models\Post;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PostsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '3s';

    protected function getStats(): array
    {
        return [
            Stat::make('Published news', Post::countPosts(type: 'published')),
            Stat::make('Scheduled news', Post::countPosts(type: 'scheduled')),
            Stat::make('Expired news', Post::countPosts(type: 'expired')),
            Stat::make('Archived news', Post::countPosts(type: 'archived')),
        ];
    }
}
