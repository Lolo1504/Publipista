<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\AlquilerController;
use App\Http\Controllers\admin\reservaController;
use App\Http\Controllers\admin\AdminController;
use Faker\Provider\ar_EG\Person;

Route::get('/', function(){
    return view('welcome');
});



Route::get('/dashboard', function () {
    return redirect('publipistas/home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route:: group(['prefix' => 'publipistas'],function(){
Route::get('home',[HomeController::class,'index'])->name('home');
Route::get('perfil',[ProfileController::class,'index'])->name('perfil');
Route::get('reservas',[reservaController::class,'index'])->name('reservas');
Route::delete('borra/{id}',[reservaController::class,'borrar'])->name('reservas.borrar');
Route::resource('admin',AdminController::class)->names('admin');
Route::delete('borrar/{id}',[AdminController::class,'borrar'])->name('admin.borrar');
Route::post('alquiler',[AlquilerController::class,'create'])->name('alquiler');
Route::post('reservar',[AlquilerController::class,'store'])->name('reservar');
});