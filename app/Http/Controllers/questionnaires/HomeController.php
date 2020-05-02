<?php

namespace App\Http\Controllers\questionnaires;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use function PHPSTORM_META\type;

class HomeController extends Controller
{
  public function index()
  {
    $sections = Section::orderBy('sectionOrder', 'asc')->get();
    return redirect('/education');

//    return view('layout/base')->with('sections', $sections);
  }
}
