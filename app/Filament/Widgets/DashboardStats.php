<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\User;
use App\Models\Order;
use App\Models\Program;
use App\Models\Menu;

class DashboardStats extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Pengguna', User::count()),
            Card::make('Total Pesanan', Order::count()),
            Card::make('Total Pendapatan', 'Rp ' . number_format(Order::sum('total_harga'), 0, ',', '.')),
            Card::make('Total Artikel', Article::count()),
            Card::make('Total Program', Program::count()),
            Card::make('Total Menu', Menu::count()),
        ];
    }
}
