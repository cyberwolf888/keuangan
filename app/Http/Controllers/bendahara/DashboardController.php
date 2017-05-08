<?php

namespace App\Http\Controllers\Bendahara;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $chart = '[';
        for($i=1; $i<=12; $i++){
            $_profit = \DB::table('dana')->select(\DB::Raw('SUM(jumlah-sisa) as pengeluaran'))->whereRaw("MONTH(created_at) = ".$i)->get()[0]->pengeluaran;
            $profit = $_profit == '' ? 0 : $_profit;
            $chart.='['.'"'.strtoupper(date('M', strtotime('01-' . $i . '-2017'))).'",'.$profit.'],';
        }
        $chart = substr($chart, 0, -1).']';
        //dd($chart);
        return view('bendahara.dashboard.index',[
            'chart'=>$chart
        ]);
    }
}
