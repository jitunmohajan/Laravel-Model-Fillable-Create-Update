<?php

namespace App\Services;

use App\Models\Product;

class ProductService{
    public function getAllProducts(){
        return Product::latest()->paginate(5);
    }
    public function store($name, $description, $image){
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('products'),$imageName);

        $product = new Product;
        $product->name = $name;
        $product->description = $description;
        $product->image = $imageName;
        $product->save();

        return $product;
    }
    public function getSingleProduct($id){
        return Product::where('id',$id)->first();
    }
    public function update($id, $name, $description, $image){
        
        $product = Product::where('id',$id)->first();

        if(isset($image)){
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('products'),$imageName);
            $product->image = $imageName;
        }

        $product->name = $name;
        $product->description = $description;
        $product->save();

        return $product;
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