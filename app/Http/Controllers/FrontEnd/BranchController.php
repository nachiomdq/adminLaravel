<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Branchs;
use App\Models\States;

class BranchController extends Controller
{
      public function getIndex(){
        #Obtengo todas states de los branchs distinct
        $this->data['states'] = States::all();

        $this->data['branchs'] = Branchs::all();

        return view('frontend.branchs', $this->data);
      }
}
