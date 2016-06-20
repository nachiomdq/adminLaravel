<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Branchs;
use App\Models\States;
use Meta;
class BranchController extends Controller
{
      public function getIndex(){
        #Obtengo todas states de los branchs distinct
        $this->data['states'] = States::all();
        $this->data['branchs'] = Branchs::all();
        #SEO
        Meta::setTitle("Neumáticos Corral Sucursales");
        Meta::setDescription("Desde 1984 nuestra firma se dedica a la comercialización de neumáticos para todo tipo de vehículos, siendo líder en cubiertas de transporte.");
        Meta::setKeywords("sucursales,neumáticos,corral,transporte,pirelli,cubiertas,líder,automóviles,IRAM ISO 9001-2000");
        return view('frontend.branchs', $this->data);
      }
}
