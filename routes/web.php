<?php



Route::get('/', function () {
    return view('login');
});


//All User Route..............................
Route::get('/all-user','AllUserController@index')->name('all.user');
Route::post('/insert-user','AllUserController@store');


//Project Info Route...............
Route::get('/all-project-info','ProjectInfoController@index')->name('all.projectInfo');
Route::post('/insert-project-info','ProjectInfoController@store');

//Project Module Route..................
Route::get('/all-project-module','ProjectModuleController@index')->name('all.projectModule');
Route::post('/insert-project-module','ProjectModuleController@store');

//Status
Route::get('/complete-status/{id}','ProjectModuleController@complete');
Route::get('/upcomming-status/{id}','ProjectModuleController@upcomming');
Route::get('/ongoing-status/{id}','ProjectModuleController@ongoing');


//Dashboard Route............................
Route::get('/dashboard','DashboardController@index')->name('dashboard');
Route::get('/client-dashboard','DashboardController@clientDashboard')->name('client.dashboard');
Route::get('/staff-programmer-dashboard','DashboardController@staffDashboard')->name('staff.dashboard');
Route::get('/logout','DashboardController@logout');

Route::post('/user-login','AllUserController@userLoginProcess');






