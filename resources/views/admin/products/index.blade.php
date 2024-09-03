@extends('layouts.admin')
@section('content')
    <div class="container my-5 my-5">
        <div class="my-5">
            <h3 class="my-4 d-inline">Products</h3>
            <a href="{{route('backend.products.create')}}" class="btn btn-primary float-end">Add Product</a>
        </div>

        <div class="card">
            <div class="card-header">
                <p>Products List</p>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Code No</th>
                            <th>Products Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>InStock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="product_tbody">
                        @foreach($products as $product) 
                            <tr>
                                <td>{{$product->code_no}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->discount}}%</td>
                                <td>{{$product->in_stock}}</td>
                                <td>
                                    <a class="btn btn-sm btn-warning" href="{{route('backend.products.edit',$product->id)}}">Edit</a>
                                    <button class="btn btn-sm btn-danger delete" data-id="{{$product->id}}">Delete</button>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $products->links() }}
            </div>
        </div>
    </div>


    <!--Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-danger text-light">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Modal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3>Are you sure delete?</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <form action="" method="post" id="delete_form">
                    @csrf
                    {{method_field('delete')}}
                    <button type="submit" class="btn btn-danger">Yes</button>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#product_tbody').on('click','.delete',function(){
                let id = $(this).data('id');
                $('#delete_form').prop('action','products/'+id);
                $('#deleteModal').modal('show');
            })
        })
    </script>
@endsection