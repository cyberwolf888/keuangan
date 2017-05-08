<?php

namespace App\Http\Controllers\Kabag;

use App\Models\Dana;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function period()
    {
        return view('kabag.laporan.period');
    }

    public function result(Request $request)
    {
        $model = Dana::whereRaw('created_at>="'.$request->start_date.'"')
            ->whereRaw('created_at<="'.$request->end_date.'"');
        $total_transaksi = $model->count();
        $total_pengeluaran = \DB::table('dana')
            ->select(\DB::Raw('SUM(jumlah-sisa) as pengeluaran'))
            ->whereRaw('created_at>="'.$request->start_date.'"')
            ->whereRaw('created_at<="'.$request->end_date.'"')
            ->get()[0]->pengeluaran;

        return view('kabag.laporan.result',[
            'model'=>$model->get(),
            'total_transaksi'=>$total_transaksi,
            'total_pengeluaran'=>$total_pengeluaran,
            'periode'=>$request->start_date." - ".$request->end_date
        ]);
    }
}
