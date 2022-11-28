<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EnterpriseVehicle;

class Vehicle extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "brand_id",
        "mileage",
        "short_number",
        "delivery_date",
        "image"
    ];

    protected $hidden = ['pivot'];

    //Retrieving related brands
    public function brand()
    {
        return $this->belongsTo(\App\Models\Brand::class);
    }

    //Retrieving related enterprises
    public function enterprise()
    {
        return $this->belongsToMany(\App\Models\Enterprise::class);
    }

    //Retrieving related assignLists
    public function assignLists()
    {
        return $this->morphToMany(\App\Models\AssignList::class);
    }

    public function deleteFromEnterprise(EnterpriseVehicle $enterpriseVehicle)
    {

        $enterpriseVehicle->delete();
    }
}
