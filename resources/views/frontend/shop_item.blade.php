@extends('layouts.frontend')
@section('content')
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="/images/products/{{$product->image}}" alt="..." /></div>
                    <div class="col-md-6">
                        <div class="small mb-1">CODENO: {{$product->code_no}}</div>
                        <h1 class="display-5 fw-bolder">{{$product->name}}</h1>
                        <div class="fs-5 mb-5">
                        <a href="{{route('products.category',$product->category_id)}}" class="badge text-bg-primary text-decoration-none">{{$product->category->name}}</a>
                        <br>
                            <!-- <span class="text-decoration-line-through">$45.00</span> -->
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
                        <p class="lead">{{$product->description}}</p>
                        <div class="d-flex">
                            <input class="form-control text-center me-3 qty" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                            <button class="btn btn-outline-dark flex-shrink-0 addToCart" type="button" data-id="{{$product->id}}" data-name="{{$product->name}}" data-code_no="{{$product->code_no}}" data-price="{{$product->price}}" data-discount="{{$product->discount}}">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Related items section-->
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach($products as $product)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="images/products/{{$product->image}}" alt="..." />
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
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </section>
@endsection