<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "company_name",
        "located_in",
        "created_date"
    ];

    protected $hidden = ['pivot'];

    public function vehicles()
    {
        return $this->belongsToMany(\App\Models\Vehicle::class);
    }
}
