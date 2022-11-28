<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Manager extends Authenticatable
{
    use HasFactory, HasApiTokens;

    public $timestamps = false;

    protected $guard = 'managers';
    protected $fillable = [
        "name",
        "email",
        "password"
    ];

    protected $hidden = ['pivot', 'password'];

    //Retrieving related enterprises
    public function enterprise()
    {
        return $this->belongsToMany(\App\Models\Enterprise::class, 'enterprise_manager','manager_id', 'enterprise_id');
    }

    //Retrieving related vehicles
    public function vehicle()
    {
        return $this->belongsToMany(\App\Models\Enterprise::class, 'enterprise_manager','manager_id', 'enterprise_id')->with('vehicles');
    }

    #TODO REFACTOR
    public function enterprises($enterpriseId)
    {
        $enterprises = \DB::table('enterprise_manager')
        ->where('manager_id', '=', $this->id)
        ->where('enterprise_id', '=', $enterpriseId)->get()->toArray();
        return $enterprises;
    }

    public function vehicles($vehicle_id)
    {
        $vehicles = \DB::table('enterprise_manager')
        ->join('enterprise_vehicle', 'enterprise_manager.enterprise_id', '=', 'enterprise_vehicle.enterprise_id')
        ->where('manager_id', '=', $this->id)
        ->where('vehicle_id', '=', $vehicle_id)->get()->toArray();
        return $vehicles;
    }
};
