<?php

use App\Http\Controllers\ManuController;
use App\Http\Controllers\ProductController;
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
use Illuminate\Support\Facades\DB;

Route::get('firstexample', function () {
  $visited = DB::select('select * from places where visited = ?', [1]);	
  $togo = DB::select('select * from places where visited = ?', [0]);

  return view('travel_list', ['visited' => $visited, 'togo' => $togo ] );
});

Route::get('/', function () {
  return view('page_1');
});


Route::view('page_2B', 'page_2B');

Route::get('page_2', function () {
  return view('page_2');
})->name('page_2');

Route::get('manu', [ManuController::class, 'create_data']);

Route::get('product', [ProductController::class, 'index']);

Route::get('product_detail', [ManuController::class, 'select_data']);

Route::get('update_data', [ManuController::class, 'update_data']);

Route::get('delete_data', [ManuController::class, 'delete_data']);
