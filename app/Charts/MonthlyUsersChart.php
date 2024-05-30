<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\areaChart
    {
        return $this->chart->areaChart()
            ->setTitle('Sales during 2021.')
            ->setSubtitle('Physical sales vs Digital sales.')
            ->addData('Physical sales', [40, 93, 35, 42, 18, 82])
            ->addData('Digital sales', [70, 29, 77, 28, 55, 45])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June'])
            ->setGrid(false, '#3F51B5', 0.1)
            ->setColors(['#FFC107', '#303F9F'])
            ->setMarkers(['#FF5722', '#E040FB'], 7, 10);
    }
}
