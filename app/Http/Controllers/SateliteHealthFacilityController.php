<?php

namespace App\Http\Controllers;

use App\Models\SateliteHealthFacility;
use App\Http\Requests\StoreSateliteHealthFacilityRequest;
use App\Http\Requests\UpdateSateliteHealthFacilityRequest;

class SateliteHealthFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasyankes = collect(["RS PARU JEMBER", "RSD DR. SOEBANDI JEMBER"]);
        $satelites = SateliteHealthFacility::get();
        return view('admin.fasyankes.index', compact('fasyankes', 'satelites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSateliteHealthFacilityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSateliteHealthFacilityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SateliteHealthFacility  $sateliteHealthFacility
     * @return \Illuminate\Http\Response
     */
    public function show(SateliteHealthFacility $sateliteHealthFacility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SateliteHealthFacility  $sateliteHealthFacility
     * @return \Illuminate\Http\Response
     */
    public function edit(SateliteHealthFacility $sateliteHealthFacility)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSateliteHealthFacilityRequest  $request
     * @param  \App\Models\SateliteHealthFacility  $sateliteHealthFacility
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSateliteHealthFacilityRequest $request, SateliteHealthFacility $sateliteHealthFacility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SateliteHealthFacility  $sateliteHealthFacility
     * @return \Illuminate\Http\Response
     */
    public function destroy(SateliteHealthFacility $sateliteHealthFacility)
    {
        //
    }
}
