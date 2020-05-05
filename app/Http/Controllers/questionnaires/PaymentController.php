<?php

namespace App\Http\Controllers\questionnaires;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\ProductModel;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
  private $data = array();

  public function index()
  {
    $data['sections'] = Section::orderBy('sectionOrder', 'asc')->get();
    $productId = Session::get('productId');
    $product = ProductModel::where('productId', $productId)->get();
    $data['product'] = $product[0];

    return view('payment/index', compact("data"));
  }
}
