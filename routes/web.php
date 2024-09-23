<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;

Route::get('/', function () {
    return view('welcome');
});
Route::get('about/{id}', [Admincontroller::class, 'about'])->name('about');

Route::get('blog',[Admincontroller::class,'blog'])->name('blog');

Route::get('create',[Admincontroller::class,'create'])->name('create');

Route::post('insert',[Admincontroller::class,'insert']);

Route::get('delete/{id}',[Admincontroller::class,'delete'])->name('delete');

Route::get('change/{id}',[Admincontroller::class,'change'])->name('change');

Route::get('update/{id}',[Admincontroller::class,'update'])->name('update');

Route::post('updates/{id}',[Admincontroller::class,'updates'])->name('updates');