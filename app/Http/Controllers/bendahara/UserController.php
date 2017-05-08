<?php

namespace App\Http\Controllers\Bendahara;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function bendahara()
    {
        $model = User::where(['type'=>1])->orderBy('id','desc')->get();
        return view('bendahara.user.bendahara',['model'=>$model]);
    }

    public function create_bendahara()
    {
        $model = new User();
        return view('bendahara.user.bendahara_form',['model'=>$model]);
    }

    public function store_bendahara(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'telp' => 'required',
            'status' => 'required'
        ]);

        $model = new User();
        $model->name = $request->name;
        $model->telp = $request->telp;
        $model->email = $request->email;
        $model->password = bcrypt($request->password);
        $model->type = 1;
        $model->status = $request->status;
        $model->save();


        return redirect()->route('bendahara.user.bendahara.manage');
    }

    public function edit_bendahara($id)
    {
        $model = User::findOrFail($id);
        return view('bendahara.user.bendahara_form',['model'=>$model,'update'=>true]);
    }

    public function update_bendahara(Request $request, $id)
    {
        $model = User::findOrFail($id);
        $validate = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'telp' => 'required',
            'status' => 'required'
        ];

        if($request->has('password')){
            $validate['password'] = 'required|min:6|confirmed';
            $model->password = bcrypt($request->password);
        }

        if($request->email == $model->email){
            $validate['email'] = 'required|email|max:255';
        }

        $this->validate($request, $validate);

        $model->name = $request->name;
        $model->telp = $request->telp;
        $model->email = $request->email;
        $model->status = $request->status;
        $model->save();


        return redirect()->route('bendahara.user.bendahara.manage');

    }


    public function kabag()
    {
        $model = User::where(['type'=>2])->orderBy('id','desc')->get();
        return view('bendahara.user.kabag',['model'=>$model]);
    }

    public function create_kabag()
    {
        $model = new User();
        return view('bendahara.user.kabag_form',['model'=>$model]);
    }

    public function store_kabag(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'telp' => 'required',
            'status' => 'required'
        ]);

        $model = new User();
        $model->name = $request->name;
        $model->telp = $request->telp;
        $model->email = $request->email;
        $model->password = bcrypt($request->password);
        $model->type = 2;
        $model->status = $request->status;
        $model->save();


        return redirect()->route('bendahara.user.kabag.manage');
    }

    public function edit_kabag($id)
    {
        $model = User::findOrFail($id);
        return view('bendahara.user.kabag_form',['model'=>$model,'update'=>true]);
    }

    public function update_kabag(Request $request, $id)
    {
        $model = User::findOrFail($id);
        $validate = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'telp' => 'required',
            'status' => 'required'
        ];

        if($request->has('password')){
            $validate['password'] = 'required|min:6|confirmed';
            $model->password = bcrypt($request->password);
        }

        if($request->email == $model->email){
            $validate['email'] = 'required|email|max:255';
        }

        $this->validate($request, $validate);

        $model->name = $request->name;
        $model->telp = $request->telp;
        $model->email = $request->email;
        $model->status = $request->status;
        $model->save();


        return redirect()->route('bendahara.user.kabag.manage');
    }

}
