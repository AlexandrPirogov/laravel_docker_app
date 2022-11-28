<?php

namespace App\Models;

use \App\Models\Vehicle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Brand extends Model
{
    use HasFactory;

    public const BRANDS_TYPE = [
        "Sedan",
        "Sport",
        "Hatchback",
        "Cruiser"
    ];

    public $timestamps = false;

    protected $fillable = [
        "brand",
        "type",
        "version",
        "seats",
        "enginge_power",
        "release_date",
        "logo"
    ];

    public function vehicles()
    {
        return $this->hasMany(\App\Models\Vehicle::class);
    }
}
