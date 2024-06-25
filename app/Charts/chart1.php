<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class chart1
{
    protected $chart1;

    public function __construct(LarapexChart $chart1)
    {
        $this->chart1 = $chart1;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $data = [40, 93, 35, 42, 18, 82];   

        return $this->chart1->lineChart()
        ->addData('MW Out', $data)
        ->addData('Temp Out', [70, 29, 77, 28, 55, 45])
        ->addData('Temp In', [10, 39, 87, 8, 15, 25])
        ->addData('H2S Shaker', [25, 83, 25, 32, 8, 72])
        ->addData('H2S Cellar', [63, 39, 27, 18, 65, 15])
        ->addData('H2S Mud Pond', [0, 19, 24, 18, 5, 15])
        ->setXAxis(['16:00', '16:30', '17:00', '18:00', '18:30', '19:00'])
        ->setColors(['#A84E5A', '#6276AB', '#4C1423', '#727CAB', '#C33AC8', '#72CEAD'])
        ->setMarkers(['#A84E5A', '#6276AB', '#4C1423', '#727CAB', '#C33AC8', '#72CEAD'], 7, 10)
        ;
    }
}
