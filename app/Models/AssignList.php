<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignList extends Model
{
    use HasFactory;

    protected $table = 'assign_list';

    public $timestamps = false;

    protected $fillable = [
        "driver_id",
        "vehicle_id",
        "date_start",
        "date_end"
    ];

    public function drivers()
    {
        return $this->hasMany(\App\Models\Driver::class, 'id');
    }

    public function vehicles()
    {
        return $this->hasMany(\App\Models\Vehicle::class, 'id');
    }
}
