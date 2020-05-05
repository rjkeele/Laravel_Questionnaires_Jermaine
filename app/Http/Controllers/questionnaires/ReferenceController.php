<?php

namespace App\Http\Controllers\questionnaires;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Illuminate\Support\Facades\Session;
use App\Models\TempInfoModel;

class ReferenceController extends Controller
{
  private $data = array();

  public function index()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    return view('references/index', compact("data"));
  }

  public function review()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    $data['ref'] = TempInfoModel::where('auth_id', Session::get('auth_id'))->get();
    return view('references/review', compact("data"));
  }
}
