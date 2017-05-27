<?php

namespace App\Http\Controllers\Bendahara;

use App\Models\Dana;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Image;

class DanaController extends Controller
{
    public function index()
    {
        $model = Dana::orderBy('id','desc')->get();
        return view('bendahara.dana.manage',[
            'model'=>$model
        ]);
    }

    public function create()
    {
        $model = new Dana();
        return view('bendahara.dana.form',['model'=>$model]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tgl_keluar' => 'required',
            'jumlah' => 'required|max:11|alpha_num',
            'penerima' => 'required|max:100'
        ]);

        //$path = base_path('img/bukti/');
        //$file = Image::make($request->file('image'))->resize(800, 600)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');

        $model = new Dana();
        $model->user_id = Auth::id();
        $model->tgl_keluar = date('Y/m/d',strtotime($request->tgl_keluar));
        $model->jumlah = $request->jumlah;
        $model->penerima = $request->penerima;
        //$model->bukti = $file->basename;
        //$model->sisa = $request->sisa;
        $model->sisa = 0;
        $model->status = 1;
        $model->keterangan = $request->keterangan;
        $model->save();

        return redirect()->route('bendahara.dana.manage');
    }

    public function show($id)
    {
        $model = Dana::findOrfail($id);
        return view('bendahara.dana.detail',['model'=>$model]);
    }

    public function edit($id)
    {
        $model = Dana::findOrFail($id);
        return view('bendahara.dana.form',['model'=>$model,'update'=>true]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required|max:11|alpha_num',
            'image' => 'image|max:3500'
        ]);

        $model = Dana::findOrFail($id);

        if ($request->hasFile('image')) {
            $path = base_path('img/bukti/');
            if(is_file($path.$model->bukti)){
                unlink($path.$model->bukti);
            }
            $file = Image::make($request->file('image'))->resize(800, 600)->encode('jpg', 80)->save($path.md5(str_random(12)).'.jpg');
            $model->bukti = $file->basename;
        }

        $model->sisa = $request->sisa;
        $model->status = $request->status;
        $model->save();

        return redirect()->route('bendahara.dana.manage');
    }

    public function destroy($id)
    {
        //
    }
}
