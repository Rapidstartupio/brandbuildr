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
    Route::get('project-importer', 'App\Http\Controllers\ProjectController@importer')->middleware('admin.user')->name('admin.project-importer');
    Route::post('project-importer', 'App\Http\Controllers\ProjectController@uploadImporter')->middleware('admin.user');
});



/***** Start BrandBuilder Routes *****/
//Dashboard Onboarding
Route::get('onboarding/{step?}', '\App\Http\Controllers\Auth\RegisterController@dashboardOnboarding')->name('dashboard-onboarding');

//Projects Routes

//Brandbuilder Project routes
Route::group(['prefix' => 'projects'], function () {
    Route::get('/', '\App\Http\Controllers\ProjectController@index')->name('projects.index');
    Route::get('/create', 'App\Http\Controllers\ProjectController@create')->name('projects.create');
    Route::post('/clients/store', 'App\Http\Controllers\ProjectController@saveClient')->name('projects.clients.store');
    Route::post('/clients/get', 'App\Http\Controllers\ProjectController@getUserClients')->name('projects.get-user-clients');
    Route::post('/store', 'App\Http\Controllers\ProjectController@saveProject')->name('projects.store');
    Route::get('/clients', 'App\Http\Controllers\ClientController@index')->name('clients.index');
    Route::get('/clients/create', 'App\Http\Controllers\ClientController@create')->name('clients.create');
    Route::get('/clients/{id}', 'App\Http\Controllers\ClientController@client')->name('clients.page');
    Route::get('/project-types', 'App\Http\Controllers\ProjectController@projectTypes')->name('projects.project-types');
    Route::post('/{id}/get', 'App\Http\Controllers\ProjectController@getUserProject')->name('projects.get-user-project');
    Route::get('/deadlines', '\App\Http\Controllers\DashboardController@deadlines')->name('projects.deadlines');
    Route::post('/add-question-note', 'App\Http\Controllers\ProjectController@addQuestionNote')->name('projects.add-question-note');
    Route::post('/update-question-note', 'App\Http\Controllers\ProjectController@updateQuestionNote')->name('projects.update-question-note');
    Route::post('/delete-question-note', 'App\Http\Controllers\ProjectController@deleteQuestionNote')->name('projects.delete-question-note');
});

Route::group(['prefix' => 'project'], function () {
    Route::get('/{id}', 'App\Http\Controllers\ProjectController@project')->name('project.details');
    Route::get('/{id}/section/{sectionId}/block/{blockId}/ai-assist/{review?}', 'App\Http\Controllers\ProjectController@projectAiAssist')->name('project.ai-assist');
    Route::post('/{id}/section/{sectionId}/block/{blockId}/ai-assist', 'App\Http\Controllers\ProjectController@projectAiAssistData');
    Route::get('/{id}/documents', 'App\Http\Controllers\ProjectController@projectDocuments')->name('project.documents');
});
//Brandbuilder Dashboard routes
Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/strategy-hub/explore-strategies', '\App\Http\Controllers\DashboardController@exploreStrategies')->name('dashboard.strategy-hub.explore-strategies');
    Route::get('/get-started', '\App\Http\Controllers\DashboardController@getStarted')->name('dashboard.get-started');
});
//Onboarding Route
Route::get('/init-onboarding', 'App\Http\Controllers\ProjectController@initOnboarding')->name('init-onboarding');

Route::post('settings/project-types', '\App\Http\Controllers\ProjectController@storeType');
Route::get('settings/project-types/{id}', '\App\Http\Controllers\ProjectController@projectType');

Route::get('projects-types', 'App\Http\Controllers\ProjectController@getProjectTypes');

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
