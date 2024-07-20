<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    // home page
    public function home()
    {
        $data = Product::query()->get();
        // dd($data);
        return view('user.index', compact('data'));
    }

    //danh mục sản phẩm
    public function categoryProduct($id)
    {
        $data = Product::query()->where('category_id', '=', $id)->with('category')->get();
        // dd($data);
        return view('user.category', compact('data'));
    }

    // chi tiết sản phẩm
    public function detailProduct($id)
    {
        $data = Product::query()->where('id', '=', $id)->first();
        return view('user.detail', compact('data'));
    }
}
