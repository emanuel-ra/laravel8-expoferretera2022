<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\quote;
use App\Models\quote_detail;

class QuoteController extends Controller
{
    public function get(){
        $data = quote::with('prospect')->get();
        //return Response()->json($data);
        return view('layout.quote.list',['data'=>$data]);
    }
    public function save(Request $request){

        $this->validate($request, [               
            'prospect_id' => 'required',
        ]);
        
        $quote = new quote;      

        $cart = \Cart::getContent();

        $type_price = session('type_price', 1);

        $total = 0;
        foreach($cart as $row)
        {            
            if($type_price==1){ $total += $row->price*$row->quantity;; }
            if($type_price==2){ $total += $row->associatedModel->price2*$row->quantity; }
            if($type_price==3){ $total += $row->associatedModel->price3*$row->quantity; }
        }

        $quote->prospect_id = $request->prospect_id;
        $quote->commentary = $request->commentary;
        $quote->attended_by = $request->attended_by;
        $quote->type_price = $type_price; 
        $quote->total = $total;

        $quote->save();
        
        foreach($cart as $row)
        {
            $quote_detail = new quote_detail;
            
            $price  = $row->price;
            if($type_price==2){
                $price  = $row->associatedModel->price2;
            }
            if($type_price==3){
                $price  = $row->associatedModel->price3;
            }

            $quote_detail->quote_id = $quote->id;
            $quote_detail->product_id = $row->associatedModel->id;
            $quote_detail->price = $price;
            $quote_detail->quantity = $row->quantity;

            $quote_detail->save();
            
        }

        \Cart::clear();

        return redirect()->route('cart');

    }
}
