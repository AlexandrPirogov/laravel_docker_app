<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Models\Vehicle;
use App\Models\EnterpriseVehicle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Route;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::with('enterprise')->paginate(30)->fragment('vehicle');
        dd($vehicles);
        return Redirect::back()->with(['vehicles' => $vehicles]);
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
     * @param  \App\Http\Requests\StoreVehicleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleRequest $request)
    {
        $params = $request->post();
        $path = public_path('storage/images/vehicles');
        if ( ! file_exists($path) ) mkdir($path, 0777, true);
        $file = $request->file('image');
        $fileName = '';
        if(!is_null($file))
        {
            $fileName = trim($file->getClientOriginalName());
            $file->move('storage/images/vehicles', $fileName);
            $params["image"] = $fileName;
        }
        $vehicle = Vehicle::create($params);
        $vehicles = Vehicle::all()->each(function ($vehicle) {
            $vehicle->makeHidden(["image", "id"]);
        });;
        $manager = Auth::guard('managers')->user()->get()->toArray();
        return \Redirect::route('me.enterprises')->with(['manager' => $manager]);
    }

    public function viewStore()
    {
        $brands = \App\Models\Brand::get()->toArray();
        return \View::make('createvehicle')->with(['brands' => $brands]);;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleRequest  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        $reqBody = $request->post();
        $vehicle['brand_id'] = $reqBody['brand'];
        $newVehicle = Vehicle::whereId($vehicle->id)->update($vehicle->toArray());
        $manager = Auth::guard('managers')->user()->get()->toArray();
        return \Redirect::route('me.enterprises')->with(['manager' => $manager]);
    }

    public function viewUpdate(Vehicle $vehicle)
    {
        $brands = \App\Models\Brand::get()->toArray();
        return \View::make("editvehicle")->with(['vehicle'=>$vehicle, 'brands' => $brands]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $enterpriseVehicle = EnterpriseVehicle::where('vehicle_id', '=', $vehicle->id)->delete();
        return Redirect::back();
    }
}
