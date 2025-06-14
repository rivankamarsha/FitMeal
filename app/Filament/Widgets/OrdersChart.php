<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class OrdersChart extends ChartWidget
{
    protected static ?string $heading = 'Statistik Pesanan Bulanan';

    protected function getData(): array
    {
        $months = collect(range(1, 12))->map(function ($month) {
            return Carbon::create()->month($month)->format('M');
        });

        $orders = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->pluck('count', 'month');

        $data = $months->map(function ($label, $index) use ($orders) {
            return $orders[$index + 1] ?? 0;
        });

        return [
            'datasets' => [
                [
                    'label' => 'Pesanan',
                    'data' => $data,
                    'backgroundColor' => '#10B981', // Tailwind green-500
                ],
            ],
            'labels' => $months->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // atau 'line' jika kamu ingin garis
    }
}
