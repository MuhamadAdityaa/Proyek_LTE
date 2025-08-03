<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    FilmController,
    PeranController,
};
use App\Http\Controllers\content\{
    AddCast,
    DeleteCast,
    editCast,
};

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
route::get('/app', [HomeController::class, 'appk'])->name('appk');
route::get('/welcome', [HomeController::class, 'welcome'])->name('welcome');

Route::get('/casts', [HomeController::class, 'casts'])->name('casts');
Route::post('/cast/addcast', [AddCast::class, 'add'])->name('add');
Route::delete('/cast/deletecast/{id}', [DeleteCast::class, 'delete'])->name('deleteCast');
Route::patch('/cast/editcast/{id}', [EditCast::class, 'update'])->name('editCast');

Route::get('/films', [FilmController::class, 'index'])->name('film');
Route::get('/film/filmInsert', [FilmController::class, 'film'])->name('film.insert');
Route::get('/film/edit/{id}', [FilmController::class, 'showedit'])->name('film.edit.show');
Route::post('/film/store', [FilmController::class, 'store'])->name('film.store');
Route::delete('/film/deletefilm/{id}', [FilmController::class, 'destroy'])->name('film.delete');
Route::patch('/film/editfilm/{id}', [FilmController::class, 'edit'])->name('film.edit');
Route::get('/film/detail/{id}', [FilmController::class, 'showDetail'])->name('film.detail');

Route::get('/film/store/peran/{id}', [Perancontroller::class, 'index'])->name('film.store.peran');
Route::post('/film/store/peran/create', [PeranController::class, 'storePeran'])->name('film.create.peran');


Route::get('/coba', function () {
    return view('content.cpba');
})->name('coba');

