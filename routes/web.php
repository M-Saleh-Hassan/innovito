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

Route::get('/login',array(
    'as'=>'en.auth.show',
    'uses'=>'english\AuthController@show'
    ));
Route::post('/login',array(
    'as'=>'en.auth.login',
    'uses'=>'english\AuthController@login'
    ));
Route::post('/logout',array(
    'as'=>'en.auth.logout',
    'uses'=>'english\AuthController@logout'
    ));
Route::post('/password/code',array(
    'as'=>'en.auth.sendCode',
    'uses'=>'english\AuthController@sendCode'
    ));
Route::post('/password/reset',array(
    'as'=>'en.auth.reset',
    'uses'=>'english\AuthController@reset'
    ));

Route::group(['middleware' => ['checkAuth']], function ()
{
    Route::get('/',array(
        'as'=>'en.home.index',
        'uses'=>'english\HomeController@index'
        ));

    /* Profile */
    Route::get('/profile',array(
        'as'=>'en.profile.index',
        'uses'=>'english\ProfileController@index'
        ));

    Route::post('/profile/image/upload',array(
        'as'=>'en.profile.uploadProfileImage',
        'uses'=>'english\ProfileController@uploadProfileImage'
        ));

    Route::post('/profile/image/header/upload',array(
        'as'=>'en.profile.uploadProfileHeaderImage',
        'uses'=>'english\ProfileController@uploadProfileHeaderImage'
        ));

    Route::get('/profile/about',array(
        'as'=>'en.profile.about',
        'uses'=>'english\ProfileController@about'
        ));

    /**** Settings */
    /* Personal Information */
    Route::get('/profile/settings/personal-information',array(
        'as'=>'en.profile.personal_info',
        'uses'=>'english\ProfileController@showPersonalInfo'
        ));
    Route::post('/profile/settings/personal-information/save',array(
        'as'=>'en.profile.personal_info.save',
        'uses'=>'english\ProfileController@updatePersonalInfo'
        ));

    /* Password Changing */
    Route::get('/profile/settings/password',array(
        'as'=>'en.profile.password.edit',
        'uses'=>'english\ProfileController@editPassword'
        ));
    Route::post('/profile/settings/password/update',array(
        'as'=>'en.profile.password.update',
        'uses'=>'english\ProfileController@updatePassword'
        ));

    /* Education */
    Route::get('/profile/settings/education',array(
        'as'=>'en.profile.education.edit',
        'uses'=>'english\ProfileController@editEducation'
        ));
    Route::post('/profile/settings/education/update',array(
        'as'=>'en.profile.education.update',
        'uses'=>'english\ProfileController@updateEducation'
        ));
    /**** Settings */

    /**** Coordinator Part */

    Route::group(['prefix' => 'en/coordinator', 'middleware' => ['CheckCoordinator'], 'as' => 'en.coordinator.', 'namespace' => 'english\Coordinator'], function ()
    {
        /** Courses */
        Route::resource('courses', 'CourseController');
        Route::post('courses/filter', 'CourseController@filter')->name('courses.filter');

        /** Sections */
        Route::resource('sections', 'SectionController');

        /** Lessons */
        Route::resource('lessons', 'LessonController');

        /** Quizzes */
        Route::resource('quizzes', 'QuizController');

        /** Badges */
        Route::resource('badges', 'BadgeController');

        /** ClassRooms */
        Route::resource('classrooms', 'ClassroomController');
        Route::post('classrooms/filter', 'ClassroomController@filter')->name('classrooms.filter');

        /** Sessions */
        Route::resource('sessions', 'SessionController');
        Route::post('sessions/attend', 'SessionController@attend')->name('sessions.attend');

        /** Sections */
        Route::resource('classroomsections', 'ClassroomSectionController');

    });

    /**** Employee Part */

    Route::group(['prefix' => 'en/employee', 'middleware' => ['CheckEmployee'], 'as' => 'en.employee.', 'namespace' => 'english\Employee'], function ()
    {
        /** Courses */
        Route::resource('courses', 'CourseController');
        Route::post('courses/filter', 'CourseController@filter')->name('courses.filter');
        Route::get('courses/{course}/content', 'CourseController@content')->name('courses.content');

        // /** Sections */
        // Route::resource('sections', 'SectionController');

        /** Lessons */
        Route::resource('lessons', 'LessonController');
        Route::post('lessons/filter', 'LessonController@filter')->name('lessons.filter');
        Route::post('lessons/check', 'LessonController@check')->name('lessons.check');

        /** Classrooms */
        Route::resource('classrooms', 'ClassroomController');

    });

});
