<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TempInfoModel;
use phpDocumentor\Reflection\Types\Resource_;
use function PHPSTORM_META\type;
use Session;

class TempFormController extends Controller
{
  public function educationLevel(Request $request)
  {
    $level_id = (int)$request->input('level_id');
    $auth_id = Session::get('auth_id');
    $visited = Session::get('visited');
    if ($visited == 'true') {
      TempInfoModel::where('auth_id', $auth_id)->update(['education_level_id' => $level_id]);
    } else {
      $temp_model = new TempInfoModel;
      $temp_model->auth_id = $auth_id;
      $temp_model->education_level_id = $level_id;
      $temp_model->save();
    }
    return 'success';
  }

  public function schoolName(Request $request)
  {
    $schoolName = $request->input('schoolName');
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update(['schoolName' => $schoolName]);
    return 'success';
  }

  public function schoolCountry(Request $request)
  {
    $schoolCountry = $request->input('schoolCountry');
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update(['schoolCountry' => $schoolCountry]);
    return 'success';
  }

  public function graduated(Request $request)
  {
    $graduated = $request->input('graduated');
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update(['schoolGraduate' => $graduated]);
    Session::put('schoolGraduate', $graduated);
    return 'success';
  }

  public function schoolPeriod(Request $request)
  {
    $startMonth = $request->input('startMonth');
    $startYear = $request->input('startYear');
    $endMonth = $request->input('endMonth');
    $endYear = $request->input('endYear');
    $update_data = array(
      'schoolStartMonth'=>$startMonth,
      'schoolStartYear'=>$startYear,
      'schoolEndMonth'=>$endMonth,
      'schoolEndYear'=>$endYear,
    );
    TempInfoModel::where('auth_id', Session::get('auth_id'))->update($update_data);
    return 'success';
  }
}
