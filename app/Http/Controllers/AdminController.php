<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    //
    public function getIndex(){
      $this->data= [];
      return view('backend.dashboard', $this->data);
    }
}
