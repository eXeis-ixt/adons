<?php

namespace App\Filament\Resources\BlogResrouceResource\Widgets;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Clent;
use App\Models\Service;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class BlogOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Clients', Clent::count()),
            Stat::make('Total Categories', Category::count())->icon('heroicon-m-arrow-trending-up'),
            Stat::make('Total Services', Service::count()),
            Stat::make('Total Blogs', Blog::count()),
        ];
    }
}
