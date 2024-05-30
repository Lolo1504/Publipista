<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Models\pista;

class HomeController extends Controller
{
    public function index(){
        
        $user=auth::user();
        $hoy= date("Y-m-d");
        $pistas=pista::all();
      
        return view('publipistas.home',compact('user','pistas','hoy'));
    }
}
