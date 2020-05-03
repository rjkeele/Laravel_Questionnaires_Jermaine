<?php

namespace App\Http\Controllers\questionnaires;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;

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
}
