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
        $items = \App\Model\Item::where('name','LIKE',$request->search.'%')->get();
        if($items->isNotEmpty()){
                return response()->json([
                'is_success'=>true,
                      'items'=>$items
                ]);
        }else{
            return response()->json([
                'is_success'=>false,
            ]);
        }
    }
    public function store(Request $request){
//        dd($request->all());
    }
}
