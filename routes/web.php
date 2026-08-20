<?php

use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\AboutSliderController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\ApproachController;
use App\Http\Controllers\admin\CareerController;
use App\Http\Controllers\admin\ConferenceCategoryController;
use App\Http\Controllers\admin\ConferenceController;
use App\Http\Controllers\admin\ConferenceSubCategoryController;
use App\Http\Controllers\admin\CultureController;
use App\Http\Controllers\admin\ExpertCategoryController;
use App\Http\Controllers\admin\ExploreController;
use App\Http\Controllers\admin\ExploreVisionController;
use App\Http\Controllers\admin\FutureController;
use App\Http\Controllers\admin\HowWorkController;
use App\Http\Controllers\admin\InsightBookController;
use App\Http\Controllers\admin\InsightController;
use App\Http\Controllers\admin\InsightTypeController;
use App\Http\Controllers\admin\InvolvedController;
use App\Http\Controllers\admin\JoinUsController;
use App\Http\Controllers\admin\KeyBenefitController;
use App\Http\Controllers\admin\LeadershipController;
use App\Http\Controllers\admin\ManagementController;
use App\Http\Controllers\admin\NewsLetterController;
use App\Http\Controllers\admin\OurGoalController;
use App\Http\Controllers\admin\PartnershipController;
use App\Http\Controllers\admin\RadicalController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\SiteSettingController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\VisionController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InsightPageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WhatWeDoController;
use App\Http\Controllers\WhoWeAreController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [HomeController::class, 'index'])->name('home');
//conference
Route::get('/tbi-at-party-conferences', [HomeController::class, 'conference'])->name('conference');


//what we do
Route::get('/what-we-do/approach', [WhatWeDoController::class, 'approach'])->name('approach');
Route::get('/what-we-do/partnerships', [WhatWeDoController::class, 'partnership'])->name('partnership');
Route::get('/what-we-do/future-of-britain', [WhatWeDoController::class, 'future'])->name('future');
Route::get('/what-we-do/partnerships/{slug}', [WhatWeDoController::class, 'partnershipDetails'])->name('partnership.details');
Route::get('/what-we-do/{slug}', [WhatWeDoController::class, 'futureDetails'])->name('future.details');

//who we are
Route::get('/who-we-are/about', [WhoWeAreController::class, 'aboutUs'])->name('aboutUs');
Route::get('/who-we-are/executive-leadership', [WhoWeAreController::class, 'executiveLeadership'])->name('executiveLeadership');
Route::get('/who-we-are/career', [WhoWeAreController::class, 'career'])->name('career');

//expert
Route::get('/experts', [ExpertController::class, 'expert'])->name('expert');
Route::get('/experts/{slug}', [ExpertController::class, 'expertDetail'])->name('expert.details');


//insight
Route::get('/insights', [InsightPageController::class, 'insight'])->name('insight');
Route::get('/insights/{slug}', [InsightPageController::class, 'insightDetails'])->name('insight.details');



