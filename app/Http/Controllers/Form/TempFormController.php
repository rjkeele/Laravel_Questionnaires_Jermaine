<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TempInfoModel;
use phpDocumentor\Reflection\Types\Resource_;

class TempFormController extends Controller
{
  public function saveLevel(Request $request)
  {
    $val = $request->input('hidden_education');
    print_r($val);
  }

  public function schoolCountry(Request $request)
  {
    $schoolCountry = $request -> input('schoolCountry');
//    TempInfoModel::g
  }
}
