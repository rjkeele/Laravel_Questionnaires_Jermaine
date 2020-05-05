<?php

namespace App\Http\Controllers\questionnaires;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\SkillModel;
use Illuminate\Support\Facades\Session;
use App\Models\TempInfoModel;

class ProfessionalController extends Controller
{
  private $data = array();

  public function skill()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    $data['skills'] = SkillModel::all();
    return view('professional/skill', compact("data"));
  }

  public function review()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    $data['professional'] = TempInfoModel::where('auth_id', Session::get('auth_id'))->get();
    $data['skills'] = SkillModel::all();
    return view('professional/review', compact("data"));
  }
}
