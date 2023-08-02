<?php

namespace App\Http\Controllers;

use App\Http\Requests\Unit\Store;
use App\Http\Requests\Unit\Update;
use App\Http\Requests\UnitRequest;
use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Mail\Message;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $units = Unit::latest()->paginate($perPage);

        // dd($units);
        return inertia('Units/Index', [
            'units' => $units
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Units/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request)
    {
        $data = $request->validated();
        Unit::create($data);

        return redirect(route('dashboard.units.index'))->with([
            'message' => 'Data Successfully Created!'
        ]);
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
    public function edit(Unit $unit)
    {
        return inertia('Units/Edit', [
            'unit' => $unit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request, Unit $unit)
    {

        $unit->update($request->all());

        return redirect(route('dashboard.units.index'))->with([
            'message' => 'Data Successfully Created!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();

        return redirect(route('dashboard.units.index'))->with([
            'message' => 'data deleted!'
        ]);
    }
}
