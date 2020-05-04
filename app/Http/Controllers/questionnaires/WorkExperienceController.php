<?php

namespace App\Http\Controllers\questionnaires;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\CountryModel;
use Session;

class WorkExperienceController extends Controller
{
  private $data = array();

  public function workingNow()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    return view('workExperience/workingNow', compact("data"));
  }

  public function journey1Company()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    return view('workExperience/journey1/company', compact("data"));
  }

  public function journey1Country()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    $data['countries'] = CountryModel::all();
    return view('workExperience/journey1/country', compact("data"));
  }

  public function journey1City()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    return view('workExperience/journey1/city', compact("data"));
  }

  public function journey1Job()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    return view('workExperience/journey1/job', compact("data"));
  }

  public function journey1startJob()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    return view('workExperience/journey1/startJob', compact("data"));
  }

  public function journey2lastJob()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    return view('workExperience/journey2/lastJob', compact("data"));
  }

  public function journey2company()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    return view('workExperience/journey2/company', compact("data"));
  }

  public function journey2Country()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    return view('workExperience/journey2/country', compact("data"));
  }

  public function journey2City()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    return view('workExperience/journey2/city', compact("data"));
  }

  public function journey2Job()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    return view('workExperience/journey2/job', compact("data"));
  }

  public function journey2Duty()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    return view('workExperience/journey2/duty', compact("data"));
  }
}
