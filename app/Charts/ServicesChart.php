<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $ordersData = DB::table('orders')
            ->select('id', DB::raw('count(*) as order_count'))
            ->where('year', 2021)
            ->where('city', $request->city)
            ->groupBy('service_name')
            ->pluck('order_count')->all();

        $servicenames = DB::table('orders')
            ->where('year', 2021)
            ->where('city', $request->city)

            ->groupBy('service_name')
            ->pluck('service_name')->all();

        return Chartisan::build()
            ->labels($servicenames)
            ->dataset('Orders Count',$ordersData );
    }
}