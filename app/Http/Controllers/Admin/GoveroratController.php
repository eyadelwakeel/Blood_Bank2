<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GovernoratesRequest;
use Illuminate\Http\Request;
use App\Models\Governorate;

class GoveroratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $governorates = Governorate::withCount('cities')->paginate(10);
        return view('admin.governorates.index', compact('governorates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $governorates = Governorate::all();
        return view('admin.governorates.create', compact('governorates'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GovernoratesRequest $request)
    {
        //
        Governorate::create($request->validated());
        return redirect()->route('admin.governorates.index')
        ->with('success', 'Governorate created successfully.');
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
        $governorate = Governorate::findOrFail($id);
        return view('admin.governorates.edit', compact('governorate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GovernoratesRequest $request, string $id)
    {
        //
        $governorate = Governorate::findOrFail($id);
        $governorate->update($request->validated());
        return redirect()->route('admin.governorates.index')
        ->with('success', 'Governorate updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $governorate = Governorate::findOrFail($id);
        $governorate->delete();
        return redirect()->route('admin.governorates.index')
        ->with('success', 'Governorate deleted successfully.');
    }
}
