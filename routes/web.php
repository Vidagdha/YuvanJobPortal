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

Route::get('/', 'JobController@index')->name('welcome');
//Job Routes
Route::get('/job/{id}/{job}', 'JobController@show')->name('jobs.show');
//Company Routes
Route::get('/company/{id}/{company}', 'CompanyController@index')->name('company.index');
Route::post('/job/{id}/apply', 'JobController@apply')->name('job.apply.submit');
//Search Route
Route::post('/search', 'HomeController@search')->name('search');

//Auth Routes
Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified')->name('home');
Route::post('user/profile/create', 'ProfileController@update')->middleware('verified')->name('user.profile.update');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->middleware('verified')->name('user.logout');

Route::prefix('admin')->group(function(){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin-panel');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    //Password Reset Routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::get('/employers', 'AdminController@listEmployers')->name('employers.show.all');
    Route::get('/jobs', 'AdminController@listJobs')->name('jobs.show.all');
    Route::post('/job/{id}/approve', 'AdminController@approveJobPost')->name('approve.job');
});

Route::prefix('employer')->group(function(){
    Route::get('/register', 'Auth\EmployerRegisterController@showRegistrationForm')->name('employer.register');
    Route::post('/register', 'Auth\EmployerRegisterController@register')->name('employer.register.submit');
    Route::get('/login', 'Auth\EmployerLoginController@showLoginForm')->name('employer.login');
    Route::post('/login', 'Auth\EmployerLoginController@login')->name('employer.login.submit');
    Route::get('/', 'EmployerController@index')->name('employer-panel');
    Route::get('/logout', 'Auth\EmployerLoginController@logout')->name('employer.logout');
    //Password Reset Routes
    Route::post('/password/email', 'Auth\EmployerForgotPasswordController@sendResetLinkEmail')->name('employer.password.email');
    Route::get('/password/reset', 'Auth\EmployerForgotPasswordController@showLinkRequestForm')->name('employer.password.request');
    Route::post('/password/reset', 'Auth\EmployerResetPasswordController@reset')->name('employer.password.update');
    Route::get('/password/reset/{token}', 'Auth\EmployerResetPasswordController@showResetForm')->name('employer.password.reset');
    Route::get('/company/profile','EmployerDashboardController@companyProfile')->name('company.profile');
    Route::post('/company/profile','EmployerDashboardController@companyUpdate')->name('company.profile.submit');
    Route::get('/post/job','EmployerDashboardController@postJobIndex')->name('post.job');
    Route::post('/post/job','EmployerDashboardController@postJob')->name('post.job.submit');
    Route::get('/view/jobs','EmployerDashboardController@viewJobs')->name('view.jobs');
    Route::get('/job/application','EmployerDashboardController@jobApplications')->name('job.application.show');
});
