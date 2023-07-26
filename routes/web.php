<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserEducationController;
use App\Http\Controllers\UserPreferenceController;
use App\Models\City;
use App\Models\UserEducation;
use App\Models\Preference;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();
    $cities = City::all();
    $datenow = Carbon::now();
    $ageallowed = $datenow->add(-18, 'year');
    return view('dashboard', get_defined_vars());
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('user-educations',  UserEducationController::class);
    Route::get('preference', [UserPreferenceController::class, 'data_get'])->name('preference-get');
    // Route::post('preference-store', [UserPreferenceController::class, 'store'])->name('preference-store');
    Route::post('preference-store', [UserPreferenceController::class, 'store'])->name('preference-store');



});

require __DIR__.'/auth.php';
