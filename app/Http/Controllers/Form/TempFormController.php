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
//    if ($visited == 'true') {
    TempInfoModel::where('auth_id', $auth_id)->update(['education_level_id' => $level_id, 'last_url' => '/education/school/name']);
//    } else {
//      $temp_model = new TempInfoModel;
//      $temp_model->auth_id = $auth_id;
//      $temp_model->education_level_id = $level_id;
//      $temp_model->save();
//    }
    return 'success';
  }

  public function schoolName(Request $request)
  {
    $schoolName = $request->input('schoolName');
    $schoolNum = (int)$request->input('schoolNum');
    if ($schoolNum < 4) {
      TempInfoModel::where('auth_id', Session::get('auth_id'))->update(['schoolName' . $schoolNum => $schoolName, 'last_url' => '/education/school/country']);
      Session::put('schoolName', $schoolName);
    }
    return 'success';
  }

  public function schoolCountry(Request $request)
  {
    $schoolCountry = $request->input('schoolCountry');
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update(['schoolCountry' . Session::get('schoolNum') => $schoolCountry, 'last_url' => '/education/school/graduate']);
    Session::put('schoolCountry', $schoolCountry);

    return 'success';
  }

  public function graduated(Request $request)
  {
    $graduated = $request->input('graduated');
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update(['schoolGraduate' . Session::get('schoolNum') => $graduated, 'last_url' => '/education/school/period']);
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
      'schoolStartMonth' . Session::get('schoolNum') => $startMonth,
      'schoolStartYear' . Session::get('schoolNum') => $startYear,
      'schoolEndMonth' . Session::get('schoolNum') => $endMonth,
      'schoolEndYear' . Session::get('schoolNum') => $endYear,
      'last_url' => '/education/school/course'
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    Session::put('schoolStartMonth', $startMonth);
    Session::put('schoolStartYear', $startYear);
    Session::put('schoolEndMonth', $endMonth);
    Session::put('schoolEndYear', $endYear);
    return 'success';
  }

  public function schoolCourse(Request $request)
  {
    $schoolCourse = $request->input('schoolCourse');
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update(['schoolCourse' . Session::get('schoolNum') => $schoolCourse, 'last_url' => '/education/school/qualification']);
    Session::put('schoolCourse', $schoolCourse);
    return 'success';
  }

  public function schoolQualification(Request $request)
  {
    $schoolQualification = $request->input('schoolQualification');
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update(['schoolQualification' . Session::get('schoolNum') => $schoolQualification, 'last_url' => '/education/school/review']);
    Session::put('schoolQualification', $schoolQualification);
    return 'success';
  }

  public function schoolAdd(Request $request)
  {
    $schoolNum = $request->input('schoolNum');
    $schoolName = $request->input('schoolName');
    $schoolCountry = $request->input('schoolCountry');
    $schoolStartYear = $request->input('schoolStartYear');
    $schoolEndYear = $request->input('schoolEndYear');
    $schoolStartMonth = $request->input('schoolStartMonth');
    $schoolEndMonth = $request->input('schoolEndMonth');
    $schoolCourse = $request->input('schoolCourse');
    $schoolQualification = $request->input('schoolQualification');
    Session::put('schoolNum', (int)$schoolNum + 1);
    $update_data = array(
      'schoolName' . $schoolNum => $schoolName,
      'schoolCountry' . $schoolNum => $schoolCountry,
      'schoolStartYear' . $schoolNum => $schoolStartYear,
      'schoolEndYear' . $schoolNum => $schoolEndYear,
      'schoolStartMonth' . $schoolNum => $schoolStartMonth,
      'schoolEndMonth' . $schoolNum => $schoolEndMonth,
      'schoolCourse' . $schoolNum => $schoolCourse,
      'schoolQualification' . $schoolNum => $schoolQualification,
      'last_url' => '/education/school/name'
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    return 'success';
  }

  public function schoolChange(Request $request)
  {
    $schoolName = $request->input('schoolName');
    $schoolCountry = $request->input('schoolCountry');
    $schoolStartYear = $request->input('schoolStartYear');
    $schoolEndYear = $request->input('schoolEndYear');
    $schoolStartMonth = $request->input('schoolStartMonth');
    $schoolEndMonth = $request->input('schoolEndMonth');
    $schoolCourse = $request->input('schoolCourse');
    $schoolQualification = $request->input('schoolQualification');
    $schoolNum = Session::get('schoolNum');

    $update_data = array(
      'schoolName' . $schoolNum => $schoolName,
      'schoolCountry' . $schoolNum => $schoolCountry,
      'schoolStartYear' . $schoolNum => $schoolStartYear,
      'schoolEndYear' . $schoolNum => $schoolEndYear,
      'schoolStartMonth' . $schoolNum => $schoolStartMonth,
      'schoolEndMonth' . $schoolNum => $schoolEndMonth,
      'schoolCourse' . $schoolNum => $schoolCourse,
      'schoolQualification' . $schoolNum => $schoolQualification,
      'last_url' => '/education/school/review'
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
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
    Session::put('journey1City', $companyCity);
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
    Session::put('journey1Job', $companyJob);
    return 'success';
  }

  public function journey1JobStart(Request $request)
  {
    $jobStartMonth = $request->input('jobStartMonth');
    $jobStartYear = $request->input('jobStartYear');
    $update_data = array(
      'journey1StartMonth' => $jobStartMonth,
      'journey1StartYear' => $jobStartYear,
      'last_url' => '/workExperience/journey1/duty'
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    Session::put('journey1StartMonth', $jobStartMonth);
    Session::put('journey1StartYear', $jobStartYear);
    Session::put('journey1EndMonth', 'present');
    Session::put('journey1EndYear', 'present');
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
    Session::put('journey1Summary', $companyDuty);
    return 'success';
  }

  public function journey1AddJob(Request $request)
  {
    $jobNum = $request->input('jobNum');
    $job1Num = $request->input('job1Num');
    $companyName = $request->input('companyName');
    $companyCountry = $request->input('companyCountry');
    $companyCity = $request->input('companyCity');
    $jobStartDate = $request->input('jobStartDate');
    $jobEndDate = $request->input('jobEndDate');
    $jobTitle = $request->input('jobTitle');
    $jobSummary = $request->input('jobSummary');

    $update_data = array(
      'journey1Company' => $companyName,
      'journey1Country' => $companyCountry,
//      'schoolStartDate'.$schoolNum => $schoolStartDate,
//      'schoolEndDate'.$schoolNum => $schoolEndDate,
      'journey1City' => $companyCity,
      'journey1Job' => $jobTitle,
      'journey1Duty' => $jobSummary,
      'last_url' => '/workExperience/journey2/lastJob'
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
//    Session::put('job2Num', 1);
    Session::put('job1Num', 1);
    Session::put('jobNum', (int)$jobNum + 1);
    return 'success';
  }

  public function journey1JobChange(Request $request)
  {
    $companyName = $request->input('companyName');
    $companyCountry = $request->input('companyCountry');
    $companyCity = $request->input('companyCity');
    $jobStartDate = $request->input('jobStartDate');
    $jobEndDate = $request->input('jobEndDate');
    $jobTitle = $request->input('jobTitle');
    $jobSummary = $request->input('jobSummary');

    $update_data = array(
      'journey1Company' => $companyName,
      'journey1Country' => $companyCountry,
//      'schoolStartDate'.$schoolNum => $schoolStartDate,
//      'schoolEndDate'.$schoolNum => $schoolEndDate,
      'journey1City' => $companyCity,
      'journey1Job' => $jobTitle,
      'journey1Duty' => $jobSummary,
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
    $job2Num = (int)Session::get('jobNum') - (int)Session::get('job1Num');
    $update_data = array(
      'lastJobStartMonth' . $job2Num => $startMonth,
      'lastJobStartYear' . $job2Num => $startYear,
      'lastJobEndMonth' . $job2Num => $endMonth,
      'lastJobEndYear' . $job2Num => $endYear,
      'last_url' => '/workExperience/journey2/company'
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    Session::put('journey2StartMonth', $startMonth);
    Session::put('journey2StartYear', $startYear);
    Session::put('journey2EndMonth', $endMonth);
    Session::put('journey2EndYear', $endYear);
    return 'success';
  }

  public function journey2Company(Request $request)
  {
    $companyName = $request->input('companyName');
    $job2Num = (int)Session::get('jobNum') - (int)Session::get('job1Num');
    $update_data = array(
      'journey2Company' . $job2Num => $companyName,
      'last_url' => '/workExperience/journey2/country'
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    Session::put('journey2Company', $companyName);
    return 'success';
  }

  public function journey2Country(Request $request)
  {
    $companyCountry = $request->input('companyCountry');
    $job2Num = (int)Session::get('jobNum') - (int)Session::get('job1Num');
    $update_data = array(
      'journey2Country' . $job2Num => $companyCountry,
      'last_url' => '/workExperience/journey2/city'
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    Session::put('journey2Country', $companyCountry);
    return 'success';
  }

  public function journey2City(Request $request)
  {
    $companyCity = $request->input('companyCity');
    $job2Num = (int)Session::get('jobNum') - (int)Session::get('job1Num');
    $update_data = array(
      'journey2City' . $job2Num => $companyCity,
      'last_url' => '/workExperience/journey2/job'
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    Session::put('journey2City', $companyCity);
    return 'success';
  }

  public function journey2Job(Request $request)
  {
    $companyJob = $request->input('companyJob');
    $job2Num = (int)Session::get('jobNum') - (int)Session::get('job1Num');
    $update_data = array(
      'journey2Job' . $job2Num => $companyJob,
      'last_url' => '/workExperience/journey2/startJob'
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    Session::put('journey2Job', $companyJob);
    return 'success';
  }

  public function journey2Duty(Request $request)
  {
    $companyDuty = $request->input('companyDuty');
    $job2Num = (int)Session::get('jobNum') - (int)Session::get('job1Num');
    $update_data = array(
      'journey2Duty' . $job2Num => $companyDuty,
      'last_url' => '/workExperience/journey2/review'
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    Session::put('journey2Summary', $companyDuty);
    return 'success';
  }

  public function journey2AddJob(Request $request)
  {
    $jobNum = $request->input('jobNum');
    $job1Num = $request->input('job1Num');
    $job2Num = (int)$jobNum - (int)$job1Num;
    $companyName = $request->input('companyName');
    $companyCountry = $request->input('companyCountry');
    $companyCity = $request->input('companyCity');
    $jobStartDate = $request->input('jobStartDate');
    $jobEndDate = $request->input('jobEndDate');
    $jobTitle = $request->input('jobTitle');
    $jobSummary = $request->input('jobSummary');

    $update_data = array(
      'journey2Company' . $job2Num => $companyName,
      'journey2Country' . $job2Num => $companyCountry,
//      'schoolStartDate'.$schoolNum => $schoolStartDate,
//      'schoolEndDate'.$schoolNum => $schoolEndDate,
      'journey2City' . $job2Num => $companyCity,
      'journey2Job' . $job2Num => $jobTitle,
      'journey2Duty' . $job2Num => $jobSummary,
      'last_url' => '/workExperience/journey2/lastJob'
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    Session::put('jobNum', (int)$jobNum + 1);
    return 'success';
  }

  public function journey2JobChange(Request $request)
  {
    $companyName = $request->input('companyName');
    $companyCountry = $request->input('companyCountry');
    $companyCity = $request->input('companyCity');
    $jobStartDate = $request->input('jobStartDate');
    $jobEndDate = $request->input('jobEndDate');
    $jobTitle = $request->input('jobTitle');
    $jobSummary = $request->input('jobSummary');
    $job2Num = (int)Session::get('jobNum') - (int)Session::get('job1Num');

    $update_data = array(
      'journey2Company' . $job2Num => $companyName,
      'journey2Country' . $job2Num => $companyCountry,
//      'schoolStartDate'.$schoolNum => $schoolStartDate,
//      'schoolEndDate'.$schoolNum => $schoolEndDate,
      'journey2City' . $job2Num => $companyCity,
      'journey2Job' . $job2Num => $jobTitle,
      'journey2Duty' . $job2Num => $jobSummary,
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
    $nextUrl = $this->moveNextUrl($current_section_id);
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

    $nextUrl = $this->moveNextUrl($current_section_id);
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
      'section_id' => Session::get('section_id')
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    return $nextUrl;
  }

  public function personal(Request $request)
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

    $nextUrl = $this->moveNextUrl($current_section_id);
    $update_data = array(
      'personalSkillName1' => $skillName1,
      'personalSkillName2' => $skillName2,
      'personalSkillName3' => $skillName3,
      'personalSkillName4' => $skillName4,
      'personalSkillName5' => $skillName5,
      'personalSkillRating1' => $skillRating1,
      'personalSkillRating2' => $skillRating2,
      'personalSkillRating3' => $skillRating3,
      'personalSkillRating4' => $skillRating4,
      'personalSkillRating5' => $skillRating5,
      'last_url' => $nextUrl,
      'section_id' => Session::get('section_id')
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    return $nextUrl;
  }

  public function personaliseContact(Request $request)
  {
    $firstName = $request->input('firstName');
    $lastName = $request->input('lastName');
    $mobileNumber = $request->input('mobileNumber');
    $emailAddress = $request->input('emailAddress');
    $update_data = array(
      'personaliseFirstName' => $firstName,
      'personaliseLastName' => $lastName,
      'personaliseMobileNumber' => $mobileNumber,
      'personaliseEmailAddress' => $emailAddress,
      'last_url' => '/personalise/location'
    );
    Session::put('firstName', $firstName);
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    return 'success';
  }

  public function personaliseLocation(Request $request)
  {
    $country = $request->input('country');
    $city = $request->input('city');
    $addressLine = $request->input('addressLine');
    $update_data = array(
      'personaliseCountry' => $country,
      'personaliseCity' => $city,
      'personaliseAddressLine' => $addressLine,
      'last_url' => '/personalise/website'
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    return 'success';
  }

  public function personaliseWebsite(Request $request)
  {
    $website = $request->input('website');
    $current_section_id = $request->input('section_id');
    $nextUrl = $this->moveNextUrl($current_section_id);
    $update_data = array(
      'personaliseWebsite' => $website,
      'last_url' => $nextUrl,
      'section_id' => Session::get('section_id')
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    return $nextUrl;
  }

  public function social(Request $request)
  {
    $mediaType1 = $request->input('mediaType1');
    $mediaType2 = $request->input('mediaType2');
    $mediaType3 = $request->input('mediaType3');
    $mediaType4 = $request->input('mediaType4');
    $mediaType5 = $request->input('mediaType5');
    $username_link1 = $request->input('username_link1');
    $username_link2 = $request->input('username_link2');
    $username_link3 = $request->input('username_link3');
    $username_link4 = $request->input('username_link4');
    $username_link5 = $request->input('username_link5');
    $current_section_id = $request->input('section_id');

    $nextUrl = $this->moveNextUrl($current_section_id);
    $update_data = array(
      'socialMediaType1' => $mediaType1,
      'socialMediaType2' => $mediaType2,
      'socialMediaType3' => $mediaType3,
      'socialMediaType4' => $mediaType4,
      'socialMediaType5' => $mediaType5,
      'socialUsername_Link1' => $username_link1,
      'socialUsername_Link2' => $username_link2,
      'socialUsername_Link3' => $username_link3,
      'socialUsername_Link4' => $username_link4,
      'socialUsername_Link5' => $username_link5,
      'last_url' => $nextUrl,
      'section_id' => Session::get('section_id')
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    return $nextUrl;
  }

  public function references(Request $request)
  {
    $refName1 = $request->input('refName1');
    $refCompany1 = $request->input('refCompany1');
    $refJob1 = $request->input('refJob1');
    $refContact1 = $request->input('refContact1');
    $refEmail1 = $request->input('refEmail1');
    $refName2 = $request->input('refName2');
    $refCompany2 = $request->input('refCompany2');
    $refJob2 = $request->input('refJob2');
    $refContact2 = $request->input('refContact2');
    $refEmail2 = $request->input('refEmail2');
    $refName3 = $request->input('refName3');
    $refCompany3 = $request->input('refCompany3');
    $refJob3 = $request->input('refJob3');
    $refContact3 = $request->input('refContact3');
    $refEmail3 = $request->input('refEmail3');
    $current_section_id = $request->input('section_id');

    $nextUrl = $this->moveNextUrl($current_section_id);
    $update_data = array(
      'refName1' => $refName1,
      'refCompany1' => $refCompany1,
      'refJob1' => $refJob1,
      'refContact1' => $refContact1,
      'refEmail1' => $refEmail1,
      'refName2' => $refName2,
      'refCompany2' => $refCompany2,
      'refJob2' => $refJob2,
      'refContact2' => $refContact2,
      'refEmail2' => $refEmail2,
      'refName3' => $refName3,
      'refCompany3' => $refCompany3,
      'refJob3' => $refJob3,
      'refContact3' => $refContact3,
      'refEmail3' => $refEmail3,
      'last_url' => $nextUrl,
      'section_id' => Session::get('section_id')
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    return $nextUrl;
  }

  public function product(Request $request)
  {
    $productId = $request->input('productId');
    $current_section_id = $request->input('sectionId');

    $nextUrl = $this->moveNextUrl($current_section_id);
    $update_data = array(
      'productId' => $productId,
      'last_url' => $nextUrl,
      'section_id' => Session::get('section_id')
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    Session::put('productId', $productId);
    return $nextUrl;
  }

  public function payment(Request $request)
  {
    $cardNumber = $request->input('cardNumber');
    $cardHolderName = $request->input('cardHolderName');
    $expiryDate = $request->input('expiryDate');
    $password = $request->input('password');
    $current_section_id = $request->input('sectionId');

    $productId = Session::get('productId');
    if ((int)$productId == 1) {
      $nextUrl = '/dashboard1';
      Session::put('section_id', 11);
      Session::put('section_order', 11);
    } else {
      $nextUrl = '/dashboard2';
      Session::put('section_id', 12);
      Session::put('section_order', 11);
    }

    $update_data = array(
      'cardNumber' => $cardNumber,
      'cardHolderName' => $cardHolderName,
      'expiryDate' => $expiryDate,
      'password' => md5($password),
      'last_url' => $nextUrl,
      'section_id' => Session::get('section_id')
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    return $nextUrl;
  }

  public function dashboard1(Request $request)
  {
    $templateId = $request->input('templateId');
    $update_data = array(
      'templateId' => $templateId,
      'last_url' => '/dashboard2',
      'section_id' => 12
    );
    Session::put('section_order', 11);
    Session::put('section_id', 12);
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    return 'success';
  }

  public function schoolReview(Request $request)
  {
    $schoolName1 = $request->input('schoolName1');
    $schoolCountry1 = $request->input('schoolCountry1');
    $schoolGraduate1 = $request->input('schoolGraduate1');
    $schoolCourse1 = $request->input('schoolCourse1');
    $schoolStartMonth1 = $request->input('schoolStartMonth1');
    $schoolEndMonth1 = $request->input('schoolEndMonth1');
    $schoolStartYear1 = $request->input('schoolStartYear1');
    $schoolEndYear1 = $request->input('schoolEndYear1');
    $schoolQualification1 = $request->input('schoolQualification1');
    $schoolName2 = $request->input('schoolName2');
    $schoolCountry2 = $request->input('schoolCountry2');
    $schoolGraduate2 = $request->input('schoolGraduate2');
    $schoolCourse2 = $request->input('schoolCourse2');
    $schoolStartMonth2 = $request->input('schoolStartMonth2');
    $schoolEndMonth2 = $request->input('schoolEndMonth2');
    $schoolStartYear2 = $request->input('schoolStartYear2');
    $schoolEndYear2 = $request->input('schoolEndYear2');
    $schoolQualification2 = $request->input('schoolQualification2');
    $schoolName3 = $request->input('schoolName3');
    $schoolCountry3 = $request->input('schoolCountry3');
    $schoolGraduate3 = $request->input('schoolGraduate3');
    $schoolCourse3 = $request->input('schoolCourse3');
    $schoolStartMonth3 = $request->input('schoolStartMonth3');
    $schoolEndMonth3 = $request->input('schoolEndMonth3');
    $schoolStartYear3 = $request->input('schoolStartYear3');
    $schoolEndYear3 = $request->input('schoolEndYear3');
    $schoolQualification3 = $request->input('schoolQualification3');
    $current_section_id = $request->input('sectionId');


    $nextUrl = $this->moveNextUrl($current_section_id);
    $update_data = array(
      'schoolName1' => $schoolName1,
      'schoolCountry1' => $schoolCountry1,
      'schoolGraduate1' => $schoolGraduate1,
      'schoolCourse1' => $schoolCourse1,
      'schoolQualification1' => $schoolQualification1,
      'schoolName2' => $schoolName2,
      'schoolCountry2' => $schoolCountry2,
      'schoolGraduate2' => $schoolGraduate2,
      'schoolCourse2' => $schoolCourse2,
      'schoolQualification2' => $schoolQualification2,
      'schoolName3' => $schoolName3,
      'schoolCountry3' => $schoolCountry3,
      'schoolGraduate3' => $schoolGraduate3,
      'schoolCourse3' => $schoolCourse3,
      'schoolQualification3' => $schoolQualification3,
      'schoolStartYear1' => $schoolStartYear1,
      'schoolEndYear1' => $schoolEndYear1,
      'schoolStartMonth1' => $schoolStartMonth1,
      'schoolEndMonth1' => $schoolEndMonth1,
      'schoolStartYear2' => $schoolStartYear2,
      'schoolEndYear2' => $schoolEndYear2,
      'schoolStartMonth2' => $schoolStartMonth2,
      'schoolEndMonth2' => $schoolEndMonth2,
      'schoolStartYear3' => $schoolStartYear3,
      'schoolEndYear3' => $schoolEndYear3,
      'schoolStartMonth3' => $schoolStartMonth3,
      'schoolEndMonth3' => $schoolEndMonth3,
      'last_url' => $nextUrl,
      'section_id' => Session::get('section_id')
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    return $nextUrl;
  }

  public function workExperienceReview(Request $request)
  {
    $journey1Company = $request->input('journey1Company');
    $journey1Country = $request->input('journey1Country');
    $journey1City = $request->input('journey1City');
    $journey1Job = $request->input('journey1Job');
    $journey1StartMonth = $request->input('journey1StartMonth');
    $journey1StartYear = $request->input('journey1StartYear');
//    $journey1EndMonth = $request->input('journey1EndMonth');
//    $journey1EndYear = $request->input('journey1EndYear');
    $journey1Duty = $request->input('journey1Duty');
    $journey2Company1 = $request->input('journey2Company1');
    $journey2Country1 = $request->input('journey2Country1');
    $journey2City1 = $request->input('journey2City1');
    $journey2Job1 = $request->input('journey2Job1');
    $lastJobStartMonth1 = $request->input('lastJobStartMonth1');
    $lastJobStartYear1 = $request->input('lastJobStartYear1');
    $lastJobEndMonth1 = $request->input('lastJobEndMonth1');
    $lastJobEndYear1 = $request->input('lastJobEndYear1');
    $journey2Duty1 = $request->input('journey2Duty1');
    $journey2Company2 = $request->input('journey2Company2');
    $journey2Country2 = $request->input('journey2Country2');
    $journey2City2 = $request->input('journey2City2');
    $journey2Job2 = $request->input('journey2Job2');
    $lastJobStartMonth2 = $request->input('lastJobStartMonth2');
    $lastJobStartYear2 = $request->input('lastJobStartYear2');
    $lastJobEndMonth2 = $request->input('lastJobEndMonth2');
    $lastJobEndYear2 = $request->input('lastJobEndYear2');
    $journey2Duty2 = $request->input('journey2Duty2');
    $journey2Company3 = $request->input('journey2Company3');
    $journey2Country3 = $request->input('journey2Country3');
    $journey2City3 = $request->input('journey2City3');
    $journey2Job3 = $request->input('journey2Job3');
    $lastJobStartMonth3 = $request->input('lastJobStartMonth3');
    $lastJobStartYear3 = $request->input('lastJobStartYear3');
    $lastJobEndMonth3 = $request->input('lastJobEndMonth3');
    $lastJobEndYear3 = $request->input('lastJobEndYear3');
    $journey2Duty3 = $request->input('journey2Duty3');

    $current_section_id = $request->input('sectionId');
    $nextUrl = $this->moveNextUrl($current_section_id);

    $update_data = array(
      'journey1Company' => $journey1Company,
      'journey1Country' => $journey1Country,
      'journey1City' => $journey1City,
      'journey1Job' => $journey1Job,
      'journey1StartMonth' => $journey1StartMonth,
      'journey1StartYear' => $journey1StartYear,
      'journey1Duty' => $journey1Duty,
      'journey2Company1' => $journey2Company1,
      'journey2Country1' => $journey2Country1,
      'journey2City1' => $journey2City1,
      'journey2Job1' => $journey2Job1,
      'lastJobStartMonth1' => $lastJobStartMonth1,
      'lastJobStartYear1' => $lastJobStartYear1,
      'lastJobEndMonth1' => $lastJobEndMonth1,
      'lastJobEndYear1' => $lastJobEndYear1,
      'journey2Duty1' => $journey2Duty1,
      'journey2Company2' => $journey2Company2,
      'journey2Country2' => $journey2Country2,
      'journey2City2' => $journey2City2,
      'journey2Job2' => $journey2Job2,
      'lastJobStartMonth2' => $lastJobStartMonth2,
      'lastJobStartYear2' => $lastJobStartYear2,
      'lastJobEndMonth2' => $lastJobEndMonth2,
      'lastJobEndYear2' => $lastJobEndYear2,
      'journey2Duty2' => $journey2Duty2,
      'journey2Company3' => $journey2Company3,
      'journey2Country3' => $journey2Country3,
      'journey2City3' => $journey2City3,
      'journey2Job3' => $journey2Job3,
      'lastJobStartMonth3' => $lastJobStartMonth3,
      'lastJobStartYear3' => $lastJobStartYear3,
      'lastJobEndMonth3' => $lastJobEndMonth3,
      'lastJobEndYear3' => $lastJobEndYear3,
      'journey2Duty3' => $journey2Duty3,
      'last_url' => $nextUrl,
      'section_id' => Session::get('section_id')
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    return $nextUrl;
  }

  public function profileReview(Request $request)
  {
    $newJob = $request->input('newJob');
    $summary = $request->input('summary');
    $current_section_id = $request->input('sectionId');

    $nextUrl = $this->moveNextUrl($current_section_id);

    $update_data = array(
      'profileNewJob' => $newJob,
      'profilePersonalSummary' => $summary,
      'last_url' => $nextUrl,
      'section_id' => Session::get('section_id')
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    return $nextUrl;
  }

  public function personaliseReview(Request $request)
  {
    $firstName = $request->input('firstName');
    $lastName = $request->input('lastName');
    $mobileNumber = $request->input('mobileNumber');
    $emailAddress = $request->input('emailAddress');
    $country = $request->input('country');
    $city = $request->input('city');
    $addressLine = $request->input('addressLine');
    $website = $request->input('website');
    $current_section_id = $request->input('section_id');
    $nextUrl = $this->moveNextUrl($current_section_id);
    $update_data = array(
      'personaliseFirstName' => $firstName,
      'personaliseLastName' => $lastName,
      'personaliseMobileNumber' => $mobileNumber,
      'personaliseEmailAddress' => $emailAddress,
      'personaliseCountry' => $country,
      'personaliseCity' => $city,
      'personaliseAddressLine' => $addressLine,
      'personaliseWebsite' => $website,
      'last_url' => $nextUrl,
      'section_id' => Session::get('section_id')
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    return $nextUrl;
  }

  public function moveNextUrl($current_section_id)
  {
    $section = Section::where('sectionId', $current_section_id)->get();
    $current_section_order = $section[0]->sectionOrder;
    $section_order = $current_section_order + 1;
    $section1 = Section::where('sectionOrder', $section_order)->get();
    $section_id = $section1[0]->sectionId;
    $nextUrl = $section1[0]->startUrl;
    Session::put('section_order', $section_order);
    Session::put('section_id', $section_id);
    return $nextUrl;
  }
}
