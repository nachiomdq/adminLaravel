<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Helpers\ApiResponse;
use App\Helpers\ModelResponse;
use App\Helpers\ParseParameterFilters;
use League\Flysystem\Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Models\Products;
use App\Models\Subcategories;


class ClientController extends Controller
{
    //

    public function getListProductsByCategory(){
      try {
        $countryID = 1; // cuando sea multiCountry detectar la variable de sesion
        $data = Input::all();
        if(isset($data['subCatId'])){
          #Get products by category and subcategory
          $this->data['products'] = Products::getProductsByCountry($countryID,"actives",null,null,$data['catId'],$data['subCatId'],"");
        } else{
          #Get products by category
          $this->data['products'] = Products::getProductsByCountry($countryID,"actives",null,null,$data['catId'],null,"");
        }


        #List subcategories of those products
        $this->data['subcategories'] = Subcategories::all();



        #Instead of return response, return view to apply in front end
        return view('frontend.ajaxResponses.productList', $this->data);

        $r = new ApiResponse();
        $r->success = true;
        $r->message = 'List of products by Category';
        $r->data = $products;


        return $r->doResponse();

      } catch (Exception $e) {
          $r = new ApiResponse();
          $r->success = false;
          $r->message = $e->getMessage();
          return $r->doResponse();
      }

    }
}
