<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TempInfoModel;
use App\Models\Section;
use phpDocumentor\Reflection\Types\Resource_;
use function PHPSTORM_META\type;
use Session;

class TempFormController extends Controller
{
  public function educationLevel(Request $request)
  {
    $level_id = (int)$request->input('level_id');
    $auth_id = Session::get('auth_id');
    $visited = Session::get('visited');
    if ($visited == 'true') {
      TempInfoModel::where('auth_id', $auth_id)->update(['education_level_id' => $level_id, 'last_url' => '/education/school/name']);
    } else {
      $temp_model = new TempInfoModel;
      $temp_model->auth_id = $auth_id;
      $temp_model->education_level_id = $level_id;
      $temp_model->save();
    }
    return 'success';
  }

  public function schoolName(Request $request)
  {
    $schoolName = $request->input('schoolName');
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update(['schoolName' => $schoolName, 'last_url' => '/education/school/country']);
    Session::put('schoolName', $schoolName);
    return 'success';
  }

  public function schoolCountry(Request $request)
  {
    $schoolCountry = $request->input('schoolCountry');
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update(['schoolCountry' => $schoolCountry, 'last_url' => '/education/school/graduate']);
    return 'success';
  }

  public function graduated(Request $request)
  {
    $graduated = $request->input('graduated');
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update(['schoolGraduate' => $graduated, 'last_url' => '/education/school/period']);
    Session::put('schoolGraduate', $graduated);
    return 'success';
  }

