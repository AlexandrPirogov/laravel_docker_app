<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Manager;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Resources\ManagerResource;
use App\Http\Resources\VehicleResource;

class ManagerApiController extends Controller
{

    public function enterprises()
    {
        $withEnterprises = Manager::with('enterprise')->where('id', '=', Auth::user()->id)->get();
        return new ManagerResource($withEnterprises);
    }

    public function vehicles()
    {
        $withVehicles = Manager::with('vehicle')->get();        
        return new ManagerResource($withVehicles);
    }

    public function createAccount(Request $request)
    {

        $attr = $request->validate([
            'name' => 'string',
            'email' => 'string',
            'password' => 'string'
        ]);
        $manager = Manager::create([
            'name' => $attr['name'],
            'password' => bcrypt($attr['password']),
            'email' => $attr['email']
        ]);
        return response()->json([
            'token' => $manager->createToken('tokens')->plainTextToken
        ]);
    }
    //use this method to signin users
    public function signin(Request $request)
    {
        $attr = $request->validate(
            [
                "name" => "string",
                "email" => "string",
                "password" => "string"
            ]
        );
        if (!Auth::guard('managers')->attempt($attr)) {
            return response()->json(['error' => 'Credentials not match', 'code' => 401]);
        }
        return response()->json([
            'token' => Auth::guard('managers')->user()->createToken('API Token')->plainTextToken
        ]);
    }

    // this method signs out users by removing tokens
    public function signout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([ 'message' => 'Tokens Revoked']);
    }

    #TODO REFACTOR
    public function vehiclesCreate(Request $request)
    {
        $manager  = Auth::guard('manager')->user();
        $params = $request->query();
        $manager = $manager->enterprises($params["enterprise_id"]);
        if(!$manager)
        {
            return response()->json(["error" => "enterprise not exists"]);
        }
        
        $path = public_path('storage/images/vehicles');
        if ( ! file_exists($path) ) mkdir($path, 0777, true);
        
        $file = $request->file('image');
        $fileName = '';
        if(!is_null($file))
        {
            $fileName = trim($file->getClientOriginalName());
            $file->move('storage/images/vehicles', $fileName);
        }
        $vehicle = Vehicle::create($params);
        $vehicle->makeHidden(["image", "id"]);
        
        \DB::table('enterprise_vehicle')->insert(
            ['vehicle_id' => $vehicle->id, 'enterprise_id' => $params["enterprise_id"]]
        );
        
        
        return new VehicleResource($vehicle);
    }

    public function vehiclesUpdate(Request $request, Vehicle $vehicle)
    {
        $manager = Auth::user();
        $reqBody = $request->query();
        $managersVehicles = $manager->vehicles($vehicle->id);
        if(!$managersVehicles)
            return response()->json(["error" => "vehicle does not exist"]);
        //$reqBody['brand_id'] = $vehicle->id;
        $newVehicle = Vehicle::whereId($vehicle->id)->update($reqBody);
        return new VehicleResource($vehicle);
    }

    public function vehiclesDelete(Vehicle $vehicle)
    {
        \DB::table('enterprise_vehicle')->where('vehicle_id', $vehicle->id)->delete();
        $vehicle->delete();
        return response()->json(["status" => "success"]);
    }

}
