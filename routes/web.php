<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\CareerController;
use App\Http\Controllers\admin\CultureController;
use App\Http\Controllers\admin\ExpertCategoryController;
use App\Http\Controllers\admin\InsightTypeController;
use App\Http\Controllers\admin\JoinUsController;
use App\Http\Controllers\admin\LeadershipController;
use App\Http\Controllers\admin\ManagementController;
use App\Http\Controllers\admin\OurGoalController;
use App\Http\Controllers\admin\VisionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(callback: function () {

    //who we are
    //About
    Route::get('/about', [AboutController::class, 'index'])->name('about.section');
    Route::post('/about-update/{id?}', [AboutController::class, 'createOrUpdateAbout'])->name('about.createOrUpdate');
    //vision
    Route::get('/vision', [VisionController::class, 'index'])->name('vision.section');
    Route::post('/vision-update/{id?}', [VisionController::class, 'createOrUpdateVision'])->name('vision.createOrUpdate');
    //join us
    Route::get('/join', [JoinUsController::class, 'index'])->name('join.section');
    Route::post('/join-update/{id?}', [JoinUsController::class, 'createOrUpdateJoin'])->name('join.createOrUpdate');
    //leadership
    Route::get('/leadership', [LeadershipController::class, 'index'])->name('leadership.section');
    Route::post('/leadership-update/{id?}', [LeadershipController::class, 'createOrUpdateLeadership'])->name('leadership.createOrUpdate');
    //our goal
    Route::get('/goal', [OurGoalController::class, 'index'])->name('goal.section');
    Route::post('/goal-update/{id?}', [OurGoalController::class, 'createOrUpdateGoal'])->name('goal.createOrUpdate');

    //our goal
    Route::get('/career', [CareerController::class, 'index'])->name('career.section');
    Route::post('/career-update/{id?}', [CareerController::class, 'createOrUpdateCareer'])->name('career.createOrUpdate');
    //culture
    Route::get('/culture', [CultureController::class, 'index'])->name('culture.section');
    Route::post('/culture-update/{id?}', [CultureController::class, 'createOrUpdateCulture'])->name('culture.createOrUpdate');

    //expert category
    Route::get('/expert-category-section', [ExpertCategoryController::class, 'index'])->name('expert.category.section');
    Route::post('/expert-category-store', [ExpertCategoryController::class, 'store'])->name('expert.category.store');
    Route::put('/expert-category-update/{id}', [ExpertCategoryController::class, 'update'])->name('expert.category.update');
    Route::get('/expert-category-delete/{id}', [ExpertCategoryController::class, 'destroy'])->name('expert.category.destroy');


    //management board
    Route::get('/management-section', [ManagementController::class, 'index'])->name('management.section');
    Route::post('/management-store', [ManagementController::class, 'store'])->name('management.store');
    Route::put('/management-update/{id}', [ManagementController::class, 'update'])->name('management.update');
    Route::get('/management-delete/{id}', [ManagementController::class, 'destroy'])->name('management.destroy');

    //insight type
    Route::get('/insight-type-section', [InsightTypeController::class, 'index'])->name('insight.type.section');
    Route::post('/insight-type-store', [InsightTypeController::class, 'store'])->name('insight.type.store');
    Route::put('/insight-type-update/{id}', [InsightTypeController::class, 'update'])->name('insight.type.update');
    Route::get('/insight-type-delete/{id}', [InsightTypeController::class, 'destroy'])->name('insight.type.destroy');



    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/unauthorized-action', [AdminDashboardController::class, 'unauthorized'])->name('unauthorized.action');


    //Role and User Section
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);


});

require __DIR__.'/auth.php';
