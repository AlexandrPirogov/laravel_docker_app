<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\AssignListResource;

class AssignListApiController extends Controller
{
    //
    public function index()
    {
        $assignLists = \App\Models\AssignList::all();
        return new AssignListResource($assignLists);
    }

    public function drivers()
    {
        $assignLists = \App\Models\AssignList::with('drivers')->get();
        return new AssignListResource($assignLists);
    }

    public function vehicles()
    {
        $assignLists = \App\Models\AssignList::with('vehicles')->get();
        return new AssignListResource($assignLists);
    }

    public function completeIndex()
    {
        $assignLists = \App\Models\AssignList::with(['vehicles', 'drivers'])->get();
        return new AssignListResource($assignLists);
    }
}
