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

class ProductsController extends Controller
{
    //
    //
    public function getList(Request $request,$countryID){
      try {

          $filters = ParseParameterFilters::getFilters();
          $status = $request->has('status') ? $request->input('status') : null;
          $collection= Products::getProductsByCountry($countryID,$status);

          $r = new ModelResponse();
          $r->draw = $filters['draw'];
          $r->recordsTotal = Products::getProductsByCountryCount($countryID,$status);
          $r->recordsFiltered = Products::getProductsByCountryCount($countryID,$status);
          $r->success = true;
          $r->message = 'Products List';
          $r->data = $collection;
          return $r->doResponse();
      } catch(Exception $e){
          $r = new ApiResponse();
          $r->success = false;
          $r->message = $e->getMessage();
          return $r->doResponse();
      }
    }
}
