<?php

namespace App\Http\Controllers\questionnaires;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\TempInfoModel;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
  private $data = array();

  public function newJob()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    return view('profile/newJob', compact("data"));
  }

  public function personal()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    return view('profile/personal', compact("data"));
  }

  public function review()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    $data['profile'] = TempInfoModel::where('auth_id', Session::get('auth_id'))->get();
    return view('profile/review', compact('data'));
  }
}
