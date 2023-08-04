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
Route::namespace('\App\Http\Controllers\Web')->group(function () {
    //Public Routes
    Route::get('/','UserController@index')->name('login');
    Route::post('/check-user','UserController@checkUser');
    Route::get('/register','UserController@register')->name('register');
    Route::post('/register','UserController@userCreate');
    Route::match(['get','post'],'/forgot-password','UserController@forgotPassword')->name('forgot-password');
    Route::match(['get','post'],'/reset-password','UserController@resetPassword')->name('reset_password');
    Route::get('/401-error/{message}','UserController@error401')->name('Error-401');
    Route::get('/reset-success','UserController@resetSuccess')->name('reset-success');


   
    //Protected Routes
    Route::middleware(['auth'])->group(function () {
        Route::get('logout','UserController@logout')->name('logout');
        Route::resource('plan','PlanController');
        
        Route::middleware(['planCheck'])->group(function(){
            Route::get('/dashboard','DashboardController@index')->name('dashboard');
            Route::resource('profile','ProfileController');
            Route::resource('team','TeamStatusController');
            Route::resource('twi','TotalWorkingIncomeController');
            Route::resource('roi','ROIController');
            Route::resource('support','SupportController');
            Route::resource('withdrawal-history','WithdrawalHistoryController');

              



        });
    });

});


Route::namespace('\App\Http\Controllers\Admin')->prefix('admin')->group(function () {
    Route::get('login','UserController@index')->name('admin-login');
    Route::post('check-user','UserController@login');
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('logout','UserController@logout')->name("admin-logout");
        Route::get('dashboard','DashboardController@index')->name('admin-dashboard');
        
        Route::resource('plans','PlansController');
        Route::resource('levels','LevelController');
        Route::resource('settings','SettingController');
        Route::resource('cake-verse','CakeVersePriceController');
        Route::resource('admin-twi','WithdrawalTWIRequestController');
        Route::get('twi-admin-ar','WithdrawalTWIRequestController@completedRejectedList')->name('admin-twi-approve-reject');
        Route::get('twi-report',"WithdrawalTWIRequestController@exportCsv");
        Route::resource('admin-roi','WithdrawalROIRequestController');
  Route::get('roi-admin-ar','WithdrawalROIRequestController@completedRejectedList')->name('admin-roi-approve-reject');
  Route::get('roi-report',"WithdrawalROIRequestController@exportCsv");

  Route::resource('user-lists','UserListController');
  Route::resource('admin-support','SupportController');



    });

});