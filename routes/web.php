<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\GubunController;
use App\Http\Controllers\ProductController;
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
