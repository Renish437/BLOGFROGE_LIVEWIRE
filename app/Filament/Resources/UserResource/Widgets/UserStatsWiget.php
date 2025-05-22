<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserStatsWiget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            //
            Stat::make('Total Users', User::count()),
            Stat::make('Total Admin', User::where('role', 'ADMIN')->count()),
            Stat::make('Total Editor', User::where('role', 'EDITOR')->count()),
            
            


        ];
    }
}
