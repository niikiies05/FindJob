<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\JobadminController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobtypeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalarytypeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('change/lang', [LocalizationController::class, "lang_change"])->name('LangChange');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {

});

Route::get('/admin-dashboard', [ChartController::class, 'index'])->name('admin.index');

Route::resource('users', UserController::class)->middleware('App\Http\Middleware\UserStatus');
Route::get('/update-user-status', [UserController::class, 'updateUserStatus'])->name('user.update_status');
Route::get('/showThisUser/{id}', [UserController::class, 'showThisUser'])->name('users.showThis');


Route::resource('jobs', JobController::class);
// Route::get('pagination/fetch_data', 'PaginationController@fetch_data');
Route::get('/pagination/fetch_data', [JobController::class, 'fetch_data']);
// Route::get('pagination/fetch_data', 'PaginationController@fetch_data');



Route::get('/update-job-status', [JobController::class, 'updateJobStatus'])->name('job.update_status');
Route::put('/BoostAds/{id}', [JobController::class, 'boostAds'])->name('job.boost');

Route::post('/like', [JobController::class, 'like'])->name('jobs.like');
Route::get('/jobs/category/{id}', [JobController::class, 'findByCategory'])->name('jobs.category');

Route::get('/search-job', [SearchController::class, 'searchJob'])->name('jobs.searchitems');
Route::get('/search-job-price', [SearchController::class, 'searchJobPriceBetween'])->name('jobs.searchBetween');
Route::get('/search-job-home', [SearchController::class, 'homeSearch'])->name('jobs.searchHome');

Route::get('/searchJobs', [SearchController::class, 'searchJobs']);
Route::get('/mainSearch', [SearchController::class, 'mainSearch']);




Route::resource('jobsAdmin', JobadminController::class);

Route::resource('roles', RoleController::class)->middleware('App\Http\Middleware\UserStatus');
Route::resource('permissions', PermissionController::class)->middleware('App\Http\Middleware\UserStatus');

Route::resource('categories', CategoryController::class);
Route::resource('jobTypes', JobtypeController::class);
Route::resource('salaryTypes', SalarytypeController::class);

Route::resource('/countries', CountryController::class);
Route::resource('/regions', RegionController::class);
Route::resource('/cities', CityController::class);

Route::get('/account-personnal-home', [ProfileController::class, 'index'])->name('personnal-home');
Route::put('/account-personnal-home/{id}', [ProfileController::class, 'updatepersonnal'])->name('personnal.update');
Route::put('/account-update-password/{id}', [ProfileController::class, 'updatepassword'])->name('password.update');
Route::delete('/account-deleteAds/{id}', [ProfileController::class, 'deletefavorite'])->name('favorite.delete');



Route::get('/account-my-ads', [ProfileController::class, 'myads'])->name('my-ads');
Route::get('/account-my-favorites-ads', [ProfileController::class, 'favoritesads'])->name('favorites-ads');
Route::get('/account-my-pending-ads', [ProfileController::class, 'pendingads'])->name('pending-ads');
Route::get('/account-alert', [ProfileController::class, 'alert'])->name('ads.alert');

