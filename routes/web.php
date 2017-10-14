<?php

use App\Http\Middleware\admin;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| adminPanel Routes
|--------------------------------------------------------------------------
|
|
*/

Route::group(['prefix'=>'admin'],function (){

Route::resource('shoe', 'shoeController');
Route::resource('modele', 'ModeleController');
    Route::resource('size', 'sizeController');
    Route::resource('gender', 'genderController');
    Route::resource('brand', 'BrandController');
    Route::resource('order', 'OrderController');
    Route::resource('orderline', 'OrderLineController');
    Route::resource('user', 'UserController');
    Route::resource('reduction', 'reductionController');
    Route::resource('type', 'TypeController');
    Route::resource('shipment', 'shipmentController');
    Route::resource('adress', 'AdressController');
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('settings/product', 'AdminController@settingsProduct')->name('settingsProduct');
    Route::get('/stock/{shoe}', 'shoeController@stock')->name('stock');
    Route::post('/stockUpdate', 'shoeController@stockUpdate')->name('stockUpdate');
    Route::get('Enfant', 'ModeleController@indexEnfant')->name('indexEnfant');
    Route::get('Homme', 'ModeleController@indexHomme')->name('indexHomme');
    Route::get('Femme', 'ModeleController@indexFemme')->name('indexFemme');
    Route::get('upDateReduction',['uses'=>'ModeleController@upDateReduction', 'as'=>'upDateReduction']);


});
