<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    public function index(){
        return view('frontEnd.home.home',[
            'products'=>Product::where('status',1)->orderby('id','desc')->skip(3)->take(3)->get()
        ]);
    }
    public function productDetails($id){
        return view('frontEnd.product.product-details',[
            'product'=>Product::find($id)
        ]);
    }
}
