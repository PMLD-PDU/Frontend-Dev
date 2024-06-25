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

    public function build(): \ArielMejiaDev\LarapexCharts\lineChart
    {
        return $this->chart->lineChart()
            ->addData('TORQ', [40, 93, 35, 42, 18, 82])
            ->addData('Block Position', [70, 29, 77, 28, 55, 45])
            ->addData('ROPi', [10, 39, 87, 8, 15, 25])
            ->addData('Flow out', [25, 83, 25, 32, 8, 72])
            ->addData('Backside Flow', [63, 39, 27, 18, 65, 15])
            ->addData('Pit Volume Act', [0, 19, 24, 18, 5, 15])
            ->setXAxis(['16:00', '16:30', '17:00', '18:00', '18:30', '19:00'])
            ->setColors(['#4700DE', '#6DCF77', '#C9A857', '#727CAB', '#C33AC8', '#666E40'])
            ->setMarkers(['#4700DE', '#6DCF77', '#C9A857', '#727CAB', '#C33AC8', '#666E40'], 7, 10)
            ;
    }
}
