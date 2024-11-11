<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EducationalController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ImageController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('personal', function () {
    $personal = App\Models\Personal::all();
    return view('personal', compact('personal'));
})->name('personal.index');


Route::get('educational', [EducationalController::class, 'index']); // ใช้ SchoolController


Route::get('company', function () {
    $company = App\Models\Company::all();
    return view('company', compact('company'));
})->name('company.index');

Route::get('project', function () {
    $projects = App\Models\Project::all();
    return view('project', compact('projects'));
})->name('projects.index');

// หน้าแก้ไข
Route::get('edit', function () {
    return view('edit');
});




// เส้นทางสำหรับหน้าแก้ไขข้อมูลส่วนตัวและที่อยู่
Route::get('/edit-personal', [PersonalController::class, 'edit'])->name('personal.edit');
Route::put('/edit-personal', [PersonalController::class, 'update'])->name('personal.update');
Route::post('/upload-image', [ImageController::class, 'upload'])->name('upload.image');




// เส้นทางสำหรับหน้าแก้ไขข้อมูลส่วนตัวและที่อยู่
Route::get('edit-educational', [EducationalController::class, 'edit'])->name('educational.edit');
Route::put('edit-educational', [EducationalController::class, 'update'])->name('educational.update');
Route::delete('delete-educational/{id}', [EducationalController::class, 'delete'])->name('educational.delete');











Route::get('edit-company', [CompanyController::class, 'edit'])->name('company.edit');
Route::put('edit-company', [CompanyController::class, 'update'])->name('company.update');
Route::delete('delete-company/{id}', [CompanyController::class, 'destroy'])->name('company.delete');






Route::get('edit-project', [ProjectController::class, 'edit'])->name('projects.edit');
Route::put('edit-project', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('delete-project/{id}', [ProjectController::class, 'destroy'])->name('projects.delete');


