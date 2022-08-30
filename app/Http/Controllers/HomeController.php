<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Facade\FlareClient\Http\Response;

class HomeController extends Controller
{
    public function index(Request $request){

        //$items = Products::where('status_id',1)->get();      
        $query = Products::query();
        
        $query->where('status_id',1);
        if($request->keyword){
            $query->where('name','like', '%'.$request->keyword.'%')->orWhere('code', 'LIKE', '%'.$request->keyword.'%');
                 
        }
       
        $items = $query->get();

        return view('layout.home.products', ['items' => $items]);
    }
}
