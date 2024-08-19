<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get("/", [LoginController::class, "login"]);
Route::post("/auth", [LoginController::class, "auth"])->name("auth.login");
Route::get("/logout", [LoginController::class, "logout"])->name("auth.logout");

Route::get("/dashboard", [DashboardController::class, "index"])->name("dashboard");
Route::get("/document", [DocumentController::class, "index"])->name("document");
Route::get("/document/create", [DocumentController::class, "create"])->name("document.create");
Route::post("/document/create", [DocumentController::class, "store"])->name("document.store");
Route::delete("/document/delete/{id}", [DocumentController::class, "destroy"])->name("document.delete");

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get("/user", [UserController::class, "index"])->name("user");
    Route::get("/user/create", [UserController::class, "create"])->name("user.create");
    Route::post("/user/create", [UserController::class, "store"])->name("user.store");
    Route::get("/user/edit/{id}", [UserController::class, "edit"])->name("user.edit");
    Route::patch("/user/update/{id}", [UserController::class, "update"])->name("user.update");
    Route::delete("/user/delete/{id}", [UserController::class, "destroy"])->name("user.delete");
});
