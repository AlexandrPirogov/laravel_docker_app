<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnterpriseManagerRequest;
use App\Http\Requests\UpdateEnterpriseManagerRequest;
use App\Models\EnterpriseManager;
use App\Http\Resources\EnterpriseResource;

class EnterpriseManagerController extends Controller
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
     * @param  \App\Http\Requests\StoreEnterpriseManagerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEnterpriseManagerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EnterpriseManager  $enterpriseManager
     * @return \Illuminate\Http\Response
     */
    public function show(EnterpriseManager $enterpriseManager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EnterpriseManager  $enterpriseManager
     * @return \Illuminate\Http\Response
     */
    public function edit(EnterpriseManager $enterpriseManager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEnterpriseManagerRequest  $request
     * @param  \App\Models\EnterpriseManager  $enterpriseManager
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEnterpriseManagerRequest $request, EnterpriseManager $enterpriseManager)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EnterpriseManager  $enterpriseManager
     * @return \Illuminate\Http\Response
     */
    public function destroy(EnterpriseManager $enterpriseManager)
    {
        //
    }
}
