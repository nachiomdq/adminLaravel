<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use Meta;
use App\Models\Products;
class HomeController extends Controller
{
    //
    //

    public function getIndex(){
      $this->data['categories'] = Categories::all();


      #Get featured products
      $this->data['featureds'] = Products::where('featured',1)->get();


      #SEO
      Meta::setTitle("Neumáticos Corral");
      Meta::setDescription("Desde 1984 nuestra firma se dedica a la comercialización de neumáticos para todo tipo de vehículos, siendo líder en cubiertas de transporte.");
      Meta::setKeywords("neumáticos,corral,transporte,pirelli,cubiertas,líder,automóviles,IRAM ISO 9001-2000");
      return view('frontend.index', $this->data);
    }
}
