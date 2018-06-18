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


use Log;

Route::get('/', function () {
    // return view('welcome');
    return view('vvveb/editor');
});
Route::post('/', 'FlightController@exportHtml');


// Route::get('/fileshow', 'FlightController@fileShow');


Route::get('/fileshow', function ()
{
    $path = storage_path('app/storage/file.html');

    if (!File::exists($path)) {
        Log::error('here');
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});


Route::get('demos/sortabledatatable','FlightController@showDatatable');
// Route::post('demos/sortabledatatable','FlightController@updateOrder');
Route::post('demos/sortabledatatable','FlightController@updateHtml');


