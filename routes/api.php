<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthenticationController;

//CATEGORY
Route::get('/categories', [CategoryController::class, 'index'])->middleware(['auth:sanctum']);
Route::post('/categories', [CategoryController::class, 'store'])->middleware(['auth:sanctum']);
Route::patch('/categories/{id}', [CategoryController::class, 'update'])->middleware(['auth:sanctum']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->middleware(['auth:sanctum']);

//USER
Route::get('/users', [UserController::class, 'index'])->middleware(['auth:sanctum']);

//PRODUCT
Route::get('/products', [ProductController::class, 'index'])->middleware(['auth:sanctum']);
Route::post('/products', [ProductController::class, 'store'])->middleware(['auth:sanctum']);
Route::patch('/products/{id}', [ProductController::class, 'update'])->middleware(['auth:sanctum']);
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->middleware(['auth:sanctum']);

Route::post('/login', [AuthenticationController::class, 'login']);
Route::get('/logout', [AuthenticationController::class, 'logout'])->middleware(['auth:sanctum']);
Route::get('/me',[AuthenticationController::class, 'me'])->middleware(['auth:sanctum']);




