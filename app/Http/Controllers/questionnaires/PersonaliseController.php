<?php

namespace App\Http\Controllers\questionnaires;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;

class PersonaliseController extends Controller
{
  private $data = array();

  public function contact()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    return view('personalise/contact', compact("data"));
  }

  public function location()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    return view('personalise/location', compact("data"));
  }

  public function website()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    return view('personalise/website', compact("data"));
  }
}
