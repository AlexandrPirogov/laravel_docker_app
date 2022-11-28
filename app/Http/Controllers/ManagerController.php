<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreManagerRequest;
use App\Http\Requests\UpdateManagerRequest;
use App\Models\Manager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Vehicle;
use App\Http\Resources\ManagerResource;
use App\Http\Resources\VehicleResource;
use Redirect;


class ManagerController extends Controller
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
     * @param  \App\Http\Requests\StoreManagerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreManagerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateManagerRequest  $request
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateManagerRequest $request, Manager $manager)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        //
    }

    //use this method to signin users
    public function signin(Request $request)
    {
        $attr = $request->validate(
            [
                "email" => "string",
                "password" => "string"
            ]
        );
        if (!Auth::guard('managers')->attempt($attr)) {
            return response()->json(['error' => 'Credentials not match', 'code' => 401]);
        }
        return redirect("/me/profile");
    }

     // this method signs out users by removing tokens
    public function logout()
    {
        Auth::guard('managers')->user()->tokens()->delete();
        Auth::guard('managers')->logout();
        return redirect('/login');
    }

    public function me(Request $request)
    {
        return view("/me");
    }

    public function enterprises()
    {
        $withEnterprises = Manager::with('enterprise')->where('id', '=', Auth::guard('managers')->user()->id)->get()->toArray()[0];
        return \View::make("enterprises")->with(["enterprises" => $withEnterprises["enterprise"]]);
    }

    public function profile()
    {
        $manager = Manager::where('id', '=', Auth::guard('managers')->user()->id)->get()->toArray();
        return \View::make("me")->with(["manager" => $manager]);
    }

    public function vehicles(Request $request)
    {
        $withVehicles = Manager::with('vehicle')->get()->toArray();        
        return \View::make("vehicles")->with(['vehicles' => $withVehicles]);
    }
}