Route::middleware('auth')->group(callback: function () {


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


    //approach
    Route::get('/approach', [ApproachController::class, 'index'])->name('approach.section');
    Route::post('/approach-update/{id?}', [ApproachController::class, 'createOrUpdateApproach'])->name('approach.createOrUpdate');
    //how work
    Route::get('/how-work', [HowWorkController::class, 'index'])->name('how.work.section');
    Route::post('/how-work-update/{id?}', [HowWorkController::class, 'createOrUpdateHowWork'])->name('how.work.createOrUpdate');
    //partnership
    Route::get('/partnership', [PartnershipController::class, 'index'])->name('partnership.section');
    Route::post('/partnership-update/{id?}', [PartnershipController::class, 'createOrUpdatePartnership'])->name('partnership.createOrUpdate');


    //future
    Route::get('/future', [FutureController::class, 'index'])->name('future.section');
    Route::post('/future-update/{id?}', [FutureController::class, 'createOrUpdateFuture'])->name('future.createOrUpdate');
    //radical
    Route::get('/radical', [RadicalController::class, 'index'])->name('radical.section');
    Route::post('/radical-update/{id?}', [RadicalController::class, 'createOrUpdateRadical'])->name('radical.createOrUpdate');



    //slider home page
    Route::get('/slider', [SliderController::class, 'index'])->name('slider.section');
    Route::post('/slider-update/{id?}', [SliderController::class, 'createOrUpdateSlider'])->name('slider.createOrUpdate');

    //setting
    Route::get('/setting', [SettingController::class, 'index'])->name('setting.section');
    Route::post('/setting-update/{id?}', [SettingController::class, 'createOrUpdateSetting'])->name('setting.createOrUpdate');


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


    //insight
    Route::get('/insight-section', [InsightController::class, 'index'])->name('insight.section');
    Route::post('/insight-store', [InsightController::class, 'store'])->name('insight.store');
    Route::put('/insight-update/{id}', [InsightController::class, 'update'])->name('insight.update');
    Route::get('/insight-delete/{id}', [InsightController::class, 'destroy'])->name('insight.destroy');


    //insight book
    Route::get('/insight-book-section', [InsightBookController::class, 'index'])->name('insight.book.section');
    Route::post('/insight-book-store', [InsightBookController::class, 'store'])->name('insight.book.store');
    Route::put('/insight-book-update/{id}', [InsightBookController::class, 'update'])->name('insight.book.update');
    Route::get('/insight-book-delete/{id}', [InsightBookController::class, 'destroy'])->name('insight.book.destroy');


    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/unauthorized-action', [AdminDashboardController::class, 'unauthorized'])->name('unauthorized.action');


    //involved
    Route::get('/involved-section', [InvolvedController::class, 'index'])->name('involved.section');
    Route::post('/involved-store', [InvolvedController::class, 'store'])->name('involved.store');
    Route::put('/involved-update/{id}', [InvolvedController::class, 'update'])->name('involved.update');
    Route::get('/involved-delete/{id}', [InvolvedController::class, 'destroy'])->name('involved.destroy');

    //key benefit
    Route::get('/key-benefit-section', [KeyBenefitController::class, 'index'])->name('key.benefit.section');
    Route::post('/key-benefit-store', [KeyBenefitController::class, 'store'])->name('key.benefit.store');
    Route::put('/key-benefit-update/{id}', [KeyBenefitController::class, 'update'])->name('key.benefit.update');
    Route::get('/key-benefit-delete/{id}', [KeyBenefitController::class, 'destroy'])->name('key.benefit.destroy');

    //explore
    Route::get('/explore-section', [ExploreController::class, 'index'])->name('explore.section');
    Route::post('/explore-store', [ExploreController::class, 'store'])->name('explore.store');
    Route::put('/explore-update/{id}', [ExploreController::class, 'update'])->name('explore.update');
    Route::get('/explore-delete/{id}', [ExploreController::class, 'destroy'])->name('explore.destroy');


    //explore vision
    Route::get('/explore-vision-section', [ExploreVisionController::class, 'index'])->name('explore.vision.section');
    Route::post('/explore-vision-store', [ExploreVisionController::class, 'store'])->name('explore.vision.store');
    Route::put('/explore-vision-update/{id}', [ExploreVisionController::class, 'update'])->name('explore.vision.update');
    Route::get('/explore-vision-delete/{id}', [ExploreVisionController::class, 'destroy'])->name('explore.vision.destroy');

    //conference category
    Route::get('/conference-category-section', [ConferenceCategoryController::class, 'index'])->name('conference.category.section');
    Route::post('/conference-category-store', [ConferenceCategoryController::class, 'store'])->name('conference.category.store');
    Route::put('/conference-category-update/{id}', [ConferenceCategoryController::class, 'update'])->name('conference.category.update');
    Route::get('/conference-category-delete/{id}', [ConferenceCategoryController::class, 'destroy'])->name('conference.category.destroy');


    //conference sub category
    Route::get('/conference-sub-category-section', [ConferenceSubCategoryController::class, 'index'])->name('conference.sub.category.section');
    Route::post('/conference-sub-category-store', [ConferenceSubCategoryController::class, 'store'])->name('conference.sub.category.store');
    Route::put('/conference-sub-category-update/{id}', [ConferenceSubCategoryController::class, 'update'])->name('conference.sub.category.update');
    Route::get('/conference-sub-category-delete/{id}', [ConferenceSubCategoryController::class, 'destroy'])->name('conference.sub.category.destroy');


    //conference
    Route::get('/conference-section', [ConferenceController::class, 'index'])->name('conference.section');
    Route::post('/conference-store', [ConferenceController::class, 'store'])->name('conference.store');
    Route::put('/conference-update/{id}', [ConferenceController::class, 'update'])->name('conference.update');
    Route::get('/conference-delete/{id}', [ConferenceController::class, 'destroy'])->name('conference.destroy');


    //news letter
    Route::get('/news-letter-section', [NewsLetterController::class, 'index'])->name('news.letter.section');
    Route::post('/news-letter-store', [NewsLetterController::class, 'store'])->name('news.letter.store');
    Route::put('/news-letter-update/{id}', [NewsLetterController::class, 'update'])->name('news.letter.update');
    Route::get('/news-letter-delete/{id}', [NewsLetterController::class, 'destroy'])->name('news.letter.destroy');


    //site setting
    Route::get('/site-setting-section', [SiteSettingController::class, 'index'])->name('site.setting.section');
    Route::post('/site-setting-store', [SiteSettingController::class, 'store'])->name('site.setting.store');
    Route::put('/site-setting-update/{id}', [SiteSettingController::class, 'update'])->name('site.setting.update');
    Route::get('/site-setting-delete/{id}', [SiteSettingController::class, 'destroy'])->name('site.setting.destroy');

    //About Slider
    Route::get('/about-slider', [AboutSliderController::class, 'index'])->name('about.slider');
    Route::post('/about-slider/store', [AboutSliderController::class, 'store'])->name('about.slider.store');
    Route::put('/about-slider/update/{id}', [AboutSliderController::class, 'update'])->name('about.slider.update');
    Route::get('/about-slider/destroy/{id}', [AboutSliderController::class, 'destroy'])->name('about.slider.destroy');

    Route::get('/conference-category/{id}',[ConferenceController::class,'getCategories'])->name('conference.category');
    Route::get('/conference-sub-category/{id}',[ConferenceController::class,'getSubCategories'])->name('conference.sub.category');

    //Role and User Section
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);


});

require __DIR__.'/auth.php';
