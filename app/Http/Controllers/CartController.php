<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = Session::get('cart', []);
        // dd($cart);
        return view('user.cart', compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            Session::put('cart', $cart);
        }
        return redirect()->route('user.cart')->with('success', 'Giỏ hàng đã đc cập nhập');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function addToCart(Request $request)
    {
        $cart = Session::get('cart', []);

        $id = $request->id;
        $product_name = $request->product_name;
        $price = $request->price;
        $quantity = $request->quantity;
        $image = $request->image;
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                'id' => $id,
                'product_name' => $product_name,
                'price' => $price,
                'quantity' => $quantity,
                'image' => $image,
            ];
        }
        Session::put('cart', $cart);
        return redirect()->route('user.home')->with('success', 'Sản phẩm được thêm thành công');
    }

    // xóa phần tử trong giỏ hàng
    public function deleteCart()
    {
        Session::forget('cart');
        return redirect()->route('user.home')->with('success', 'Giỏ hàng đã được xóa sạch');
    }
    public function removeOne($id)
    {
        $cart = Session::get('cart', []);
        unset($cart[$id]);
        Session::put('cart', $cart);
        return redirect()->route('user.cart')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng');
    }
}