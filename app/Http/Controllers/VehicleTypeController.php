<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use App\Http\Requests\VehicleType\Store;
use App\Http\Requests\VehicleType\Update;

class VehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $types = VehicleType::with('units')->latest()->paginate($perPage);

        return inertia('VehicleType/Index', [
            'types' => $types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $units = Unit::all();
        return inertia('VehicleType/Create', [
            'units' => $units
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request)
    {
        $data = $request->validated();
        VehicleType::create($data);

        return redirect(route('dashboard.vehicle_types.index'))->with([
            'message' => 'Data Successfully Created!'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VehicleType $vehicle_type)
    {
        $units = Unit::all();

        return inertia('VehicleType/Edit', [
            'vehicle_type' => $vehicle_type,
            'units' => $units,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request, VehicleType $vehicle_type)
    {
        $vehicle_type->update($request->all());

        return redirect(route('dashboard.vehicle_types.index'))->with([
            'message' => 'Data Successfully Updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VehicleType $vehicle_type)
    {
        $vehicle_type->delete();

        return redirect(route('dashboard.vehicle_types.index'))->with([
            'message' => 'data deleted!'
        ]);
    }
}
