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



/***** Start BrandBuilder Routes *****/
//Dashboard Onboarding
Route::get('onboarding/{step?}', '\App\Http\Controllers\Auth\RegisterController@dashboardOnboarding')->name('dashboard-onboarding');

//Projects Routes

//Brandbuilder Project routes
Route::group(['prefix' => 'projects'], function () {
    Route::get('/', '\App\Http\Controllers\ProjectController@index')->name('projects.index');
});

Route::post('settings/project-types', '\App\Http\Controllers\ProjectController@storeType');
Route::get('settings/project-types/{id}', '\App\Http\Controllers\ProjectController@projectType');

Route::get('projects/create', 'App\Http\Controllers\ProjectController@create')->name('projects.create');
Route::post('projects/clients/store', 'App\Http\Controllers\ProjectController@saveClient')->name('projects.clients.store');
Route::post('projects/clients/get', 'App\Http\Controllers\ProjectController@getUserClients')->name('projects.get-user-clients');
Route::get('projects-types', 'App\Http\Controllers\ProjectController@getProjectTypes');
Route::post('projects/store', 'App\Http\Controllers\ProjectController@saveProject')->name('projects.store');

Route::get('project/{id}', 'App\Http\Controllers\ProjectController@project')->name('project.details');
Route::get('project/{id}/section/{sectionId}/block/{blockId}/ai-assist', 'App\Http\Controllers\ProjectController@projectAiAssist')->name('project.ai-assist');
Route::post('projects/{id}/get', 'App\Http\Controllers\ProjectController@getUserProject')->name('projects.get-user-project');
Route::post('project/{id}/section/{sectionId}/block/{blockId}/ai-assist', 'App\Http\Controllers\ProjectController@projectAiAssistData');
Route::post('submit-project-answers', 'App\Http\Controllers\ProjectController@submitBlock');
//Route::get('question-by-id/{id}', 'App\Http\Controllers\ProjectController@questionById');
Route::post('download-project-document', 'App\Http\Controllers\ProjectController@downloadProjectDocument')->name('download-project-document');
//Route::get('download-project-document', 'App\Http\Controllers\ProjectController@downloadProjectDocument');

//openai Routes
Route::post('openai/completions', '\App\Http\Controllers\OpenAiController@completions');
Route::post('openai/chat', '\App\Http\Controllers\OpenAiController@chat');
/***** End BrandBuilder Routes *****/

//override media upload
// Route::post('admin/media/upload', function () {
//     abort(404);
// })->name('voyager.media.upload');
// Route::post('admin/media/rename_file', function () {
//     abort(404);
// })->name('voyager.media.rename');


//Brandbuilder settings
Route::group(['prefix' => 'settings'], function () {
    Route::get('/white-label', '\App\Http\Controllers\SettingsController@whiteLabel')->name('settings.white-label');
    Route::post('/white-label', '\App\Http\Controllers\SettingsController@saveWhiteLabel');
});

// Wave routes
Wave::routes();
