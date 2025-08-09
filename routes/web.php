<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

   

    Route::get('/user/index', [UserController::class, 'user_index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'user_create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'user_store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'user_edit'])->name('user.edit');
    Route::post('/user/update/{id}', [UserController::class, 'user_update'])->name('user.update');
    Route::get('/user/delete/{id}', [UserController::class, 'user_delete'])->name('user.delete');

    Route::get('/role/index', [RoleController::class, 'role_index'])->name('role.index');
    Route::get('/role/create', [RoleController::class, 'role_create'])->name('role.create');
    Route::post('/role/store', [RoleController::class, 'role_store'])->name('role.store');
    Route::get('/role/edit/{id}', [RoleController::class, 'role_edit'])->name('role.edit');
    Route::post('/role/update/{id}', [RoleController::class, 'role_update'])->name('role.update');
    Route::get('/role/delete/{id}', [RoleController::class, 'role_delete'])->name('role.delete');


    Route::get('/permission/index', [PermissionController::class, 'permission_index'])->name('permission.index');
    Route::get('/permission/create', [PermissionController::class, 'permission_create'])->name('permission.create');
    Route::post('/permission/store', [PermissionController::class, 'permission_store'])->name('permission.store');
    Route::get('/permission/edit/{id}', [PermissionController::class, 'permission_edit'])->name('permission.edit');
    Route::post('/permission/update/{id}', [PermissionController::class, 'permission_update'])->name('permission.update');
    Route::get('/permission/delete/{id}', [PermissionController::class, 'permission_delete'])->name('permission.delete');


   Route::get('/role/permission', [PermissionController::class, 'role_permission'])->name('role.permission');
   Route::post('/sync/permission', [PermissionController::class, 'sync_permission'])->name('sync.permission');




});
