<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;
use Wave\Facades\Wave;
use App\Http\Controllers\ProjectController;

// Authentication routes
Auth::routes();

// Voyager Admin routes
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Wave routes
Wave::routes();

/***** Start BrandBuilder Routes *****/
//Dashboard Onboarding
Route::get('onboarding/{step?}', '\App\Http\Controllers\Auth\RegisterController@dashboardOnboarding')->name('dashboard-onboarding');

//Projects Routes
Route::post('settings/project-types', '\App\Http\Controllers\ProjectController@storeType');
Route::get('settings/project-types/{id}', '\App\Http\Controllers\ProjectController@projectType');

Route::get('projects/create', 'App\Http\Controllers\ProjectController@create')->name('projects.create');
Route::post('projects/clients/store', 'App\Http\Controllers\ProjectController@saveClient')->name('projects.clients.store');
Route::post('projects/clients/get', 'App\Http\Controllers\ProjectController@getUserClients')->name('projects.get-user-clients');
Route::get('projects-types', 'App\Http\Controllers\ProjectController@getProjectTypes');
Route::post('projects/store', 'App\Http\Controllers\ProjectController@saveProject')->name('projects.store');

//openai Routes
Route::post('openai/completions', '\App\Http\Controllers\OpenAiController@completions');

/***** End BrandBuilder Routes *****/
