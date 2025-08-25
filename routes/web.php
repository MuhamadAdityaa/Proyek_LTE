<?php

use Illuminate\Support\Facades\{
    Route,
    Auth,
};
use App\Http\Controllers\{
    HomeController,
    FilmController,
    PeranController,
    RegisterController,
    DashboardController,
    AuthController,
};
use App\Http\Controllers\content\{
    AddCast,
    DeleteCast,
    editCast,
};

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('dashboard');
route::get('/app', [HomeController::class, 'appk'])->name('appk');
route::get('/welcome', [HomeController::class, 'welcome'])->name('welcome');

Route::get('/dasboard/user', [DashboardController::class, 'user'])->name('dashboard.user');
Route::get('/dashboard/admin', [DashboardController::class, 'admin'])-> name('dashboard.admin');

Route::get('/login', [AuthController::class, 'login'])->name('login.login');
Route::post('/login/authenticate', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('login.logout');

Route::get('/casts', [HomeController::class, 'casts'])->name('casts');
Route::post('/cast/addcast', [AddCast::class, 'add'])->name('add');
Route::delete('/cast/deletecast/{id}', [DeleteCast::class, 'delete'])->name('deleteCast');
Route::patch('/cast/editcast/{id}', [EditCast::class, 'update'])->name('editCast');

Route::controller(FilmController::class)->group(function(){
    Route::get('/films', 'index')->name('film');
    Route::get('/film/filmInsert', 'film')->name('film.insert');
    Route::get('film/edit/{id}', 'showedit')->name('film.edit.show');
    Route::post('/film/store', 'store')->name('film.store');
    Route::delete('/film/deletefilm/{id}', 'destroy')->name('film.delete');
    Route::patch('/film/editfilm/{id}', 'edit')->name('film.edit');
    Route::get('/film/detail/{id}', 'showDetail')->name('film.detail');
});

Route::get('/film/store/peran/{id}', [Perancontroller::class, 'index'])->name('film.store.peran');
Route::post('/film/store/peran/create', [PeranController::class, 'storePeran'])->name('film.create.peran');


Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register/store', [RegisterController::class, 'store'])->name('register.store');
