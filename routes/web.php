<?php
use App\Http\Controllers\AcceuilController;

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PictureController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PropertyController as ControllersPropertyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;





$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';

Route::get('/', [HomeController::class, 'index']);

Route::get('/biens', [PropertyController::class, 'index'])->name('property.index');

Route::get('/biens/{slug}-{property}', [PropertyController::class, 'show'])
    ->name('property.show')
    ->where([
        'property' => $idRegex,
        'slug' => $slugRegex
    ]);
    Route::post('/biens/{property}/contact',[PropertyController::class, 'contact'])->name('property.contact')->where([
        'property'=>$idRegex,
    ]);
   

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'doLogin']);
Route::delete('/logout', [AuthController::class, 'logout']) ->name('logout');




Route::get('/images/{path}', [ImageController::class, 'show'])
     ->where('path', '.*');
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() use ($idRegex){

    Route::resource('property', App\Http\Controllers\Admin\PropertyController::class)->except(['show']);
    Route::resource('option',OptionController::class)->except(['show']);
    Route::delete('picture/{picture}', [PictureController::class, 'destroy'])
    ->name('picture.destroy')
    ->where([
        'picture' => $idRegex,
    ]);
});
