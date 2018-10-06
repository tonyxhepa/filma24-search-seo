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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'Show\MovieController@welcome');
Route::resource('movies', 'Show\MovieController')->only('index', 'show');
Route::resource('series', 'Show\SerieController')->only('index', 'show');
Route::resource('series/{slug}/seasons', 'Show\SeasonController')->only('index', 'show');
Route::resource('episodes', 'Show\EpisodeController')->only('show');
Route::get('/genre/{slug}', 'Show\GenreController@showGenreBySlug')->name('showGenreBySlug');
Route::get('/search', 'Show\SearchController@index');
Route::post('/search', 'Show\SearchController@index');
Route::get('/DMCA', function () {
    return view('DMCA');
});
Route::get('/privacy', function () {
    return view('privacy');
});

Route::group([
    'middleware' => 'admin',
    'prefix' => 'admin'
], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');
    Route::resource('genre', 'Admin\GenreController');
    Route::resource('movie', 'Admin\MovieController');
    Route::resource('serie', 'Admin\SerieController');
    Route::resource('serie/{serie}/season', 'Admin\SeasonController');
    Route::resource('serie/{serie}/season/{season}/episode', 'Admin\EpisodeController');
    Route::post('movie/{id}/embeds', 'Admin\MovieController@addEmbed');
    Route::post('movie/{id}/watchlink', 'Admin\MovieController@addWatchlink');
    Route::post('movie/{id}/downloadlink', 'Admin\MovieController@addDownloadlink');
    Route::post('movie/{id}/trailerlink', 'Admin\MovieController@addTrailerlink');
    Route::post('serie/{serie}/season/{season}/episode/{id}/embed', 'Admin\EpisodeController@addEmbed');
    Route::post('serie/{serie}/season/{season}/episode/{id}/watchlink', 'Admin\EpisodeController@addWatchlink');
    Route::post('serie/{serie}/season/{season}/episode/{id}/downloadlink', 'Admin\EpisodeController@addDownloadlink');
    Route::post('serie/{serie}/season/{season}/episode/{id}/trailerlink', 'Admin\EpisodeController@addTrailerlink');
});
Route::delete('/embed/{id}', 'Admin\EmbedController@destroy');
Route::delete('/watchlink/{id}', 'Admin\WatchlinkController@destroy');
Route::delete('/downloadlink/{id}', 'Admin\DownloadlinkController@destroy');
Route::delete('/trailerlink/{id}', 'Admin\TrailerlinkController@destroy');