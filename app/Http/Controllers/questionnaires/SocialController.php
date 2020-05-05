<?php

namespace App\Http\Controllers\questionnaires;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\SocialModel;
use Illuminate\Support\Facades\Session;
use App\Models\TempInfoModel;

class SocialController extends Controller
{
  private $data = array();

  public function media()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    $data['socials'] = SocialModel::all();
    return view('social/media', compact("data"));
  }

  public function review()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    $data['social'] = TempInfoModel::where('auth_id', Session::get('auth_id'))->get();
    $data['socials'] = SocialModel::all();
    return view('social/review', compact("data"));
  }
}
