<?php

namespace App\Http\Controllers\Web;

use App\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AutoCompleteController extends Controller
{
    public function index(){
        return view('auto_complete');
    }
    public function search(Request $request)
    {
//        return response()->json($request->all());
        $items = \App\Model\Item::where('name','LIKE',$request->search.'%')->get();
//        dd($items);
        return response()->json($items);
    }
}
