@extends('layout.user')
@section('content')
    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Cart</h1>
                    </div>
                </div>
                <div class="col-lg-7">

                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->



    <div class="untree_co-section before-footer-section">
        <div class="container">
            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
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
                                        <td class="product-thumbnail">
                                            <img src="{{ Storage::url($item['image']) }}" alt="Image" class="img-fluid">
                                        </td>
                                        <td class="product-name">
                                            <h2 class="h5 text-black">{{ $item['product_name'] }}</h2>
                                        </td>
                                        <td>{{ number_format($item['price'], 0, ',', '.') }}VND</td>
                                        <td>
                                            <form action="{{ route('user.updateCart', $item['id']) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                {{-- <input type="hidden" name="cart_item_id" value="{{ $item['id'] }}"> --}}
                                                <input type="number" name="quantity"
                                                    class="form-control text-center quantity-amount"
                                                    value="{{ $item['quantity'] }}" min="1">
                                                <button type="submit" class="form-control">Cập nhập</button>
                                            </form>
                                        </td>
                                        <td>{{ number_format($total, 0, ',', '.') }}VND</td>
                                        <td>
                                            <form action="{{ route('user.removeOne', $item['id']) }}" method="get">
                                                @csrf
                                                <button class="btn btn-black btn-sm">X</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-6">
                            <div class="col-md-6 mb-3">
                                <a href="{{ route('user.home') }}" class="btn btn-outline-black btn-sm btn-block">Continue
                                    Shopping</a>
                            </div>
                            <form action="{{ route('user.deleteCart') }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-black btn-sm btn-block mt-3">Clear
                                    Cart</button>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="text-black h4" for="coupon">Coupon</label>
                            <p>Enter your coupon code if you have one.</p>
                        </div>
                        <div class="col-md-8 mb-3 mb-md-0">
                            <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-black">Apply Coupon</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">{{ number_format($totalPrice, 0, ',', '.') }}VND</strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-black btn-lg py-3 btn-block"
                                        onclick="window.location='checkout.html'">Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
