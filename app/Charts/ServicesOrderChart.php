<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesOrderChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $year=$request->year;
        $ordersData = DB::table('orders')
            ->select('id', DB::raw('count(*) as order_count'))
            ->where('year', $year)
            ->groupBy('city')
            ->pluck('order_count')->all();

        $cities = DB::table('orders')
            ->where('year', $year)
            ->groupBy('city')
            ->pluck('city')->all();

        return Chartisan::build()
            ->labels($cities)
            ->dataset('Orders Count',$ordersData );
    }


    /**
     * Handles the HTTP request of the chart. This must always
     * return the chart instance. Do not return a string or an array.
     */

}