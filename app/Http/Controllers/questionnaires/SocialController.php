<?php

namespace App\Http\Controllers\questionnaires;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;

class SocialController extends Controller
{
  private $data = array();

  public function media()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    return view('social/media', compact("data"));
  }
}
