<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Branchs;
use App\Models\States;
use Meta;
class ContactController extends Controller
{
      public function getIndex(){


        #SEO
        Meta::setTitle("Neumáticos Corral Contacto");
        Meta::setDescription("Desde 1984 nuestra firma se dedica a la comercialización de neumáticos para todo tipo de vehículos, siendo líder en cubiertas de transporte.");
        Meta::setKeywords("sucursales,neumáticos,corral,transporte,pirelli,cubiertas,líder,automóviles,IRAM ISO 9001-2000");
        return view('frontend.contact', []);
      }
}
