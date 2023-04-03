<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\selectController;
use App\Http\Controllers\ktgController;
use App\Http\Controllers\asrController;
use App\Http\Controllers\dvsController;
use App\Http\Controllers\bpjsController;
use App\Http\Controllers\jbtController;
use App\Http\Controllers\cbgController;
use App\Http\Controllers\mgjController;
use App\Http\Controllers\ptkpController;
use App\Http\Controllers\krdController;
use App\Http\Controllers\kryController;
use App\Http\Controllers\tgjController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\tgdController;

use App\Http\Controllers\createController;

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

Route::get('/createdata/ktg', [createController::class, 'createKtg'])->middleware('auth');
Route::get('/createdata/mgj', [createController::class, 'createMgj'])->middleware('auth');


/* A route to selectdvs, selectasr, selectjbt, and selectktg. */

Route::get('/dvs/selectdvs', [selectController::class, 'selectdvs'])->middleware('auth');
Route::get('/asr/selectasr', [selectController::class, 'selectasr'])->middleware('auth');
Route::get('/jbt/selectjbt', [selectController::class, 'selectjbt'])->middleware('auth');
Route::get('/ktg/selectktg', [selectController::class, 'selectktg'])->middleware('auth');
Route::get('/ptkp/selectptkp', [selectController::class, 'selectptkp'])->middleware('auth');
Route::get('/cbg/selectcbg', [selectController::class, 'selectcbg'])->middleware('auth');
Route::get('/kry/selectkry', [selectController::class, 'selectkry'])->middleware('auth');
Route::get('/bpjs/selectbpjs', [selectController::class, 'selectbpjs'])->middleware('auth');
Route::get('/mgj/selectmgj', [selectController::class, 'selectmgj'])->middleware('auth');


Route::delete('/krdedit/delete/{kry}/{mgj}', [krdController::class, 'destroyedit'])->middleware('auth');
Route::delete('/krdcreate/delete/{kry}/{mgj}', [krdController::class, 'destroycreate'])->middleware('auth');
Route::delete('/tgdedit/delete/{nojnl}/{mgj}', [tgdController::class, 'destroyedit'])->middleware('auth');
Route::delete('/tgdcreate/delete/{nojnl}/{mgj}', [tgdController::class, 'destroycreate'])->middleware('auth');

Route::post('/tgdcreate/edit', [tgdController::class, 'edittgdcreate'])->middleware('auth');
Route::post('/tgdedit/edit', [tgdController::class, 'edittgdedit'])->middleware('auth');

Route::get('/tgj/save', [tgjController::class, 'save'])->middleware('auth');
Route::get('/tgj/cancel', [tgjController::class, 'cancel'])->middleware('auth');

/* A shortcut for the following routes: */
Route::resource('dvs', dvsController::class)->middleware('auth');
Route::resource('jbt', jbtController::class)->middleware('auth');
Route::resource('asr', asrController::class)->middleware('auth');
Route::resource('kry', kryController::class)->middleware('auth');
Route::resource('ktg', ktgController::class)->middleware('auth');
Route::resource('mgj', mgjController::class)->middleware('auth');
Route::resource('ptkp', ptkpController::class)->middleware('auth');
Route::resource('cbg', cbgController::class)->middleware('auth');
Route::resource('bpjs', bpjsController::class)->middleware('auth');
Route::resource('tgj', tgjController::class)->middleware('auth');
Route::resource('krd', krdController::class)->middleware('auth');

/* A route to register page. */
Route::get('register', [registerController::class, 'index'])->name('register');
Route::post('register', [registerController::class, 'store']);

/* A route to login page. */
Route::get('login', [loginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [loginController::class, 'authenticate']);
Route::get('logout', [loginController::class, 'logout'])->name('logout.logout')->middleware('auth');

/* A route to change password. */
Route::get('changepassword', [registerController::class, 'changepassword'])->name('changepassword')->middleware('auth');
Route::post('changepassword', [registerController::class, 'updatepassword'])->middleware('auth');

/* A route to home page. */
Route::get('home', [homeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/', [homeController::class, 'index'])->name('home')->middleware('auth');
