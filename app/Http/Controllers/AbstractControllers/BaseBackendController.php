<?php

namespace App\Http\Controllers\AbstractControllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Countries;
abstract class BaseBackendController extends Controller
{
    public function __construct()
  {
      $this->data['countries'] = Countries::all();
      $this->middleware('auth');
  }
}
