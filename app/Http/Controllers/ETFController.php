<?php

namespace App\Http\Controllers;

use App\Models\ETF;
use Inertia\Inertia;
use App\Models\myETF;
use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Http\Requests\StoreETFRequest;
use App\Http\Requests\UpdateETFRequest;
use App\Services\YahooService;
use Scheb\YahooFinanceApi\ApiClientFactory;

class ETFController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(YahooService $yahooService)
    {
        $myEtfs = MyEtf::all(); // only one user, so no filter needed

        $enriched = $myEtfs->map(function ($etf) use ($yahooService) {
            $data = $yahooService->getQuoteCached($etf);
            return array_merge(['ticker' => $etf->ticker], $data);
        });

        return Inertia::render('wallet/Etf', [
            'etfs' => $enriched,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store an my etf ticker to db.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ticker' => 'required|string|max:10',
        ]);
        myETF::create([
            'ticker' => $request->input('ticker'),
        ]);
        return back()->with('success', 'ETF added!');
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
