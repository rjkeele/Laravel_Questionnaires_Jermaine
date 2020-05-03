<?php

namespace App\Http\Controllers\questionnaires;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;

class ReferenceController extends Controller
{
  private $data = array();

  public function index()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    return view('references/index', compact("data"));
  }
}
