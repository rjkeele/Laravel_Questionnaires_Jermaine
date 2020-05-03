<?php

namespace App\Http\Controllers\questionnaires;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use function PHPSTORM_META\type;
use App\Models\AuthModel;

class HomeController extends Controller
{
  public function index()
  {
//    $session_id = uniqid();
    $session_id = md5($_SERVER['HTTP_HOST'] . $_SERVER['HTTP_USER_AGENT']);
    $auth_ids_list = AuthModel::all();
    $visited = false;
    foreach ($auth_ids_list as $row) {
      if ($row->auth_id == $session_id) {
        $visited = true;
      }
    }
    if ($visited == false) {
      $auth = new AuthModel;
      $auth->auth_id = $session_id;
      $auth->save();
    }

    setcookie("auth_id", $session_id, time() + 100000000, "/");
    return redirect('/education/level');
  }
}
