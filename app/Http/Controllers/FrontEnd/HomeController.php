<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Categories;
class HomeController extends Controller
{
    //
    //

    public function getIndex(){
      $this->data['categories'] = Categories::all();

      return view('frontend.index', $this->data);
    }
}
