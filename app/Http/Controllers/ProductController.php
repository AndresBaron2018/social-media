<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Brand;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('brand')->get();

        return view('seller.product.index', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $brands = Brand::all();
        return view('seller.product.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'size' => 'required',
            'brand_id' => 'required',
            'product_brand' => 'required',
            'shipment_date' => 'required'
        ]);

        Product::create($request->all());

        return redirect()->route('product.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('seller.product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $brands = Brand::all();
        return view('seller.product.edit', compact('product', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'size' => 'required',
            'brand_id' => 'required',
            'product_brand' => 'required',
            'shipment_date'
        ]);

        $product->update($request->all());

        return redirect()->route('product.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')
            ->with('success', 'Product deleted successfully');
    }
}
