<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
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
Route::get('/',function(){
    return view('auth.login');
});
Route::group(['middleware'=>'role:super admin|admin'],function(){
    Route::get('/home', [UserController::class, 'index']);
    Route::get('/role_list',[RoleController::class,'roleList']);
    Route::get('/getRolePermission/{id}',[PermissionController::class,'getRolePermission']);
    Route::post('/syncRolePermission/{roleId}',[PermissionController::class,'syncRolePermission']);
    Route::get('assignRole/{userId}',[RoleController::class,'assignRole']);
    Route::post('applyRoleToUser/{userId}',[RoleController::class,'applyRoleToUser']);
    Route::get('/user_edit',[UserController::class,'userEdit']);
    Route::get('/user_delete', [UserController::class, 'userDelete']);
});

Route::get('/dashboard',
    // [UserController::class, 'index']
    [UserController::class, 'index']
)->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
