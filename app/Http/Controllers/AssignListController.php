<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssignListRequest;
use App\Http\Requests\UpdateAssignListRequest;
use App\Models\AssignList;

class AssignListController extends Controller
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
     * @param  \App\Http\Requests\StoreAssignListRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssignListRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssignList  $assignList
     * @return \Illuminate\Http\Response
     */
    public function show(AssignList $assignList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssignList  $assignList
     * @return \Illuminate\Http\Response
     */
    public function edit(AssignList $assignList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAssignListRequest  $request
     * @param  \App\Models\AssignList  $assignList
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAssignListRequest $request, AssignList $assignList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssignList  $assignList
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignList $assignList)
    {
        //
    }
}
