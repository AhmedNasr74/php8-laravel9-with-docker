<?php

use App\Enums\AcceptedStatus;
use App\Http\Controllers\UserController;
use App\Models\City;
use App\Models\Country;
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

Route::get('/', fn() => view('welcome')); // arrow function

## Implicit Rout Binding (Enums Binding)
Route::get('/test/{status}', function (AcceptedStatus $status) {
    return "Hello " . $status->value; // will abort 404 if passed any value does not exist in the enum
});

## Forced Scope Of Route Binding
/*If I have passed a city id that doesn't belong to country id it will abort 404*/
/*You must apply naming conventions and model relation function*/
/*inside country model must contains cities function */
//it wil take city param and get its plural word and will search inside Country Model ([First | Parent] Route Param) for function with same name
//Note: You Must call scopeBindings function on Your Route
Route::get('country/{country}/city/{city}', fn(Country $country, City $city) => [$country, $city])->scopeBindings(); // style 1
Route::scopeBindings()->group(function () {
    Route::get('country/{country}/city/{city}', fn(Country $country, City $city) => [$country, $city]);
}); // style 2


## Controller Group Route
Route::controller(UserController::class)->prefix('users')->as('users.')->group(function () {
    Route::get('all', 'index')->name('index');
    Route::get('show/{user}', 'show')->name('show');

});

## Model Full text Search , depends on full text index applied on columns
//Reference : https://dev.mysql.com/doc/refman/8.0/en/fulltext-natural-language.html
Route::get('/articles', function () {
    return \App\Models\Articles::whereFullText('title', 'database')->orWhereFullText('body', 'database')->get();
});

## Inline Blade Rendering
Route::get('/inline/blade/rendering', fn() => Blade::render('<h1>Hello, {{ $name }}, You are {{ $age> 20 ? "Adult":"Child" }}</h1>', ['name' => 'Julian Bashir' , 'age' => 23]));
