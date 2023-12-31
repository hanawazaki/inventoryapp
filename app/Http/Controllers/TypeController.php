<?php

namespace App\Http\Controllers;

use App\Http\Requests\Type\Store;
use App\Http\Requests\Type\Update;
use App\Models\Type;
use App\Models\Unit;
use App\Models\VehicleType;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $types = Type::with('vehicletype')->latest()->paginate($perPage);

        return inertia('Types/Index', [
            'types' => $types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicle_type = VehicleType::all();
        return inertia('Types/Create', [
            'vehicle_type' => $vehicle_type
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request)
    {
        $data = $request->validated();
        Type::create($data);

        return redirect(route('dashboard.types.index'))->with([
            'message' => 'Data Successfully Created!'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        $vehicle_type = VehicleType::all();

        return inertia('Types/Edit', [
            'types' => $type,
            'vehicle_type' => $vehicle_type,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request, Type $type)
    {
        $type->update($request->all());

        return redirect(route('dashboard.types.index'))->with([
            'message' => 'Data Successfully Updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect(route('dashboard.types.index'))->with([
            'message' => 'data deleted!'
        ]);
    }
}
