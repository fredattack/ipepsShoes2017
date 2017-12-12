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

Route::get('/laravel', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/login/{service}', 'GoogleController@redirectToProvider')->name('googleLogin');
Route::get('/login/{service}/callback', 'GoogleController@handleProviderCallback');


Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| shop Routes
|--------------------------------------------------------------------------
|
|
*/
Route::get('/', 'ModeleController@shopIndex')->name('shop');
Route::get('/shop/femme', 'ModeleController@shopIndexFemme')->name('shopFemme');
Route::get('/shop/enfant', 'ModeleController@shopIndexEnfant')->name('shopEnfant');
Route::get('/shop/homme', 'ModeleController@shopIndexHomme')->name('shopHomme');
Route::get('/shop/{id}', 'ShoeController@show')->name('show');
Route::get('/Brand/{id}', 'ModeleController@brandList')->name('brand');
Route::get('/cart', 'CartController@show')->name('cart');
Route::post('/cart', 'CartController@storeInSession')->name('cartStoreInSession');
Route::get('/cartPlus/{id}/{quantity}', 'CartController@cartUpdatePlus')->name('cartUpdatePlus');
Route::get('/cartMinus/{id}/{quantity}', 'CartController@cartUpdateMinus')->name('cartUpdateMinus');
Route::get('/cart/{id}', 'CartController@destroy')->name('cartDestroy');
Route::get('/checkOut', 'CheckOutController@show')->name('checkOut');
Route::get('/checkOutAdress', 'CheckOutController@showCart')->name('checkOutAdress');
Route::get('/checkOutCart', 'CheckOutController@showPaiement')->name('checkOutCart');
Route::get('/PayOut', 'CheckOutController@makePaiement')->name('payOut');

Route::get('/user/{id}', 'UserController@showFront')->name('showFront');

Route::get('/userInfo/{id}', 'UserController@showUserInfo')->name('showUserInfo');
Route::get('/userOrder/{id}', 'OrderController@showListFront')->name('showListFront');
Route::get('/userAdress/{id}', 'AdressController@showAdressListFront')->name('showAdressListFront');
Route::get('/userDefaultAdress/{id}', 'AdressController@userDefaultAdress')->name('userDefaultAdress');
Route::post('/userUpdate/{id}', 'UserController@updateFront')->name('updateUser');
Route::get('/ChangePassword', function () {
    return view('shop.user.ChangePassword');
})->name('ChangePassword');
Route::post('/updatePassword', 'UserController@updatePassword')->name('updatePassword');


Route::get('/order/{id}', 'OrderController@showFront')->name('showOrderFront');
Route::get('/contact', 'ContactController@show')->name('contact');
Route::post('/sendMessage', 'ContactController@sendMessage')->name('sendMessage');
Route::resource('adress', 'AdressController');

/*
 * Paypal
 *
 */

Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'AddMoneyController@payWithPaypal',));
Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'AddMoneyController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'payment.status','uses' => 'AddMoneyController@getPaymentStatus',));


/*

|--------------------------------------------------------------------------
| adminPanel Routes
|--------------------------------------------------------------------------
|
|
*/

Route::group(['prefix'=>'admin','middleware' => 'admin'],function (){

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
    Route::get('settings/product', 'AdminController@settingsProduct')->name('settingsProduct');
    Route::get('/stock/{shoe}', 'shoeController@stock')->name('stock');
    Route::post('/stockUpdate', 'shoeController@stockUpdate')->name('stockUpdate');
    Route::get('Enfant', 'ModeleController@indexEnfant')->name('indexEnfant');
    Route::get('Homme', 'ModeleController@indexHomme')->name('indexHomme');
    Route::get('Femme', 'ModeleController@indexFemme')->name('indexFemme');
    Route::get('upDateReduction',['uses'=>'ModeleController@upDateReduction', 'as'=>'upDateReduction']);
    Route::get('upDateRole',['uses'=>'UserController@upDateRole', 'as'=>'upDateRole']);
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('/excel/{type}', 'ExcelController@downloadExcel')->name('downloadExcel');

});
