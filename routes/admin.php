<?php

use App\Http\Controllers\Admin\AlternativeOptionController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CuratorWithdrawalRequest;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\NursingRecruitmentController;
use App\Http\Controllers\Admin\OfferTypeController;
use App\Http\Controllers\Admin\SendDirectOfferController;
use App\Http\Controllers\Admin\SubmitWorkController;
use App\Http\Controllers\Admin\TestimonialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ArtistController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\CuratorController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SystemUserController;
use App\Http\Controllers\Admin\TicketHelpController;
use App\Http\Controllers\Admin\ArtistFeatureController;
use App\Http\Controllers\Admin\CuratorFeatureController;

Route::group(['as' => 'admin.','middleware' => ['auth','verify_if_admin']], function() {
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('profile', [DashboardController::class,'profile'])->name('profile');
    Route::post('update-profile/{profile}', [DashboardController::class,'storeProfile'])->name('update.profile');
    Route::get('nursing-recruitments',[NursingRecruitmentController::class, 'index'])->name('nursing.recruitments');
    Route::get('show-nursing-recruitment/{id}',[NursingRecruitmentController::class, 'show'])->name('show.nursing.recruitments');
});


