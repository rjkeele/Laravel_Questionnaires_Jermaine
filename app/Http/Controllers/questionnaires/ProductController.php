<?php

namespace App\Http\Controllers\questionnaires;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\TokenModel;

class ProductController extends Controller
{
  private $data = array();

  public function index()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    $tokenModel = TokenModel::where('id', 1)->get();
    $accessToken = $tokenModel[0]->accessToken;
    $productData = json_decode($this->getProduct());
//    print_r($productData[0]->productName);
    $data['products'] = $productData;

    return view('product/index', compact("data"));
  }

  public function getProduct()
  {
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, "https://yougotthejob.com/process/questionnaire/products?accessToken=68eacb97d86f0c4621fa2b0e17cabd8c");
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
