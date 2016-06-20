<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use Meta;
use App\Models\Products;
use App\Models\Promotions;
class HomeController extends Controller
{
    //
    //

    public function getIndex(){
      $countryID = 1; // seo location stage 2

      $this->data['categories'] = Categories::all();
      #Get featured products
      $this->data['featureds'] = Products::where('featured',1)->get()->take(2);
      #Get Promotions
      $this->data['promotions'] = Promotions::where('country_id',$countryID)->get();

      #SEO
      Meta::setTitle("Neumáticos Corral");
      Meta::setDescription("Desde 1984 nuestra firma se dedica a la comercialización de neumáticos para todo tipo de vehículos, siendo líder en cubiertas de transporte.");
      Meta::setKeywords("neumáticos,corral,transporte,pirelli,cubiertas,líder,automóviles,IRAM ISO 9001-2000");
      return view('frontend.index', $this->data);
    }
}
