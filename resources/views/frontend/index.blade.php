@extends('layouts.frontend')  
@section('content')
<!-- @php 
    var_dump($products);
@endphp -->
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach($products as $product)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Product image-->
                                <img class="card-img-top" src="/images/products/{{$product->image}}" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{$product->name}}</h5>
                                        <!-- Product price-->
                                         @if($product->discount == 0)
                                            <span>{{$product->price}}</span>
                                         @else 
                                            <span class="text-decoration-line-through">{{$product->price}} MMK</span>
                                            <br>
                                            <span>
                                                {{$product->price - ($product->price * $product->discount/100)}} MMK
                                            </span>
                                         @endif 
                                         
                                        
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a class="btn btn-outline-dark mt-auto" href="{{route('frontend.shop_item',$product->id)}}">View</a>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="hidden" value="1" class="qty" name="" id="">
                                            <button class="btn btn-dark mt-auto addToCart" data-id="{{$product->id}}" data-name="{{$product->name}}" data-code_no="{{$product->code_no}}" data-price="{{$product->price}}" data-discount="{{$product->discount}}">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
@endsection
        