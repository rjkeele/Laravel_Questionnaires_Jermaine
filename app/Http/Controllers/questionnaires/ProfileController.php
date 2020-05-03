<?php

namespace App\Http\Controllers\questionnaires;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;

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
}
