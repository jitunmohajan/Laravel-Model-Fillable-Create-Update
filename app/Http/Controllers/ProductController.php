<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Models\Product;
use App\Http\Requests\StoreValidateRequest;
use App\Http\Requests\UpdateValidateRequest;
class ProductController extends Controller
{
    protected $productservice;
    public function __construct(ProductService $productservice) {
        $this->productservice = $productservice;
    }
    public function index(){
        $products = $this->productservice->getAllProducts();
        return view('products.index',['products'=>$products]);
    }
    public function create(){
        return view('products.create');
    }
    public function store(StoreValidateRequest $request){
        $this->productservice->store($request->name, $request->description, $request->image);
        return back()->withSuccess('Product Created!!!');
    }
    public function edit($id){
        $product = $this->productservice->getSingleProduct($id);
        return view('products.edit',[ 'product' => $product ]);
    }
    public function update(UpdateValidateRequest $request, $id){
        $this->productservice->update($id, $request->name, $request->description, $request->image);
        return back()->withSuccess('Product Updated!!!');
    }
    public function show($id){
        $product = $this->productservice->getSingleProduct($id);
        return view('products.show',[ 'product' => $product ]);
    }
    public function destroy($id){
        $product = $this->productservice->destroy($id);
        return back()->withSuccess('Product Deleted!!!');
    }
}
