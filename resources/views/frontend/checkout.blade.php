@extends('layouts.frontend')
@section('content')

    <section class="container py-5">
        <h3 class="text-center py-5">My Shopping Cart</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Code No</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Qty</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody id="itemTbody">
                    
                </tbody>
            </table>
        </div>

        <div class="d-grid gap-2">
            <form id="paymentForm" class="row" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="payment_slip" class="form-label">Payment Slip</label>
                    <input type="file" accept="image/*" class="form-control" name="payment_slip" id="payment_slip">
                </div>
                <div class="col-md-6">
                    <label for="paymentMethod" class="form-label">Payment Method</label>
                    <select name="payment_id" id="paymentMethod" class="form-select">
                        <option value="">Choose Payment Method</option>
                        @foreach($payments as $payment)
                            <option value="{{$payment->id}}">{{$payment->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary my-5" id="orderNow">Order Now</button>
            </form>
        </div>

    </section>

    <!-- Success Modal -->
    <div class="modal fade" id="orderSuccessModal" tabindex="-1" aria-labelledby="orderSuccessModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header bg-success text-light">
                <h1 class="modal-title fs-5" id="orderSuccessModalLabel">Order success</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h1 class="text-success fs-1"><i class="bi bi-check-circle"></i></h1>
                <p>Your order is successful</p>
            </div>
            <div class="modal-footer">
                <a href="/" class="btn btn-success">Ok</a>
            </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // $('#orderNow').click(function(){
            //     let shopString = localStorage.getItem('shops');
            //     if(shopString){
            //         // $.post("url",{data:data},callbackfunction)
            //         $.post("{{route('frontend.orderNow')}}",{data:shopString},function(response){
            //             console.log(response);
            //         })
            //     }
            // })

            $('#paymentForm').on('submit',function(e){
                e.preventDefault();
                let shopString = localStorage.getItem('shops');
                let formData = new FormData(this);
                formData.append('orderItems',shopString);
                // console.log(formData);
                $.ajax({
                    type:'POST',
                    url: "{{route('frontend.orderNow')}}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response){
                        // console.log(response);
                        if(response){
                            $('#orderSuccessModal').modal('show');
                            localStorage.removeItem('shops');
                        }
                        
                    }
                })
            })

        })
    </script>
@endsection