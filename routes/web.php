<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\GubunController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\JangbuiController;
use App\Http\Controllers\JangbuoController;
use App\Http\Controllers\FindproductController;
use App\Http\Controllers\GiganController;
use App\Http\Controllers\BestController;
use App\Http\Controllers\CrosstabController;
use App\Http\Controllers\ChartController;

use App\Models\Member;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\Footnote\Node\FootnoteContainer;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [MessageFormatter::class, 'index']);
Route::get('/', function () {
  return view('main');
});
Route::resource('member', MemberController::class);
Route::resource('gubun', GubunController::class);
Route::resource('product', ProductController::class);
Route::resource('jangbui', JangbuiController::class);
Route::resource('jangbuo', JangbuoController::class);
Route::resource('findproduct', FindproductController::class);
Route::resource('gigan', GiganController::class);
Route::resource('best', BestController::class);
Route::resource('crosstab', CrosstabController::class);
Route::resource('chart', ChartController::class);
