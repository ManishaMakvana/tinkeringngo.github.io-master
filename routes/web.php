<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PasswordUpdateController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\managerController;
use App\Http\Controllers\usermanagerController;

use App\Http\Controllers\ActivityController;

Route::get('/', function () {
    return view('home'); // Assuming your Blade file is named home.blade.php
})->name('home');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Password Update Route
Route::get('/update-password', [PasswordUpdateController::class, 'updatePassword']);



Route::get('/program', [ProgramController::class, 'showProgramDashboard'])
    ->name('program')
    ->middleware('auth');

    

   

    
// Program Routes
Route::get('/program', [ProgramController::class, 'showProgramDashboard'])->name('program');
Route::get('/admin/add-module', [ProgramController::class, 'create'])->name('admin.createProgram');
Route::post('/admin/add-module', [ProgramController::class, 'store'])->name('admin.storeProgram');
Route::delete('/admin/programs/{id}', [ProgramController::class, 'destroy'])->name('admin.deleteProgram');



// Admin User Management Routes
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/admin/users/edit/{id}', [AdminController::class, 'editUser'])->name('admin.editUser');
Route::put('/admin/users/update/{id}', [AdminController::class, 'updateUser'])->name('admin.updateUser');
Route::delete('/admin/users/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');

// Admin Program Management Routes
Route::get('/admin/modules', [AdminController::class, 'modules'])->name('admin.modules');

// Admin Authentication Routes
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Admin Dashboard Routes
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users');


Route::get('/admin/modules', [ProgramController::class, 'modulesindex'])->name('admin.modules');




// Middleware Group for Admin
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/admin', [AdminController::class, 'admin'])->name('admin');
});

Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.createUser');
Route::post('/admin/users', [UserController::class, 'store'])->name('admin.storeUser');
Route::delete('/admin/users/delete/{id}', [UserController::class, 'destroy'])->name('admin.deleteUser');



//genarte id,password

Route::get('upload-teachers', [TeacherController::class, 'showForm'])->name('teacher.form');
Route::post('upload-teachers', [TeacherController::class, 'upload'])->name('teacher.upload');
Route::get('teachers-list', [TeacherController::class, 'showTeachers'])->name('teacher.list');
Route::get('teacher/{id}/edit-password', [TeacherController::class, 'editPassword'])->name('teacher.editPassword');
Route::post('teacher/{id}/update-password', [TeacherController::class, 'updatePassword'])->name('teacher.updatePassword');

Route::get('/teachers/export', [TeacherController::class, 'exportTeachers'])->name('teacher.export');

Route::get('/admin/modules/{id}/edit', [ProgramController::class, 'edit'])->name('admin.modules.edit');
Route::put('/admin/modules/{id}', [ProgramController::class, 'update'])->name('admin.modules.update');

Route::delete('/admin/modules/{id}', [ProgramController::class, 'destroy'])->name('admin.modules.destroy');

Route::get('/reports/create', [ReportController::class, 'create'])->name('reports.create');

Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');


Route::get('/manager/projectmanager', function () {
    return view('manager.projectmanager');
})->name('manager.projectmanager');


Route::get('/manager/activities', function () {
    return view('manager.activities');
})->name('activities.index');



Route::get('/manager/projectmanager', [usermanagerController::class, 'index'])->name('manager.projectmanager');

    Route::get('/usermanager', [usermanagerController::class, 'index'])->name('manager.usermanager');
    Route::get('/usermanager/create', [usermanagerController::class, 'create'])->name('manager.createUser');
    Route::post('/usermanager/store', [usermanagerController::class, 'store'])->name('manager.storeUser');
    Route::get('/usermanager/edit/{id}', [usermanagerController::class, 'edit'])->name('manager.editUser');
    Route::put('/usermanager/update/{id}', [usermanagerController::class, 'update'])->name('manager.updateUser');
    Route::delete('/usermanager/delete/{id}', [usermanagerController::class, 'destroy'])->name('manager.deleteUser');




  
        Route::get('/manger/activities', [ActivityController::class, 'index'])->name('manger.activities.index');
    
    



    Route::get('/manager/activities/create', [ActivityController::class, 'create'])->name('manager.activities.create');
    Route::post('/manager/activities', [ActivityController::class, 'store'])->name('manager.activities.store');

