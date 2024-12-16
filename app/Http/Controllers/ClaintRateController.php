<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClaintRateRequest;
use App\Http\Requests\grade\GradeRequest;
use App\Models\ClaintRates;

use Illuminate\Http\Request;

class ClaintRateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $claint_rates = ClaintRates::query()->get();
        return view('dashboard.pages.claint_rates.index', compact('claint_rates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $claint_rates = ClaintRates::query()->get();
        return view('dashboard.pages.claint_rates.create', compact('claint_rates'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(GradeRequest $request)
    {
        ClaintRates::create($request->validated());
        return redirect()->route('claint_rates.index')->with('success', 'claint rate created successfully!');
    }
    /**
     * Display the specified resource.
     */

    public function show(ClaintRates $ClaintRates)
    {
        return view('dashboard.pages.claint_rates.show', compact('ClaintRates'));
    }

    public function edit($id)
    {
        $ClaintRates = ClaintRates::findOrFail($id);
        return view('dashboard.pages.claint_rates.create', compact('ClaintRates'));
    }

    public function update(ClaintRateRequest $request, ClaintRates $ClaintRates)
    {
        $ClaintRates->update($request->validated());
        return redirect()->route('claint_rates.index')->with('success', 'Claint Rates updated successfully!');
    }

    public function destroy($id)
    {
        $ClaintRates = ClaintRates::findOrFail($id);
        $ClaintRates->delete();

        return redirect()->back()->with('success', 'Claint Rates deleted successfully!');
    }
}
