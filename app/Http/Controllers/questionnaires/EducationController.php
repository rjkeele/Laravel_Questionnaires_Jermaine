<?php

namespace App\Http\Controllers\questionnaires;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;
use App\Models\Section;
use App\Models\CountryModel;
use Session;

class EducationController extends Controller
{
  private $data = array();

  public function index()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    $data['educations'] = Education::orderBy('resourceEducationId', 'asc')->get();

    return view('education/education', compact("data"));
  }

  public function schoolName()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    return view('education/school/schoolName', compact("data"));
  }

  public function schoolCountry()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    $data['countries'] = CountryModel::all();
    return view('education/school/schoolCountry', compact("data"));
  }

  public function schoolGraduate()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    return view('education/school/schoolGraduate', compact("data"));
  }

  public function schoolPeriod()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    return view('education/school/schoolPeriod', compact("data"));
  }

  public function schoolCourse()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    return view('education/school/schoolCourse', compact("data"));
  }

  public function schoolQualification()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    return view('education/school/schoolQualification', compact("data"));
  }
  public function schoolReview()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    return view('education/school/schoolReview', compact("data"));
  }
}
