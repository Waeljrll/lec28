<?php

use App\Http\Controllers\Api\AuthContrloller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ProductController;




Route::apiResource("products", ProductController::class)->middleware("auth:sanctum");
Route::get("/categories", function (Request $request) {
    return response()->json([
        "categories" => \App\Models\Category::all()
    ]);
});
Route::Post("/login", [AuthContrloller::class,'login']);
Route::Post("/logout", [AuthContrloller::class,'logout'])->middleware("auth:sanctum");

