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

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
Route::get('/', [
    'uses'=> 'JobsController@getLatestJobs',
    'as'=> 'jobs.latest'
]);
Route::get('/signin', [
    'uses'=> 'choiceController@getSignin',
    'as'=> 'signin'
]);

Route::get('/signup', [
    'uses'=> 'choiceController@getSignup',
    'as'=> 'signup'
]);

Route::get('/jobs', [
    'uses'=> 'JobsController@getJobs',
    'as'=> 'jobs.all'
]);

Route::get('/jobs/{id}', [
    'uses'=> 'JobsController@getJob',
    'as'=> 'jobs.jobPost'
]);

Route::post('/jobs', [
    'uses'=> 'JobsController@postJobs',
    'as'=> 'jobs.all'
]);


Route::group(['prefix' => '/user'],function(){
    Route::group(['middleware' => 'guest:joobseeker'],function(){

        Route::get('/signin', [
        'uses'=> 'UsersController@getSignin',
        'as'=> 'user.signin'
        ]);

        Route::post('/signin', [
            'uses'=> 'UsersController@postSignin',
            'as'=> 'user.signin'
        ]);

        Route::get('/signup', [
            'uses'=> 'UsersController@getSignup',
            'as'=> 'user.signup'
        ]);

        Route::post('/signup', [
            'uses'=> 'UsersController@postSignup',
            'as'=> 'user.signup'
        ]);
    });

Route::group(['middleware' => 'auth:joobseeker'],function(){

        Route::get('/applications', [
            'uses'=> 'UsersController@getApplications',
            'as'=> 'user.applications'
        ]);

        Route::get('/profile', [
            'uses'=> 'UsersController@getProfile',
            'as'=> 'user.profile'
        ]);

        Route::post('/profile', [
            'uses'=> 'UsersController@updateProfile',
            'as'=> 'user.profile'
        ]);

        Route::get('/logout', [
            'uses'=> 'UsersController@getLogout',
            'as'=> 'user.logout'
        ]);

        Route::get('/jobs/{id}/apply', [
            'uses'=> 'UsersController@applyJob',
            'as'=> 'user.jobApply'
        ]);
    });
});

Route::group(['prefix' => '/company'],function(){

    Route::group(['middleware' => 'guest:company'],function(){
            Route::get('/signin', [
        'uses'=> 'companyController@getSignin',
        'as'=> 'company.signin'
        ]);

        Route::post('/signin', [
            'uses'=> 'companyController@postSignin',
            'as'=> 'company.signin'
        ]);

        Route::get('/signup', [
            'uses'=> 'companyController@getSignup',
            'as'=> 'company.signup'
        ]);

        Route::post('/signup', [
            'uses'=> 'companyController@postSignup',
            'as'=> 'company.signup'
        ]);
    });

Route::group(['middleware' => 'auth:company'],function(){

        Route::get('/applications', [
        'uses'=> 'companyController@getApplications',
        'as'=> 'company.applications'
        ]);

        Route::get('/application/{id}/accept', [
        'uses'=> 'companyController@acceptApplication',
        'as'=> 'company.accept'
        ]);

        Route::get('/applications/{id}/reject', [
        'uses'=> 'companyController@rejectApplication',
        'as'=> 'company.reject'
        ]);

        Route::get('/application/{id}/download', [
        'uses'=> 'companyController@downloadResume',
        'as'=> 'company.downloadResume'
        ]);

        Route::get('/profile', [
            'uses'=> 'companyController@getProfile',
            'as'=> 'company.profile'
        ]);

        Route::post('/profile', [
            'uses'=> 'companyController@updateProfile',
            'as'=> 'company.profile'
        ]);

        Route::get('/job', [
            'uses'=> 'companyController@getJob',
            'as'=> 'company.job'
        ]);

        Route::post('/job', [
            'uses'=> 'companyController@postJob',
            'as'=> 'company.job'
        ]);

        Route::get('/logout', [
            'uses'=> 'companyController@getLogout',
            'as'=> 'company.logout'
        ]);
    });
});

Route::group(['prefix' => '/admin'],function(){
    Route::group(['middleware' => 'guest:admin'],function(){

        Route::get('/signin', [
        'uses'=> 'adminController@getSignin',
        'as'=> 'admin.signin'
        ]);

        Route::post('/signin', [
            'uses'=> 'adminController@postSignin',
            'as'=> 'admin.signin'
        ]);
    });

Route::group(['middleware' => 'auth:admin'],function(){

        Route::get('/dashboard', [
            'uses'=> 'adminController@getDashboard',
            'as'=> 'admin.dashboard'
        ]);

        Route::get('/{id}/delete', [
            'uses'=> 'JobsController@deleteJob',
            'as'=> 'job.delete'
        ]);

        Route::get('/logout', [
            'uses'=> 'adminController@getLogout',
            'as'=> 'admin.logout'
        ]);
    });
});
});
//Route::get('/{locale}','JobsController@changeLanguage');





