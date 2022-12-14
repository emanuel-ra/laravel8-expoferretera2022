<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\prospects;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

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
    public function form_edit($id){

        $State = State::get();

        $prospects = prospects::find($id);

        //return Response()->json($prospects);
        
        return view('layout.prospects.edit',[
            'State'=>$State ,  
            'prospects'=>$prospects ,         
        ]);
    }
    public function download(){
        $response = Http::get('https://massivehome.com.mx/api/v1/public/expo/prospects');
     
        if($response->successful())
        {
            foreach($response->json() as $key)
            {
                $prospects = prospects::where('uuid',$key["uuid"])->get();

                

                if(!prospects::where('uuid',$key["uuid"])->exists()){
                    $prospects = new prospects;
                }else{
                    
                    $prospects = prospects::find($prospects[0]->id);
                }
                
                $prospects->name = $key["name"];
                $prospects->uuid = $key["uuid"];
                $prospects->phone = $key["phone"];
                $prospects->email = $key["email"];
                $prospects->state = $key["state"];
                $prospects->city = $key["city"];
                $prospects->address = $key["address"];
                $prospects->zip_code = $key["zip_code"];
                $prospects->comercial_business = $key["comercial_businnes"];
                $prospects->commentary = $key["commentary"];                
                $prospects->register_by = $key["register_by"];
                
                $prospects->save();
                
            }
        }
    
        return redirect()->route('prospects_list');    

    }
    public function store(Request $request){
     
        $this->validate($request, [               
            'name' => 'required|max:255',
            'phone' => 'required_without:email|unique:prospects' ,
            'email' => 'required_without:phone|unique:prospects' ,
        ]);   

        $prospects = new prospects;
        
        $prospects->name = $request->name;
        $prospects->uuid = Str::uuid()->toString();
        $prospects->phone = $request->phone;
        $prospects->email = $request->email;
        $prospects->state = $request->state;
        $prospects->city = $request->city;
        $prospects->address = $request->address;
        $prospects->zip_code = $request->zip_code;
        $prospects->comercial_business = $request->comercial_business;
        $prospects->commentary = $request->commentary;
        $prospects->register_by = $request->register_by;
        
        
        $prospects->save();

        return redirect()->route('prospects_list');
    }
    public function update($id, Request $request)
    {
        $this->validate($request, [               
            'name' => 'required|max:255',
            'phone' => 'required_without:email|unique:prospects,phone,'.$id ,
            'email' => 'required_without:phone|unique:prospects,email,'.$id ,
        ]);   

        $prospects =  prospects::find($id);
       
        if(!$prospects){
            return redirect()->route('prospects_list');
        }
        
        $prospects->name = $request->name;
        $prospects->uuid = Str::uuid()->toString();
        $prospects->phone = $request->phone;
        $prospects->email = $request->email;
        $prospects->state = $request->state;
        $prospects->city = $request->city;
        $prospects->address = $request->address;
        $prospects->zip_code = $request->zip_code;
        $prospects->comercial_business = $request->comercial_business;
        $prospects->commentary = $request->commentary;
        //$prospects->register_by = $request->register_by;
        
        
        $prospects->save();

        return redirect()->route('prospects_list');
    }
}
