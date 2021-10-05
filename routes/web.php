<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('recipe',[\App\Http\Controllers\ExampleOneController::class,"showPage"])->name("home");
//Route::get('example2',[\App\Http\Controllers\ExampleOneController::class,"showPage2"])->name("example2");
//Route::get('create',[\App\Http\Controllers\ExampleOneController::class,"create"])->name("create");
//Route::post("store",[\App\Http\Controllers\ExampleOneController::class,"store"])->name("store");
//Route::delete("delete\{id}",[\App\Http\Controllers\ExampleOneController::class,"delete"])->name("delete");
//Route::get("edit/{id}",[\App\Http\Controllers\ExampleOneController::class,"edit"])->name("edit");
//Route::put('update/{id}',[\App\Http\Controllers\ExampleOneController::class,"update"])->name("update");
//
//Route::get("myImage",[\App\Http\Controllers\ExampleOneController::class,"myImage"]);
//Route::post("getImage",[\App\Http\Controllers\ExampleOneController::class,"getImage"])->name("getImage");

Route::get('/',function () {
    return view("RecipeApi.main_layout");
})->where(".","any");
