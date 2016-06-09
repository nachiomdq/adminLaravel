<?php

namespace App\Http\Controllers\AbstractControllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\Categories;
use App\Models\Subcategories;
abstract class BaseBackendController extends Controller
{
  public function __construct()
  {
      

      $this->middleware('auth');
  }
}
