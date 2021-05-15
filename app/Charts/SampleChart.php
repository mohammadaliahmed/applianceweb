<?php

declare(strict_types = 1);

namespace App\Charts;

use App\CommonFunctions;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SampleChart extends BaseChart
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
            ->groupBy('month')
            ->pluck('order_count')->all();

        $monthsData = DB::table('orders')
            ->where('year', $year)
            ->groupBy('month')
            ->pluck('month')->all();

        $mon=array();
        foreach ($monthsData as $moth){
            array_push($mon,CommonFunctions::$monthNamesArray[$moth]);
        }

        return Chartisan::build()
            ->labels($mon)
            ->dataset('Orders Count',$ordersData );
    }


    /**
     * Handles the HTTP request of the chart. This must always
     * return the chart instance. Do not return a string or an array.
     */

}