<?php

/** @var \Laravel\Lumen\Routing\Router $router */


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'hukum'], function () use ($router) {
    $router->post('/', 'PelaporanHukumController@createPelaporanHukum');
    $router->get('/', 'PelaporanHukumController@getAllHukum');
    $router->put('/{id_hukum}', 'PelaporanHukumController@update');
    $router->delete('/{id_hukum}', 'PelaporanHukumController@deleteHukum');
});

$router->group(['prefix' => 'kontrak'], function () use ($router) {
    $router->post('/', 'SuratMasukController@createSuratMasuk');
    $router->get('/', 'SuratMasukController@getAllSurat');
    $router->put('/{id_kontrak}', 'SuratMasukController@update');
    $router->delete('/{id_kontrak}', 'SuratMasukController@deleteSurat');
});

$router->group(['prefix' => 'kontrakKeluar'], function () use ($router) {
    $router->post('/', 'SuratKeluarController@createSuratKeluar');
    $router->get('/', 'SuratKeluarController@getAllSurat');
    $router->put('/{id_kontrak}', 'SuratKeluarController@update');
    $router->delete('/{id_kontrak}', 'SuratKeluarController@deleteSurat');
});

$router->group(['prefix' => 'products'], function () use ($router) {
    $router->post('/', 'ProductController@create');
    $router->get('/{product_id}', 'ProductController@read');
    $router->get('/', 'ProductController@readAll');
    $router->put('/{product_id}', 'ProductController@update');
    $router->delete('/{product_id}', 'ProductController@delete');
});
$router->group(['prefix' => 'storagetank'], function () use ($router) {
    $router->post('/', 'StorageTankController@create');
    $router->get('/{id_tangki_penyimpanan}', 'StorageTankController@read');
    $router->get('/', 'StorageTankController@readAll');
    $router->put('/{id_tangki_penyimpanan}', 'StorageTankController@update');
    $router->delete('/{id_tangki_penyimpanan}', 'StorageTankController@delete');
});

$router->group(['prefix' => 'kesehatan'], function () use ($router) {
    $router->post('/', 'KesehatanController@create');
    $router->get('/{id_kesehatan}', 'KesehatanController@read');
    $router->get('/', 'KesehatanController@readAll');
    $router->put('/{id_kesehatan}', 'KesehatanController@update');
    $router->delete('/{id_kesehatan}', 'KesehatanController@delete');
});
$router->group(['prefix' => 'karyawan'], function () use ($router) {
    $router->post('/', 'karyawanController@create');
    $router->get('/{nip}', 'karyawanController@read');
    $router->get('/', 'karyawanController@readAll');
    $router->put('/{nip}', 'karyawanController@update');
    $router->delete('/{nip}', 'karyawanController@delete');
});

$router->group(['prefix' => 'workshop'], function () use ($router) {
    $router->post('/', 'WorkshopController@create');
    $router->get('/{id_workshop}', 'WorkshopController@read');
    $router->get('/', 'WorkshopController@readAll');
    $router->put('/{id_workshop}', 'WorkshopController@update');
    $router->delete('/{id_workshop}', 'WorkshopController@delete');
});

$router->get('/sales[/{sales_id}]', 'SalesController@read');

$router->get('/customers[/{customer_id}]', 'CustomerController@read');

$router->group(['prefix' => 'employee-accounts'], function () use ($router) {
    $router->get('/', 'ControllerEmpAcc@read');
    $router->post('/', 'ControllerEmpAcc@create');
    $router->get('/{karyawan_nip}', 'ControllerEmpAcc@read');
});


// finance
$router->group(['prefix' => 'akun'], function () use ($router) {
    $router->get('/', 'AkunController@getAll');
    $router->get('/{id_akun}', 'AkunController@getid');
    $router->post('/', 'AkunController@create');
    $router->put('/{id_akun}', 'AkunController@update');
    $router->delete('/{id_akun}', 'AkunController@delete');
});
$router->group(['prefix' => 'kategori'], function () use ($router) {
    $router->get('/', 'KategoriController@getAll');
    $router->get('/{id_kategori}', 'KategoriController@getid');
    $router->post('/', 'KategoriController@create');
    $router->put('/{id_kategori}', 'KategoriController@update');
    $router->delete('/{id_kategori}', 'KategoriController@delete');
});
$router->group(['prefix' => 'budget'], function () use ($router) {
    $router->get('/', 'BudgetController@getAll');
    $router->get('/{id_budget}', 'BudgetController@getid');
    $router->post('/', 'BudgetController@create');
    $router->put('/{id_budget}', 'BudgetController@update');
    $router->delete('/{id_budget}', 'BudgetController@delete');
});
$router->group(['prefix' => 'income'], function () use ($router) {
    $router->get('/', 'IncomeController@getAll');
    $router->get('/{id_income}', 'IncomeController@getid');
    $router->post('/', 'IncomeController@create');
    $router->put('/{id_income}', 'IncomeController@update');
    $router->delete('/{id_income}', 'IncomeController@delete');
});
$router->group(['prefix' => 'expense'], function () use ($router) {
    $router->get('/', 'ExpenseController@getAll');
    $router->get('/{id_expense}', 'ExpenseController@getid');
    $router->post('/', 'ExpenseController@create');
    $router->put('/{id_expense}', 'ExpenseController@update');
    $router->delete('/{id_expense}', 'ExpenseController@delete');
});
$router->group(['prefix' => 'transaction'], function () use ($router) {
    $router->get('/', 'TranHistoryController@getAll');
    $router->get('/{id_account}', 'TranHistoryController@getid');
    $router->post('/', 'TranHistoryController@create');
    $router->put('/{id_account}', 'TranHistoryController@update');
    $router->delete('/{id_account}', 'TranHistoryController@delete');
});
$router->group(['prefix' => 'balance'], function () use ($router) {
    $router->post('/', 'BalanceController@create');
    $router->get('/{account_number}', 'BalanceController@getid');
    $router->get('/', 'BalanceController@getAll');
    $router->put('/{account_number}', 'BalanceController@update');
    $router->delete('/{account_number}', 'BalanceController@delete');
});


// RnD
$router->group(['prefix' => 'task'], function () use ($router) {
    $router->get('/', 'TasksController@getAll');
    $router->get('/{id}', 'TasksController@getid');
    $router->post('/', 'TasksController@create');
    $router->put('/{id}', 'TasksController@update');
    $router->delete('/{id}', 'TasksController@delete');
});
$router->group(['prefix' => 'project'], function () use ($router) {
    $router->get('/', 'ProjectsController@getAll');
    $router->get('/{id}', 'ProjectsController@getid');
    $router->post('/', 'ProjectsController@create');
    $router->put('/{id}', 'ProjectsController@update');
    $router->delete('/{id}', 'ProjectsController@delete');
});
$router->group(['prefix' => 'event'], function () use ($router) {
    $router->get('/', 'EventController@getAll');
    $router->get('/{id_event}', 'EventController@getid');
    $router->post('/', 'EventController@create');
    $router->put('/{id_event}', 'EventController@update');
    $router->delete('/{id_event}', 'EventController@delete');
});
$router->group(['prefix' => 'feed'], function () use ($router) {
    $router->get('/', 'FeedsController@getAll');
    $router->get('/{id_feed}', 'FeedsController@getid');
    $router->post('/', 'FeedsController@create');
    $router->put('/{id_feed}', 'FeedsController@update');
    $router->delete('/{id_feed}', 'FeedsController@delete');
});
