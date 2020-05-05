<?php

namespace App\Http\Controllers\questionnaires;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;

class DashboardController extends Controller
{
  private $data = array();

  public function dashboard1()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    $data['templates'] = json_decode($this->getTemplates());
    return view('dashboard/dashboard1', compact("data"));
  }

  public function dashboard2()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    return view('dashboard/dashboard2', compact("data"));
  }

  public function getTemplates()
  {
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, "https://yougotthejob.com/process/questionnaire/templates?accessToken=68eacb97d86f0c4621fa2b0e17cabd8c");
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      "Content-Type: application/json"
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return $response;
  }
}
