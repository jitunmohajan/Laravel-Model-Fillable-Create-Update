@extends('layouts.app')

@section('main')
    {{-- Main Section Showing Container --}}
    <div class="container">
        <div class="row justify-content-center">
             <div class="col-sm-8"> 
                <div class="card mt-2">
                    <label>Name: <strong>{{ $product->name }}</strong></label>
                    <label>Description: <strong>{{ $product->description }}</strong></label>
                    <img src="/products/{{ $product->image }}" width="100%" alt="">
                </div>
             </div>
        </div>
    </div>  

@endsection