  public function schoolPeriod(Request $request)
  {
    $startMonth = $request->input('startMonth');
    $startYear = $request->input('startYear');
    $endMonth = $request->input('endMonth');
    $endYear = $request->input('endYear');
    $update_data = array(
      'schoolStartMonth' => $startMonth,
      'schoolStartYear' => $startYear,
      'schoolEndMonth' => $endMonth,
      'schoolEndYear' => $endYear,
      'last_url' => '/education/school/course'
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    return 'success';
  }

  public function schoolCourse(Request $request)
  {
    $schoolCourse = $request->input('schoolCourse');
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update(['schoolCourse' => $schoolCourse, 'last_url' => '/education/school/qualification']);
    return 'success';
  }

  public function schoolQualification(Request $request)
  {
    $schoolQualification = $request->input('schoolQualification');
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update(['schoolQualification' => $schoolQualification, 'last_url' => '/education/school/review']);
    return 'success';
  }

  public function workingNow(Request $request)
  {
    $workingNow = $request->input('workingNow');
    $update_data = array(
      'workingNow' => $workingNow,
      'last_url' => '/workExperience/journey1/company',
      'section_id' => Session::get('section_id')
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    return $workingNow;
  }

  public function journey1Company(Request $request)
  {
    $companyName = $request->input('companyName');
    $update_data = array(
      'journey1Company' => $companyName,
      'last_url' => '/workExperience/journey1/country'
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    Session::put('journey1Company', $companyName);
    return 'success';
  }

  public function journey1Country(Request $request)
  {
    $companyCountry = $request->input('companyCountry');
    $update_data = array(
      'journey1Country' => $companyCountry,
      'last_url' => '/workExperience/journey1/city'
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    Session::put('journey1Country', $companyCountry);
    return 'success';
  }

  public function journey1City(Request $request)
  {
    $companyCity = $request->input('companyCity');
    $update_data = array(
      'journey1City' => $companyCity,
      'last_url' => '/workExperience/journey1/job'
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
//    Session::put('journey1City', $companyCity);
    return 'success';
  }

  public function journey1Job(Request $request)
  {
    $companyJob = $request->input('companyJob');
    $update_data = array(
      'journey1Job' => $companyJob,
      'last_url' => '/workExperience/journey1/startJob'
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    return 'success';
  }

  public function journey1JobStart(Request $request)
  {
    $jobStartMonth = $request->input('jobStartMonth');
    $jobStartYear = $request->input('jobStartYear');
    $update_data = array(
      'journey1StartJob' => $jobStartMonth . ' ' . $jobStartYear,
      'last_url' => '/workExperience/journey1/duty'
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    return 'success';
  }

  public function journey1Duty(Request $request)
  {
    $companyDuty = $request->input('companyDuty');
    $update_data = array(
      'journey1Duty' => $companyDuty,
      'last_url' => '/workExperience/journey1/review'
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    return 'success';
  }

  public function journey2LastJob(Request $request)
  {
    $startMonth = $request->input('startMonth');
    $startYear = $request->input('startYear');
    $endMonth = $request->input('endMonth');
    $endYear = $request->input('endYear');
    $update_data = array(
      'lastJobStartMonth' => $startMonth,
      'lastJobStartYear' => $startYear,
      'lastJobEndMonth' => $endMonth,
      'lastJobEndYear' => $endYear,
      'last_url' => '/workExperience/journey2/company'
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    return 'success';
  }

  public function journey2Company(Request $request)
  {
    $companyName = $request->input('companyName');
    $update_data = array(
      'journey2Company' => $companyName,
      'last_url' => '/workExperience/journey2/country'
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    Session::put('journey2Company', $companyName);
    return 'success';
  }

  public function journey2Country(Request $request)
  {
    $companyCountry = $request->input('companyCountry');
    $update_data = array(
      'journey2Country' => $companyCountry,
      'last_url' => '/workExperience/journey2/city'
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    Session::put('journey2Country', $companyCountry);
    return 'success';
  }

  public function journey2City(Request $request)
  {
    $companyCity = $request->input('companyCity');
    $update_data = array(
      'journey2City' => $companyCity,
      'last_url' => '/workExperience/journey2/job'
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    return 'success';
  }

  public function journey2Job(Request $request)
  {
    $companyJob = $request->input('companyJob');
    $update_data = array(
      'journey2Job' => $companyJob,
      'last_url' => '/workExperience/journey2/startJob'
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    return 'success';
  }

  public function journey2Duty(Request $request)
  {
    $companyDuty = $request->input('companyDuty');
    $update_data = array(
      'journey2Duty' => $companyDuty,
      'last_url' => '/workExperience/journey2/review'
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    return 'success';
  }

  public function profileNewJob(Request $request)
  {
    $newJob = $request->input('newJob');
    $update_data = array(
      'profileNewJob' => $newJob,
      'last_url' => '/profile/personal',
      'section_id' => Session::get('section_id')
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    Session::put('newJob', $newJob);
    return 'success';
  }

  public function profilePersonalSummary(Request $request)
  {
    $personalSummary = $request->input('personalSummary');
    $current_section_id = $request->input('section_id');
    $section = Section::where('sectionId', $current_section_id)->get();
    $current_section_order = $section[0]->sectionOrder;
    $section_order = $current_section_order + 1;
    $section1 = Section::where('sectionOrder', $section_order)->get();
    $section_id = $section1[0]->sectionId;
    $nextUrl = $section1[0]->startUrl;
    Session::put('section_order', $section_order);
    Session::put('section_id', $section_id);
    $update_data = array(
      'profilePersonalSummary' => $personalSummary,
      'last_url' => $nextUrl,
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    return $nextUrl;
  }

  public function professional(Request $request)
  {
    $skillName1 = $request->input('skillName1');
    $skillName2 = $request->input('skillName2');
    $skillName3 = $request->input('skillName3');
    $skillName4 = $request->input('skillName4');
    $skillName5 = $request->input('skillName5');
    $skillRating1 = $request->input('skillRating1');
    $skillRating2 = $request->input('skillRating2');
    $skillRating3 = $request->input('skillRating3');
    $skillRating4 = $request->input('skillRating4');
    $skillRating5 = $request->input('skillRating5');
    $current_section_id = $request->input('section_id');

    $section = Section::where('sectionId', $current_section_id)->get();
    $current_section_order = $section[0]->sectionOrder;
    $section_order = $current_section_order + 1;
    $section1 = Section::where('sectionOrder', $section_order)->get();
    $section_id = $section1[0]->sectionId;
    $nextUrl = $section1[0]->startUrl;
    Session::put('section_order', $section_order);
    Session::put('section_id', $section_id);
    $update_data = array(
      'professionalSkillName1' => $skillName1,
      'professionalSkillName2' => $skillName2,
      'professionalSkillName3' => $skillName3,
      'professionalSkillName4' => $skillName4,
      'professionalSkillName5' => $skillName5,
      'professionalSkillRating1' => $skillRating1,
      'professionalSkillRating2' => $skillRating2,
      'professionalSkillRating3' => $skillRating3,
      'professionalSkillRating4' => $skillRating4,
      'professionalSkillRating5' => $skillRating5,
      'last_url' => $nextUrl,
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    return $nextUrl;
  }
}
