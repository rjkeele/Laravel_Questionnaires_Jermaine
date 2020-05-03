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

Route::get('/', 'questionnaires\HomeController@index')->name('home');
Route::prefix('education') -> group(function () {
  Route::get('level', 'questionnaires\EducationController@index')->name('education');
  Route::prefix('school') -> group(function () {
    Route::get('name', 'questionnaires\EducationController@schoolName')->name('schoolName');
    Route::get('country', 'questionnaires\EducationController@schoolCountry')->name('schoolCountry');
    Route::get('graduate', 'questionnaires\EducationController@schoolGraduate')->name('schoolGraduate');
    Route::get('period', 'questionnaires\EducationController@schoolPeriod')->name('schoolPeriod');
    Route::get('course', 'questionnaires\EducationController@schoolCourse')->name('schoolCourse');
    Route::get('qualification', 'questionnaires\EducationController@schoolQualification')->name('schoolQualification');
    Route::get('review', 'questionnaires\EducationController@schoolReview')->name('schoolReview');
  });
});
Route::prefix('workExperience')->group(function (){
  Route::get('workingNow', 'questionnaires\WorkExperienceController@workingNow')->name('workingNow');
  Route::prefix('journey1') -> group(function (){
    Route::get('company', 'questionnaires\WorkExperienceController@journey1Company');
  });
});

Route::prefix('temp_info_save') -> group(function (){
  Route::post('schoolCountry', 'Form\TempFormController@schoolCountry');
});
