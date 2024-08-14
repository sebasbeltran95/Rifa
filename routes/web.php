<?php

use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Padre;
use App\Http\Livewire\Principal;
use App\Http\Livewire\Productos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/login',function(){ return redirect('login'); })->name('login');





Auth::routes();

Route::group(['middleware' => ['auth']], function (){
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/productos', Productos::class)->name('productos');
});
Route::get('/', Principal::class)->name('/');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
