<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Governorate;

class CityController extends Controller
{
   
    public function index()
    {
        $cities = City::paginate(10);
        return view('admin.cities.index', compact('cities'));
    }
    public function create()
    {
        $governorates = Governorate::all();
        return view('admin.cities.create', compact('governorates'));
    }
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'governorate_id' => 'required|exists:governorates,id',
        ]);

        City::create($request->all());
        return redirect()->route('admin.cities.index')
            ->with('success', 'City created successfully.');
    }
    public function show($id)   
    {

         return view('admin.cities.show');   
    }
    public function edit($id)
    {
        $city = City::findOrFail($id);
        $governorates = Governorate::all();
        return view('admin.cities.edit', compact('city', 'governorates'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'governorate_id' => 'required|exists:governorates,id',
        ]);

        $city = City::findOrFail($id);
        $city->update($request->all());

        return redirect()->route('admin.cities.index')
            ->with('success', 'City updated successfully.');
    }
    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        return redirect()->route('admin.cities.index')
            ->with('success', 'City deleted successfully.');
    }
}
