<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class Talafat
{
    protected $tTalafatch;

    public function __construct(LarapexChart $tTalafatch)
    {
        $this->tTalafatch = $tTalafatch;
    }

    public function build($date, $breeder): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        $dReport = DB::table('daily_reports')->where('period_date', $date)->where('breeder', $breeder)->orderBy('tarikh', 'asc');
        return $this->tTalafatch->areaChart()
            ->addData('سالن اول', $dReport->pluck('t_talafat_s1')->toArray())
            ->addData('سالن دوم', $dReport->pluck('t_talafat_s2')->toArray())
            ->addData('سالن سوم', $dReport->pluck('t_talafat_s3')->toArray())
            ->addData('سالن چهارم', $dReport->pluck('t_talafat_s4')->toArray())
            ->addData('سالن پنجم', $dReport->pluck('t_talafat_s5')->toArray())
            ->addData('سالن ششم', $dReport->pluck('t_talafat_s6')->toArray())
            ->setXAxis($dReport->pluck('tarikh')->toArray())
            ->setGrid(false, '#3F51B5', 0.1)
            ->setMarkers(['#FF5722', '#E040FB'], 7, 10);
    }
}
