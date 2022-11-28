<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnterpriseRequest;
use App\Http\Requests\UpdateEnterpriseRequest;
use App\Models\Enterprise;
use App\Http\Resources\EnterpriseResource;

class EnterpriseController extends Controller
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
     * @param  \App\Http\Requests\StoreEnterpriseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEnterpriseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function show(Enterprise $enterprise)
    {
        //
        dd($enterprise);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function edit(Enterprise $enterprise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEnterpriseRequest  $request
     * @param  \App\Models\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEnterpriseRequest $request, Enterprise $enterprise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enterprise $enterprise)
    {
        //
    }

    public function vehicles(Enterprise $enterprise)
    {
        $vehicles = \App\Models\Vehicle::with(["enterprise" => function($q) use($enterprise){
            $q->where('enterprises.id', '=', $enterprise->id);
        }])->paginate(30);
        return \View::make('vehicles')->with(['vehicles' => $vehicles]);
    }
}
