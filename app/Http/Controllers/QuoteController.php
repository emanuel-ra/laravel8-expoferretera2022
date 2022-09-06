<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\quote;
use App\Models\quote_detail;
use Barryvdh\DomPDF\Facade\Pdf;

class QuoteController extends Controller
{
    public function get(){
        $data = quote::with('prospect')->get();
        //return Response()->json($data);
        return view('layout.quote.list',['data'=>$data]);
    }
    public function create_pdf($id){   

        $data = quote::where('id',$id)->with('prospect')->with('detail')->get();
        //$items = quote_detail::where('id',$id)->with('product')->get();
        
        //return Response()->json($data);

        view()->share('quotes.pdf',$data);

        $pdf = Pdf::loadView('layout.PDF.quote', ['data'=>$data]);
        return $pdf->stream();
        //return $pdf->download('quotes.pdf');
    }
    public function save(Request $request){

        $this->validate($request, [               
            'prospect_id' => 'required' ,
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
            if($type_price==4){ $total += $row->associatedModel->price4*$row->quantity; }
        }

        $porcentage_descuento = 0; 
        $total_descuento = 0;
        if( ($type_price==3) || ($type_price==4) )
        {
            if($total>=40000 && $total<=49999){ $porcentage_descuento = 1; }
            if($total>=50000 && $total<=99999){ $porcentage_descuento = 2; }
            if($total>=100000 && $total<=199999){ $porcentage_descuento = 3; }
            if($total>=200000 && $total<=299999){ $porcentage_descuento = 4; }
            if($total>=300000 && $total<=499999){ $porcentage_descuento = 5; }
            if($total>=500000){ $porcentage_descuento = 7; }
            $total_descuento = $total*$porcentage_descuento/100;
        }

        $quote->prospect_id = $request->prospect_id;
        $quote->commentary = $request->commentary;
        $quote->attended_by = $request->attended_by;
        $quote->type_price = $type_price; 
        $quote->total = $total;
        $quote->discount_percentage = $porcentage_descuento;
        $quote->total_discount = $total_descuento;

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
