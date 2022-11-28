<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDriverEnterpriseRequest;
use App\Http\Requests\UpdateDriverEnterpriseRequest;
use App\Models\DriverEnterprise;

class DriverEnterpriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreDriverEnterpriseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDriverEnterpriseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DriverEnterprise  $driverEnterprise
     * @return \Illuminate\Http\Response
     */
    public function show(DriverEnterprise $driverEnterprise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DriverEnterprise  $driverEnterprise
     * @return \Illuminate\Http\Response
     */
    public function edit(DriverEnterprise $driverEnterprise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDriverEnterpriseRequest  $request
     * @param  \App\Models\DriverEnterprise  $driverEnterprise
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDriverEnterpriseRequest $request, DriverEnterprise $driverEnterprise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DriverEnterprise  $driverEnterprise
     * @return \Illuminate\Http\Response
     */
    public function destroy(DriverEnterprise $driverEnterprise)
    {
        //
    }
}
