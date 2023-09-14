<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarWorkshop;

class CarWorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carWorkshop = CarWorkshop::all();
        return view('workshops.index', [
            'carWorkshop' => $carWorkshop
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $carWorkshops = CarWorkshop::all();

        return view('workshops.create', [
            'carWorkshops' => $carWorkshops
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $carWorkshop = new CarWorkshop();
        $carWorkshop->name = $request->name;
        $carWorkshop->phone_number = $request->phone_number;
        $carWorkshop->address = $request->address;
        $carWorkshop->save();
        return redirect()
        ->route('workshop-index')
        ->with('success', 'New car$carWorkshop has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(CarWorkshop $carWorkshop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarWorkshop $carWorkshop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarWorkshop $carWorkshop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarWorkshop $carWorkshop)
    {
        //
    }
}
