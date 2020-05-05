<?php

namespace App\Http\Controllers\questionnaires;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use function PHPSTORM_META\type;
use App\Models\AuthModel;
use App\Models\TempInfoModel;
use Session;

class HomeController extends Controller
{
  public function index(Request $request)
  {
    $session_id = md5($_SERVER['HTTP_HOST'] . $_SERVER['HTTP_USER_AGENT']);
    $auth_ids_list = TempInfoModel::all();
    $visited = 'false';

    Session::put('auth_id', $session_id);

    foreach ($auth_ids_list as $row) {
      if ($row->auth_id == $session_id) {
        $visited = 'true';
      }
    }
    if ($visited == 'false') {
      $auth = new TempInfoModel();
      $auth->auth_id = $session_id;
      $auth->save();

      Session::put('section_order', 1);
      Session::put('visited', $visited);

//      setcookie("auth_id", $session_id, time() + 100000000, "/");
      $section = Section::where('sectionOrder', 1)->get();
      $startUrl = $section[0]->startUrl;
      $section_id = $section[0]->sectionId;

      TempInfoModel::where('auth_id', $session_id)->update(['section_id' => $section_id, 'last_url' => $startUrl]);

      Session::put('section_id', $section_id);

      return redirect($startUrl);
    } else {
      Session::put('visited', $visited);
      $temp = TempInfoModel::where('auth_id', $session_id)->get();
      $last_url = $temp[0]->last_url;
      $section_id = $temp[0]->section_id;
      $section = Section::where('sectionId', $section_id)->get();
      $section_order = $section[0]->sectionOrder;
      Session::put('section_id', $section_id);
      Session::put('section_order', $section_order);
      return redirect($last_url);
    }
  }

  public function moveToNextSection(Request $request)
  {
    $current_section_id = (int)$request->input('sectionId');
    $section = Section::where('sectionId', $current_section_id)->get();
    $current_section_order = $section[0]->sectionOrder;
    $section_order = $current_section_order + 1;
    $section1 = Section::where('sectionOrder', $section_order)->get();
    $section_id = $section1[0]->sectionId;
    $nextUrl = $section1[0]->startUrl;
    Session::put('section_order', $section_order);
    Session::put('section_id', $section_id);
    return $nextUrl;
  }

  public function moveToAnotherSection(Request $request)
  {
    $section_id = (int)$request->input('sectionId');
    Session::put('section_id', $section_id);
    $section = Section::where('sectionId', $section_id)->get();
//    $section_order = $section[0]->sectionOrder;
    $nextUrl = $section[0]->lastUrl;
    return $nextUrl;
  }
}
