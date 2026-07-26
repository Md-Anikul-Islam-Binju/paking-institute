<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\JoinUsController;
use App\Http\Controllers\admin\LeadershipController;
use App\Http\Controllers\admin\OurGoalController;
use App\Http\Controllers\admin\OurGoalMemberController;
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

    //our goal member
    Route::get('/member-section', [OurGoalMemberController::class, 'index'])->name('member.section');
    Route::post('/member-store', [OurGoalMemberController::class, 'store'])->name('member.store');
    Route::put('/member-update/{id}', [OurGoalMemberController::class, 'update'])->name('member.update');
    Route::get('/member-delete/{id}', [OurGoalMemberController::class, 'destroy'])->name('member.destroy');

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/unauthorized-action', [AdminDashboardController::class, 'unauthorized'])->name('unauthorized.action');


    //Role and User Section
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);


});

require __DIR__.'/auth.php';
