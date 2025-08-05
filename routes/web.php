<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RandstadController;

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

Route::get('/', [RandstadController::class, 'page1'])->name('home');
Route::post('/', [RandstadController::class, 'page1store']);
Route::get('/page2', [RandstadController::class, 'page2'])->name('page2');
Route::post('/page2', [RandstadController::class, 'page2store']);
Route::get('/page3', [RandstadController::class, 'page3'])->name('page3');
Route::post('/page3', [RandstadController::class, 'page3store']);
Route::get('/page4', [RandstadController::class, 'page4'])->name('page4');
Route::post('/page4', [RandstadController::class, 'page4store']);
Route::get('/page5', [RandstadController::class, 'page5'])->name('page5');
Route::post('/page5', [RandstadController::class, 'page5store']);
Route::get('/page6', [RandstadController::class, 'page6'])->name('page6');
Route::post('/page6', [RandstadController::class, 'page6store']);
Route::get('/page7', [RandstadController::class, 'page7'])->name('page7');
Route::post('/page7', [RandstadController::class, 'page7store']);
Route::get('/page8', [RandstadController::class, 'page8'])->name('page8');
Route::post('/page8', [RandstadController::class, 'page8store']);
Route::get('/page9', [RandstadController::class, 'page9'])->name('page9');
Route::post('/page9', [RandstadController::class, 'page9store']);
Route::get('/resume', [RandstadController::class, 'resume'])->name('resume');
Route::Post('/resume', [RandstadController::class, 'resumeStore']);
Route::get('/page10', function(){
    return view('page10'); })->name('page10');
Route::get('/resume/delete', [RandstadController::class, 'deletePage']);
Route::Post('/resume/delete', [RandstadController::class, 'resumeDelete']);







    /* Route::get('/', 'RandstadController@page1')->name('home');
     R oute::post('/', 'RandstadController@page1store');                  *
     Route::get('/page2', 'RandstadController@page2')->name('page2');
     Route::post('/page2', 'RandstadController@page2store');
     Route::get('/page3', 'RandstadController@page3')->name('page3');
     Route::post('/page3', 'RandstadController@page3store');
     Route::get('/page4', 'RandstadController@page4')->name('page4');
     Route::post('/page4', 'RandstadController@page4store');
     Route::get('/page5', 'RandstadController@page5')->name('page5');
     Route::post('/page5', 'RandstadController@page5store');
     Route::get('/page6', 'RandstadController@page6')->name('page6');
     Route::post('/page6', 'RandstadController@page6store');
     Route::get('/page7', 'RandstadController@page7')->name('page7');
     Route::post('/page7', 'RandstadController@page7store');
     Route::get('/page8', 'RandstadController@page8')->name('page8');
     Route::post('/page8', 'RandstadController@page8store');
     Route::get('/page9', 'RandstadController@page9')->name('page9');
     Route::post('/page9', 'RandstadController@page9store');
     Route::get('/resume', 'RandstadController@resume')->name('resume');
     Route::Post('/resume', 'RandstadController@resumeStore');
     Route::get('/page10', function(){
     return view('page10'); })->name('page10');
     Route::get('/resume/delete', 'RandstadController@deletePage');
     Route::Post('/resume/delete', 'RandstadController@resumeDelete'); */
