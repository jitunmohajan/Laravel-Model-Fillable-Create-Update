<?php

namespace App\Services;

use App\Models\Product;

class ProductService{
    public function getAllProducts(){
        return Product::latest()->paginate(5);
    }
    public function setImage($image){
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('products'),$imageName);
        return $imageName;
    }
    public function getSingleProduct($id){
        return Product::where('id',$id)->first();
    }
    public function destroy($id){
        $product = Product::where('id',$id)->first();
        if($product){
            $product->delete();
            return true;
        }
        return false;
    }
}