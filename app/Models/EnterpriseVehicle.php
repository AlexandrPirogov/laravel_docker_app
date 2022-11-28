<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnterpriseVehicle extends Model
{
    use HasFactory;

    protected $table = 'enterprise_vehicle';

    protected $hidden = ['pivot'];

}
