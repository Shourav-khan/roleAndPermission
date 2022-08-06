<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Supervisor\PermissionController;
use App\Http\Controllers\Supervisor\RoleController;
use App\Http\Controllers\Supervisor\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth'])->group(function ()
{
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions',PermissionController::class);
    Route::get('/home',[HomeController::class,'index']);
    Route::get('/super/role',[RoleController::class,'index'])->name('supervisor.role');
    Route::get('/super/permission',[PermissionController::class,'index'])->name('supervisor.permission');

    Route::get('role/create',[RoleController::class,'roleCreate'])->name('role.create');
    Route::post('create/complete',[RoleController::class,'store'])->name('create.complete');
    Route::get('show/edit/{role}',[RoleController::class,'showEdit'])->name('show.edit');
    Route::put('edit/role/{role}',[RoleController::class,'update'])->name('edit.role');
    Route::delete('delete/role/{role}',[RoleController::class,'destroy'])->name('delete.role');

//    RoleWisePermission
    Route::post('permission/role/{role}',[RoleController::class,'givePermission'])->name('permission.role');
    Route::delete('permission/{permission}/role/{role}/',[RoleController::class,'revokePermission'])->name('permission.delete.it');




//    User

    Route::get('index/user',[UserController::class,'index'])->name('index.user');
    Route::delete('user/delete/{user}',[UserController::class,'destroy'])->name('user.delete');
    Route::get('show/roles/permissions/{user}',[UserController::class,'show'])->name('show.r.p');
    Route::post('role/add/{user}',[UserController::class,'store'])->name('role.add');
    Route::delete('user/{user}/role/{role}/revoke',[UserController::class,'revokeRole'])->name('user.role.revoke');


    Route::post('add/permission/{user}',[UserController::class,'assignPermission'])->name('add.permission');
    Route::delete('permission/{permission}/yes/{user}/revoke',[UserController::class,'revokePermission'])->name('user.permission.delete');





    Route::get('permission/create',[PermissionController::class,'create'])->name('permission.create');
    Route::post('permission/create/complete',[PermissionController::class,'store'])->name('permission.create.complete');
    Route::get('show/edit/permission/{permission}',[PermissionController::class,'edit'])->name('permission.edit');
    Route::put('edit/permission/now/{permission}',[PermissionController::class,'update'])->name('permission.edit.done');
    Route::delete('permission/delete/{permission}',[PermissionController::class,'destroy'])->name('permission.delete');




});
