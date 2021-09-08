<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Brand;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::All();

        return view('seller.brand.index', compact('brands'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('seller.brand.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Brand::create($request->all());

        return redirect()->route('brand.index')
            ->with('success', 'Brand created successfully.');
    }

    public function show(Brand $brand)
    {
        return view('seller.brand.show', compact('brand'));
    }

    public function edit(Brand $brand)
    {
        return view('seller.brand.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $brand->update($request->all());

        return redirect()->route('brand.index')
            ->with('success', 'Brand updated successfully');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('brand.index')
            ->with('success', 'Brand deleted successfully');
    }
}
