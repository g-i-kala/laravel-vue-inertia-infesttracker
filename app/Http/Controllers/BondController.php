<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBondRequest;
use App\Http\Requests\UpdateBondRequest;
use App\Models\Bond;

class BondController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBondRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Bond $bond)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bond $bond)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBondRequest $request, Bond $bond)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bond $bond)
    {
        //
    }
}
