<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkingListRequest;
use App\Http\Requests\UpdateWorkingListRequest;
use App\Models\WorkingList;

class WorkingListController extends Controller
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
     * @param  \App\Http\Requests\StoreWorkingListRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkingListRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkingList  $workingList
     * @return \Illuminate\Http\Response
     */
    public function show(WorkingList $workingList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkingList  $workingList
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkingList $workingList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkingListRequest  $request
     * @param  \App\Models\WorkingList  $workingList
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkingListRequest $request, WorkingList $workingList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkingList  $workingList
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkingList $workingList)
    {
        //
    }
}
