<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class SpaController extends Controller
{
    public function index(){
//        dd('index');
        return view('spa');
    }
}
