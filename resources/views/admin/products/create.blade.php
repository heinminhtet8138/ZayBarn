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
                        <form action="{{route('backend.products.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="code_no" class="form-label">Code No</label>
                                <input type="text" class="form-control {{ $errors->has('code_no') ? 'is-invalid' : '' }}" name="code_no" id="code_no" value="{{old('code_no')}}">
                                @if($errors->has('code_no'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('code_no')}}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" value="{{old('name')}}">

                                @if($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('name')}}
                                    </div>
                                @endif

                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" accept="image/*" class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" name="image" id="image" value="{{old('image')}}">
                                @if($errors->has('image'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('image')}}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" id="price" value="{{old('price')}}">
                                @if($errors->has('price'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('price')}}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="discount" class="form-label">Discount</label>
                                <input type="text" class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}" name="discount" id="discount" value="{{old('discount')}}">
                                @if($errors->has('discount'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('discount')}}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="inStock" class="form-label">InStock</label>
                                <select class="form-select" name="in_stock">
                                    <option value="1" selected>Yes</option>
                                    <option value="0">No</option>
                                </select>
                                
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select {{ $errors->has('category_id') ? 'is-invalid' : '' }}" name="category_id">
                                    <option value="">Choose Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
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
                                <textarea name="description" id="description" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}">{{old('description')}}</textarea>
                                @if($errors->has('description'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('description')}}
                                    </div>
                                @endif
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection