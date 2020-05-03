<?php

namespace App\Http\Controllers\questionnaires;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\SkillModel;

class PersonalController extends Controller
{
  private $data = array();

  public function skill()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    $data['skills'] = SkillModel::all();
    return view('personal/skill', compact("data"));
  }
}
