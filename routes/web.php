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

//========================================== Login =====================================================================
Route::get('/', 'RegisterController@Login');

Route::post('/','RegisterController@StoreLogin');

Route::get('signup', 'RegisterController@Signup');

Route::post('signup','RegisterController@StoreAccount');

//========================================== Dashboard =================================================================

Route::get('dashboard', 'DashboardController@index');

Route::get('instansi', 'DashboardController@index_instansi');

Route::get('toko', 'DashboardController@index_toko');

//========================================= Profil Instansi ============================================================

Route::get('profileInstansi', 'InstanceController@index');

Route::get('profilInstansi', 'InstanceController@create');

Route::post('profilInstansi', 'InstanceController@store');

Route::get('editInstansi/{id}/edit','InstanceController@edit');

Route::put('profilInstansi/{id}/update','InstanceController@update');

//========================================== Buat Akun =================================================================

Route::get('createAccount', 'UserInstanceController@index');

Route::get('newAccount', 'UserInstanceController@create');

Route::post('newAccount', 'UserInstanceController@store');

Route::get('newAccount/{id}/edit', 'UserInstanceController@edit');

Route::put('newAccount/{id}/edit', 'UserInstanceController@update');

Route::delete('newAccount/{id}/delete', 'UserInstanceController@destroy');

//========================================= Tahun Anggaran =============================================================

Route::get('fiscalyears', 'FiscalyearsControllers@index');

Route::get('fiscalyears/create', 'FiscalyearsControllers@create');

Route::post('fiscalyears/create', 'FiscalyearsControllers@store');

Route::get('fiscalyears/{id}/edit', 'FiscalyearsControllers@edit');

Route::put('fiscalyears/{id}/edit', 'FiscalyearsControllers@update');

Route::put('fiscalyears/{id}/destroy', 'FiscalyearsControllers@destroy');

//========================================= Jenis Barang ===============================================================

Route::get('typeOfGoods', 'typeOfGoodsController@index');

Route::get('typeOfGoods/create', 'typeOfGoodsController@create');

Route::post('typeOfGoods/create', 'typeOfGoodsController@store');

Route::get('typeOfGoods/{id}/edit', 'typeOfGoodsController@edit');

Route::put('typeOfGoods/{id}/edit', 'typeOfGoodsController@update');

Route::put('typeOfGoods/{id}/delete', 'typeOfGoodsController@destroy');

//========================================= Suppliers ==================================================================

Route::get('suppliers', 'SuppliersController@index');

Route::get('suppliers/create', 'SuppliersController@create');

Route::post('suppliers/create', 'SuppliersController@store');

Route::get('suppliers/{id}/edit','SuppliersController@edit');

Route::put('suppliers/{id}/edit','SuppliersController@update');

Route::put('suppliers/{id}/delete', 'SuppliersController@destroy');

//=========================================== Barang ===================================================================

Route::get('warehouse','WarehouseController@index');

Route::get('warehouse/create','WarehouseController@create');

Route::post('warehouse/create','WarehouseController@store');

Route::get('warehouse/{id}/edit','WarehouseController@edit');

Route::put('warehouse/{id}/edit','WarehouseController@update');

Route::put('warehouse/{id}/delete','WarehouseController@delete');

//=========================================== SPJ ======================================================================

Route::get('goodsreceipt', 'SpjController@index');

Route::get('goodsreceipt/create', 'SpjController@create');

Route::post('goodsreceipt/create', 'SpjController@store');

Route::get('goodsreceipt/{id}/edit', 'SpjController@edit');

Route::put('goodsreceipt/{id}/edit','SpjController@update');

Route::put('goodsreceipt/{id}/destroy','SpjController@delete');

//============================================ TBK =====================================================================

Route::get('tbk/{id}/list', 'TbkController@tbk_list');

Route::get('tbk/{id}/create', 'TbkController@createtbk');

Route::put('tbk/{id}/create', 'TbkController@tbkStore');

Route::get('tbk/{spjID}/edit/{tbkID}', 'TbkController@tbkEdit');

Route::put('tbk/{spjID}/edit/{tbkID}', 'TbkController@tbkUpdate');

Route::put('tbk/{spjID}/delete/{tbkID}', 'TbkController@tbkDelete');