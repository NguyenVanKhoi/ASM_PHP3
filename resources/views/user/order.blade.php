@extends('layout.user')
@section('content')
    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Checkout</h1>
                    </div>
                </div>
                <div class="col-lg-7">

                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <div class="untree_co-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-5 mb-md-0">
                    <h2 class="h3 mb-3 text-black">Billing Details</h2>
                    <div class="p-3 p-lg-5 border bg-white">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_fname" class="text-black"> Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_fname" name="c_fname">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_address" name="c_address"
                                    placeholder="Street address">
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-md-6">
                                <label for="c_email_address" class="text-black">Email Address <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_email_address" name="c_email_address">
                            </div>
                            <div class="col-md-6">
                                <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_phone" name="c_phone"
                                    placeholder="Phone Number">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="c_order_notes" class="text-black">Order Notes</label>
                            <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control"
                                placeholder="Write your notes here..."></textarea>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <h2 class="h3 mb-3 text-black">Your Order</h2>
                            <div class="p-3 p-lg-5 border bg-white">
                                <table class="table site-block-order-table mb-5">
                                    <thead>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalPrice = 0;
                                        @endphp
                                        @foreach ($cart as $item)
                                            @php
                                                $total = $item['price'] * $item['quantity'];
                                                $totalPrice += $total;
                                            @endphp
                                            <tr>
                                                <td>{{ $item['product_name'] }}</td>
                                                <td>{{ $item['quantity'] }}</td>
                                                <td>{{ number_format($totalPrice, 0, ',', '.') }}VND</td>
                                            </tr>
                                        @endforeach
                                        <h3>Total Price : {{ $totalPrice }}</h3>
                                    </tbody>
                                </table>
                                <div class="form-group">
                                    <a href="" class="btn btn-black btn-lg py-3 btn-block" ">Place Order</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- </form> -->
                            </div>
                        </div>
@endsection
