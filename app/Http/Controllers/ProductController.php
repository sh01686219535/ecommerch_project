<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use function Symfony\Component\String\b;

class ProductController extends Controller
{
    public $product,$image,$imageName,$directory,$imageUrl;
    public function addProduct(){
        return view('admin.product.add-product');
    }
    public function manageProduct(){
        return view('admin.product.manage-product',[
            'products'=>Product::all()
        ]);
    }
    public function saveProduct(Request $request){
        $this->product=new Product();
        $this->product->product_name=$request->product_name;
        $this->product->category_name=$request->category_name;
        $this->product->brand_name=$request->brand_name;
        $this->product->price=$request->price;
        $this->product->description=$request->description;
        if ($request->file('image')){
            $this->product->image=$this->saveImage($request);
        }
        $this->product->save();
        return back();
    }
    private function saveImage($request){
        $this->image=$request->file('image');
        $this->imageName=rand().'.'.$this->image->getClientOriginalExtension();
        $this->directory='AdminAsset/product-image/';
        $this->imageUrl=$this->directory.$this->imageName;
        $this->image->move($this->directory,$this->imageName);
        return $this->imageUrl;
    }
    public function status($id){
        $this->product=Product::find($id);
        if ($this->product->status==1){
            $this->product->status=0;
            $this->product->save();
            return back();
        }else{
            $this->product->status=1;
            $this->product->save();
            return back();
        }
    }
    public function editProduct($id){
        return view('admin.product.edit-product',[
            'product'=>Product::find($id)
        ]);
    }
    public function updateProduct(Request $request){
        $this->product=Product::find($request->product_id);
        $this->product->product_name=$request->product_name;
        $this->product->category_name=$request->category_name;
        $this->product->brand_name=$request->brand_name;
        $this->product->price=$request->price;
        $this->product->description=$request->description;
        if ($request->file('image')){
            unlink($this->product->image);
            $this->product->image=$this->saveImage($request);
        }
        $this->product->save();
        return redirect('/manage-product');
    }
    public function deleteProduct(Request $request){
        $this->product=Product::find($request->product_id);
        if ($this->product->image){
            unlink($this->product->image);
        }
        $this->product->delete();
        return back();
    }
}
