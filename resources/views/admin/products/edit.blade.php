@extends('layouts.admin')
@section('content')
    <div class="container-fluid px-4">
        <div class="my-3">
            <h3 class="my-4 d-inline">Items Create</h3>
            <a href="{{route('backend.products.index')}}" class="btn btn-danger float-end">Cancel</a>
        </div>

        <div class="card mb-4">
            <div class="card-body py-5">
                <div class="row">
                    <div class="offset-md-1 col-md-10">
                        <form action="{{route('backend.products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{method_field('put')}}
                            <div class="mb-3">
                                <label for="code_no" class="form-label">Code No</label>
                                <input type="text" class="form-control {{ $errors->has('code_no') ? 'is-invalid' : '' }}" name="code_no" id="code_no" value="{{$product->code_no}}">
                                @if($errors->has('code_no'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('code_no')}}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" value="{{$product->name}}">

                                @if($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('name')}}
                                    </div>
                                @endif

                            </div>
                            <div class="mb-3">
                                
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="old_image-tab" data-bs-toggle="tab" data-bs-target="#old_image-tab-pane" type="button" role="tab" aria-controls="old_image-tab-pane" aria-selected="true">Image</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">New Image</button>
                                    </li>
                                    
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="old_image-tab-pane" role="tabpanel" aria-labelledby="old_image-tab" tabindex="0">
                                        <img src="/images/products/{{$product->image}}" class="my-3" alt="" width="200" height="200">
                                        <input type="hidden" name="old_image" id="" value="{{$product->image}}">
                                    </div>

                                    <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                                        <input type="file" accept="image/*" class="form-control my-3" name="image" id="image" >

                                    </div>
                                </div>

                                
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" id="price" value="{{$product->price}}">
                                @if($errors->has('price'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('price')}}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="discount" class="form-label">Discount</label>
                                <input type="text" class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}" name="discount" id="discount" value="{{$product->discount}}">
                                @if($errors->has('discount'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('discount')}}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="inStock" class="form-label">InStock</label>
                                <select class="form-select" name="in_stock">
                                    <option value="1" {{$product->in_stock == 1 ? 'selected' : ''}}>Yes</option>
                                    <option value="0" {{$product->in_stock == 0 ? 'selected' : ''}}>No</option>
                                </select>
                                
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select {{ $errors->has('category_id') ? 'is-invalid' : '' }}" name="category_id">
                                    <option value="">Choose Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('category_id'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('category_id')}}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}">{{$product->description}}</textarea>
                                @if($errors->has('description'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('description')}}
                                    </div>
                                @endif
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection