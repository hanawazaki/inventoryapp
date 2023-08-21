<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Product\Store;
use App\Http\Requests\Product\Update;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $products = Product::with('category')->latest()->paginate($perPage);

        // dd($categories);
        // exit();
        return inertia('Products/Index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return inertia('Products/Create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request)
    {
        $data = $request->validated();
        // dd($data);
        // exit();
        Product::create($data);

        return redirect(route('dashboard.products.index'))->with([
            'message' => 'Data Successfully Created!'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return inertia('Products/Edit', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request, Product $product)
    {
        // dd($request->all());
        $product->update($request->all());

        return redirect(route('dashboard.products.index'))->with([
            'message' => 'Data Successfully Created!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect(route('dashboard.products.index'))->with([
            'message' => 'data deleted!'
        ]);
    }
}
