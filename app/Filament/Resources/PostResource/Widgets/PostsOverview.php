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
            Stat::make('Published news', Post::countPosts(type: 'published'))
                ->label(__('castello.published_news')),

            Stat::make('Scheduled news', Post::countPosts(type: 'scheduled'))
                ->label(__('castello.scheduled_news')),

            Stat::make('Expired news', Post::countPosts(type: 'expired'))
                ->label(__('castello.expired_news')),
                
            Stat::make('Archived news', Post::countPosts(type: 'archived'))
                ->label(__('castello.archived_news')),
        ];
    }
}
