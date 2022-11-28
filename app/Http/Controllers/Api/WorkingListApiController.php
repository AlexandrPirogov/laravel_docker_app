<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WorkingListResource;
use Illuminate\Http\Request;

class WorkingListApiController extends Controller
{
    //
    public function index()
    {
        $workingList = \App\Models\WorkingList::all();
        return new WorkingListResource($workingList);
    }
}
