<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::check()){
            if(Auth::user()->type == 1){
                return redirect()->route('bendahara.dashboard');
            }
            if(Auth::user()->type == 2){
                return redirect()->route('kabag.dashboard');
            }
        }else{
            return redirect()->route('login');
        }
    }
}
