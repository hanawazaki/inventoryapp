<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\Product\Store;
use App\Http\Requests\Product\Update;
use App\Models\Type;
use App\Models\Variant;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $products = Product::with(['variant', 'type'])->latest()->paginate($perPage);
        // $products = Variant::with('product')->latest()->paginate($perPage);


        // dd($products);
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
        $types = Type::all();
        return inertia('Products/Create', [
            'types' =>  $types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request)
    {
        $data = $request->validated();
        $product = Product::create($data);

        if ($product) {
            $variantsData = $request->input('variants', []);

            foreach ($variantsData as $variantData) {
                Variant::create([
                    'product_id' => $product->id,
                    'variant' => $variantData['variant'],
                    'price' => $variantData['price'],
                ]);
            }
        }

        return redirect(route('dashboard.products.index'))->with([
            'message' => 'Data Successfully Created!'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $types = Type::all();
        $variants = Variant::select('price', 'variant')->where('product_id', $product->id)->get();

        return inertia('Products/Edit', [
            'product' => $product,
            'variants' => $variants,
            'types' =>  $types
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request, Product $product)
    {
        // dd($request->all());
        // exit();

        $product->update($request->validated());

        // if ($update_product) {
        $variants = $request->variants;

        // dd($variants);
        // exit();


        // }

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
