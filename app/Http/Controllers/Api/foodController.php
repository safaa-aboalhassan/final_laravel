<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodResource;
use App\Models\Food;
use Illuminate\Http\Request;

class foodController extends Controller
{
    function index(): object {
 $foods=Food::all();
 return response()->json(FoodResource::collection($foods));
    }
}
