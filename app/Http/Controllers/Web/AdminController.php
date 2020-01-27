<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\controller;

class AdminController extends Controller
{
     public function index(){
         return view('Admin.index');
     }
     public function create(){
         return view('Admin.create');
     }
}
