@extends('layouts.admin')
@section('content')
    <div class="container my-5 my-5">
        <div class="my-5">
            <h3 class="my-4 d-inline">Orders List</h3>
            <a href="{{route('backend.orders.complete')}}" class="btn btn-success float-end">Order Complete List</a>
            <a href="{{route('backend.orders.accept')}}" class="btn btn-primary float-end mx-3">Order Accept List</a>
            <a href="{{route('backend.order.index')}}" class="btn btn-danger float-end">Order Pending List</a>
        </div>

        <div class="card">
            <div class="card-header">
                <p>Products List</p>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Voucher No</th>
                            <th>User Name</th>
                            <th>Status</th>
                            <th>Payment Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderList as $order)
                            <tr>
                                <td>{{$order->voucher_no}}</td>
                                <td>{{$order->user_id}}</td>
                                <td>{{$order->status}}</td>
                                <td>{{$order->payment_id}}</td>
                                <td>
                                    <a href="" class="btn btn-sm btn-primary">View Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
