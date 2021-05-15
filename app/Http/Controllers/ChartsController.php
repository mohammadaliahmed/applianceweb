<?php

namespace App\Http\Controllers;

use App\Charts\BloodPressureChart;
use Chartisan\PHP\Chartisan;
use Illuminate\Http\Request;

class ChartsController extends Controller
{
    //

    public function renderChart(){



        $year = ['2015','2016','2017','2018','2019','2020'];
        $user = ['4','12','16','10','9','5'];


        return view('samplechart')->with('year',json_encode($year,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK));


    }
}

