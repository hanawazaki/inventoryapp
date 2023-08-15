<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\Store;
use App\Http\Requests\Category\Update;
use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $categories = Category::with('type')->latest()->paginate($perPage);

        // dd($categories);
        // exit();
        return inertia('Categories/Index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        return inertia('Categories/Create', [
            'types' => $types
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
        Category::create($data);

        return redirect(route('dashboard.categories.index'))->with([
            'message' => 'Data Successfully Created!'
        ]);
    }

    public function edit(Category $category)
    {
        $types = Type::all();

        return inertia('Categories/Edit', [
            'types' => $types,
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request, Category $category)
    {
        // dd($request->all());
        $category->update($request->all());

        return redirect(route('dashboard.categories.index'))->with([
            'message' => 'Data Successfully Created!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect(route('dashboard.categories.index'))->with([
            'message' => 'data deleted!'
        ]);
    }
}
