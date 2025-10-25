<?php

namespace App\Http\Controllers;

use App\Models\ETF;
use Inertia\Inertia;
use App\Models\Wallet;
use App\Http\Requests\StoreETFRequest;
use App\Http\Requests\UpdateETFRequest;

class ETFController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('wallet/Etf');
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
    public function store(StoreETFRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ETF $eTF)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ETF $eTF)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateETFRequest $request, ETF $eTF)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ETF $eTF)
    {
        //
    }
}
