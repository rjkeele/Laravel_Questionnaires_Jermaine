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
    Route::get('country', 'questionnaires\WorkExperienceController@journey1Country');
    Route::get('city', 'questionnaires\WorkExperienceController@journey1City');
    Route::get('job', 'questionnaires\WorkExperienceController@journey1Job');
    Route::get('startJob', 'questionnaires\WorkExperienceController@journey1startJob');
    Route::get('duty', 'questionnaires\WorkExperienceController@journey1Duty');
    Route::get('review', 'questionnaires\WorkExperienceController@journey1Review');
  });
  Route::prefix('journey2') -> group(function (){
    Route::get('lastJob', 'questionnaires\WorkExperienceController@journey2lastJob');
    Route::get('company', 'questionnaires\WorkExperienceController@journey2company');
    Route::get('country', 'questionnaires\WorkExperienceController@journey2Country');
    Route::get('city', 'questionnaires\WorkExperienceController@journey2City');
    Route::get('job', 'questionnaires\WorkExperienceController@journey2Job');
    Route::get('duty', 'questionnaires\WorkExperienceController@journey2Duty');
  });
});

Route::prefix('profile')->group(function (){
  Route::get('newJob', 'questionnaires\ProfileController@newJob');
  Route::get('personal', 'questionnaires\ProfileController@personal');
});

Route::get('professional', 'questionnaires\ProfessionalController@skill');

Route::get('personal', 'questionnaires\PersonalController@skill');

Route::prefix('personalise')->group(function (){
  Route::get('contact', 'questionnaires\PersonaliseController@contact');
  Route::get('location', 'questionnaires\PersonaliseController@location');
  Route::get('website', 'questionnaires\PersonaliseController@website');
});

Route::get('social/media', 'questionnaires\SocialController@media');

Route::get('references', 'questionnaires\ReferenceController@index');

Route::prefix('temp_info_save') -> group(function (){
  Route::post('educationLevel', 'Form\TempFormController@educationLevel');
  Route::post('schoolName', 'Form\TempFormController@schoolName');
  Route::post('schoolCountry', 'Form\TempFormController@schoolCountry');
  Route::post('graduated', 'Form\TempFormController@graduated');
  Route::post('schoolPeriod', 'Form\TempFormController@schoolPeriod');
  Route::post('schoolCourse', 'Form\TempFormController@schoolCourse');
  Route::post('schoolQualification', 'Form\TempFormController@schoolQualification');

  Route::prefix('workExperience') -> group(function (){
    Route::post('workingNow', 'Form\TempFormController@workingNow');
    Route::prefix('journey1') -> group(function (){
      Route::post('company', 'Form\TempFormController@journey1Company');
      Route::post('country', 'Form\TempFormController@journey1Country');
      Route::post('city', 'Form\TempFormController@journey1City');
      Route::post('job', 'Form\TempFormController@journey1Job');
      Route::post('jobStart', 'Form\TempFormController@journey1JobStart');
      Route::post('duty', 'Form\TempFormController@journey1Duty');
    });
  });
});

Route::post('moveToNextSection', 'questionnaires\HomeController@moveToNextSection');
Route::post('moveToAnotherSection', 'questionnaires\HomeController@moveToAnotherSection');
