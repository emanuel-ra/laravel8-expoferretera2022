<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use App\Models\Products;
use App\Models\products_gallery;
use App\Models\products_data_sheet_description;
use App\Models\products_data_sheet_content;
use App\Models\products_data_sheet_specifications;
use App\Models\products_data_sheet_sub_specifications;

class ProductsController extends Controller
{
    public function view($id){
        
        $item = Products::find($id); 
        $gallery = products_gallery::where('product_id',$id)->get();
        $sheet_description = products_data_sheet_description::where('product_id',$id)->get();
        $sheet_content =  products_data_sheet_content::where('product_id',$id)->get();
        $sheet_specifications = products_data_sheet_specifications::where('product_id',$id)
            ->with(['sub'=> function ($q) {
                $q->orderBy('order_number', "asc");
            }])
            ->get();
        
        //return Response()->json($gallery);
        return view('layout.products.view', [
            'item' => $item ,
            'gallery' => $gallery ,
            'sheet_description' => $sheet_description ,
            'sheet_content' => $sheet_content ,
            'sheet_specifications' => $sheet_specifications ,           
        ]);
    }    
}
