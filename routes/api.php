<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login_admin', [AdminController::class, 'loginAdmin']);

Route::get('/get_all_entries', [EntryController::class, 'getAllEntries']);
Route::get('/search_entries', [EntryController::class, 'searchEntries']);
Route::get('/entry_front_edit/{id}', [EntryController::class, 'entryFrontEdit']);
Route::get('/my_entries/{id}', [EntryController::class, 'myEntries']);
Route::post('/assign_to_employee', [EntryController::class, 'assignToEmployee']);
Route::post('/entry_back_update', [EntryController::class, 'entryBackUpdate']);

Route::get('/get_backoffice_employees', [UserController::class, 'getBackofficeEmployees']);
Route::post('/create_employee', [UserController::class, 'createEmployee']);
Route::post('/login_employee', [UserController::class, 'loginEmployee']);

