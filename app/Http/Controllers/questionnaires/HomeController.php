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
    foreach ($auth_ids_list as $row) {
      if ($row->auth_id == $session_id) {
        $visited = 'true';
      }
    }
    if ($visited == 'false') {
      $auth = new TempInfoModel();
      $auth->auth_id = $session_id;
      $auth->save();
    }

    Session::put('auth_id', $session_id);
    Session::put('section_order', 1);
    Session::put('visited', $visited);

    setcookie("auth_id", $session_id, time() + 100000000, "/");
    $section = Section::where('sectionOrder', 1)->get();
    $startUrl = $section[0]->startUrl;

//    print_r(Session::get('visited'));
    return redirect($startUrl);
  }
}
