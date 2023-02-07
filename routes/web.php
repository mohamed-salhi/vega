<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\webController;
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
Route::get('/getcategory/{id}' , [\App\Http\Controllers\CategoryController::class , 'getCategoryById']);
Route::get('/getproject/{id}' , [\App\Http\Controllers\ProjectController::class , 'getprojectById']);
Route::get('/', [MainController::class , 'index'])->middleware('auth')->name('index');
Route::prefix('Dashboard')->middleware('auth')->group(function (){
    Route::resource('category' , \App\Http\Controllers\CategoryController::class );
    Route::resource('project' , \App\Http\Controllers\ProjectController::class );
    Route::get('alpumView/{id}' , [\App\Http\Controllers\ProjectController::class , 'alpumView'])->name('alpumView');
    Route::get('contact',[MainController::class,'contact'])->name('contact');
    Route::delete('contact/destroy/{id}',[MainController::class,'destroy'])->name('contact.destroy');
    Route::get('comment',[MainController::class,'comment'])->name('comment');
    Route::delete('comment/destroy/{id}',[MainController::class,'destroycomment'])->name('comment.destroy');


});

Route::prefix('vega')->group(function (){
    Route::post('contact',[MainController::class,'contactpost'])->name('contactpost');
    Route::post('comment',[MainController::class,'commentpost'])->name('commentpost');
   Route::get('/' ,[webController::class,'index']);
   Route::get('DetailsProject/{id}',[webController::class,'DetailsProject'])->name('DetailsProject');
    Route::get('AllProject',[webController::class,'AllProject'])->name('all_project');

});







