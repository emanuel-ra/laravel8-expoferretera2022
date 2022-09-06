<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Illuminate\Support\Facades\Crypt;
use App\Models\prospects;

class CartController extends Controller
{    
    private $userID;
    public function __construct()
    {
        $this->userID = 1;
    }
    public function add($product_id){

        $product = Products::find((int)$product_id);
        
        if($product!=null){
            \Cart::add(array(
                'id' => md5($product->id),
                'name' => $product->name,
                'price' => $product->price1,                     
                'quantity' => 1 ,
                'attributes' => array(),
                'associatedModel' => $product
            ));
        }      

        return back()->withInput();

    }
    public function minus($id){
        \Cart::update($id, array(
            'quantity' => -1, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
        ));

        return back()->withInput();
    }
    public function plus($id){
        \Cart::update($id, array(
            'quantity' => 1, // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
        ));

        return back()->withInput();
    }
    public function remove($id){
        \Cart::remove($id);
        return back()->withInput();
    }
    public function update(Request $request){

        $this->validate($request, [               
            'id' => 'required',
            'qty' => 'required|numeric',
            
        ]);   

        \Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->qty
            ), // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
        ));

        return back()->withInput();

    }
    public function get(){

        $prospects = prospects::orderby('name','desc')->get();

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

       

        $total = $total-$total_descuento;

        return view('layout.quote.cart', ['cart' => $cart,'prospects' => $prospects,'type_price'=>$type_price, 'total'=>$total, 'total_descuento'=>$total_descuento, 'porcentage_descuento'=>$porcentage_descuento]);
    }
    public function set_price(Request $request)
    {
        $this->validate($request, [               
            'radio_type_price' => 'required'            
        ]);

        session(['type_price' => $request->radio_type_price]);

        return back()->withInput();
    }
    public function clear($product_id)
    {

    }
}
