<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\BrandResource;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::with('vehicles')->get();

        return new BrandResource($brands);
    }
}
