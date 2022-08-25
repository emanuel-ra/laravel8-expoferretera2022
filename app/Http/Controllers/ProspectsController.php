<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\prospects;

class ProspectsController extends Controller
{
    public function index(){       
        $prospects = prospects::orderby('id','desc')->get();
        return view('layout.prospects.list',[
            'prospects'=>$prospects ,
        ]);
    }
    public function form_add(){

        $State = State::get();
       

        return view('layout.prospects.add',[
            'State'=>$State ,         
        ]);
    }
    public function store(Request $request){
     
        $this->validate($request, [               
            'name' => 'required|max:255',
            'phone' => 'required_without:email|unique:prospects' ,
            'email' => 'required_without:phone|unique:prospects' ,
        ]);   

        $prospects = new prospects;

        
        $prospects->name = $request->name;
        $prospects->phone = $request->phone;
        $prospects->email = $request->email;
        $prospects->state = $request->state;
        $prospects->city = $request->city;
        $prospects->address = $request->address;
        $prospects->zip_code = $request->zip_code;
        $prospects->comercial_business = $request->comercial_business;
        $prospects->commentary = $request->commentary;
        
        $prospects->save();

        return redirect()->route('prospects_list');
    }
}
