<?php

declare(strict_types=1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendorOrdersMonthlyChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {

        $milliseconds = round(microtime(true));
        $month = date("m", (int)$milliseconds);
        $year = date("Y", (int)$milliseconds);
        $vendor = $request->vendor;
        $ordersData = DB::table('orders')
            ->select('id', DB::raw('count(*) as order_count'))
            ->where('year', $year)
            ->where('vendor', $vendor)
            ->where('month', $month)
            ->groupBy('day')
            ->pluck('order_count')->all();

        $days = DB::table('orders')
            ->where('year', $year)
            ->where('vendor', $vendor)
            ->where('month', $month)
            ->groupBy('day')
            ->pluck('day')->all();


        return Chartisan::build()
            ->labels($days)
            ->dataset('Orders in ' . $month . '/' . $year, $ordersData);
    }
}