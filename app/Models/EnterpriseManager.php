<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnterpriseManager extends Model
{
    use HasFactory;

    protected $table = 'enterprise_manager';

    public $timestamps = false;

    protected $fillable = [
        'manager_id',
        'enterprise_id'
    ];

    protected $hidden = ['pivot'];
}
