@extends('layouts.admin')
@section('content')

    <div class="container-fluid px-4">
        <div class="my-5">
            <h3 class="my-4 d-inline">Order Detail</h3>
            <a href="{{route('backend.order.index')}}" class="btn btn-sm btn-success float-end">Back</a>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h3 class="text-center my-3">Zay Barn</h3>

                <div class="row">
                    <div class="col-md-6">
                        <p>Name - Hein Min Htet</p>
                        <p>Phone - 09-987687768</p>
                        <p>voucherNo - 1123211</p>
                    </div>
                    <div class="col-md-6 text-end">
                        <p>Date - Sep 4. 2024</p>
                        <p>Address - Yangon</p>
                        <p>Payment Method - KBZPay </p>
                    </div>
                </div>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Item Name</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Qty</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr>
                            <td>1</td>
                            <td>T-Shirt</td>
                            <td>25000 Ks</td>
                            <td>5%</td>
                            <td>5</td>
                            <td>1875 Ks</td>
                        </tr>
                           
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-end">Total</td>
                            <td>1875 Ks</td>
                        </tr>
                    </tfoot>
                </table>

                <div class="row">
                    <div class="offset-md-4 col-md-4">
                        <img src="" class="img-fluid" alt="">
                    </div>

                    <form class="d-grid gap-2 my-5" action="" method="post">
                        @csrf
                        {{method_field('put')}}
                       
                        <button class="btn btn-primary">Order Accept</button>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection   
    