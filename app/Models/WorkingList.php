<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingList extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "assign_id",
        "working_start",
        "working_end"
    ];
}
