<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');


Route::get('/test', function () {
    return view('test');
});
Route::get('/dashboard', 'App\Http\Controllers\FirebaseController@index')->name('index');
Route::get('/orders', 'App\Http\Controllers\FirebaseController@getOrders')->name('orders');
Route::get('/vendors', 'App\Http\Controllers\FirebaseController@getVendors')->name('vendors');
Route::get('/invoices', 'App\Http\Controllers\FirebaseController@invoices')->name('invoices');
Route::get('/vieworder/{id}', 'App\Http\Controllers\FirebaseController@vieworder')->name('vieworder');
Route::get('/customers', 'App\Http\Controllers\FirebaseController@getCustomers')->name('customers');
Route::get('/viewvendor/{id}', 'App\Http\Controllers\FirebaseController@viewvendor')->name('viewvendor');
Route::get('/viewcustomer/{id}', 'App\Http\Controllers\FirebaseController@viewcustomer')->name('viewcustomer');
Route::get('/viewvendor/{id}/{value}', 'App\Http\Controllers\FirebaseController@changeVendorStatus')->name('viewvendor');
Route::get('/deletecity/{id}/', 'App\Http\Controllers\FirebaseController@deletecity')->name('deletecity');
Route::get('/serviceslist/', 'App\Http\Controllers\FirebaseController@serviceslist')->name('serviceslist');
Route::get('/addservice/', 'App\Http\Controllers\FirebaseController@addservice')->name('addservice');
Route::get('/addvendor/', 'App\Http\Controllers\FirebaseController@addvendor')->name('addvendor');
Route::get('/viewinvoice/{id}/', 'App\Http\Controllers\FirebaseController@viewinvoice')->name('viewinvoice');
Route::get('/viewservice/{id}/', 'App\Http\Controllers\FirebaseController@viewservice')->name('viewservice');
Route::get('/deleteservice/{id}/', 'App\Http\Controllers\FirebaseController@deleteservice')->name('deleteservice');
Route::get('/deletesubservice/{id}/', 'App\Http\Controllers\FirebaseController@deletesubservice')->name('deletesubservice');
Route::get('/settings', 'App\Http\Controllers\FirebaseController@settings')->name('settings');
Route::get('/chartt', 'App\Http\Controllers\ChartsController@renderChart')->name('renderChart');

Route::get('/reports', function () {
    return view('reports');
});
Route::get('/ordercomparison', function () {
    return view('ordercomparison');
});

Route::post('/savecommision', 'App\Http\Controllers\FirebaseController@savecommision')->name('savecommision');
Route::post('/savevendor', 'App\Http\Controllers\FirebaseController@savevendor')->name('savevendor');
Route::post('/savenewvendor', 'App\Http\Controllers\FirebaseController@savenewvendor')->name('savenewvendor');
Route::post('/saveservice', 'App\Http\Controllers\FirebaseController@saveservice')->name('saveservice');
Route::post('/editservice', 'App\Http\Controllers\FirebaseController@editservice')->name('editservice');
Route::post('/addcity', 'App\Http\Controllers\FirebaseController@addcity')->name('addcity');
Route::post('/savesterms', 'App\Http\Controllers\FirebaseController@savesterms')->name('savesterms');
Route::post('/addsubservice', 'App\Http\Controllers\FirebaseController@addsubservice')->name('addsubservice');
Route::get('/servicemen', 'App\Http\Controllers\FirebaseController@getServicemen')->name('servicemen');

