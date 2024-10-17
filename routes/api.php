<?php

use App\Http\Controllers\Api\foodController;
use Illuminate\Support\Facades\Route;

Route::get('food',[foodController::class,'index'])
?>