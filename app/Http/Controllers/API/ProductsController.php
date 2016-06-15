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
    //
    public function getDelete($productID){
      try {

        $product = Products::find($productID);
        $product->delete();
        $r = new ApiResponse();
        $r->success = true;
        $r->message = 'Element deleted';
        $r->data = [];
        return $r->doResponse();
      } catch (Exception $e) {
        $r = new ApiResponse();
        $r->success = false;
        $r->message = $e->getMessage();
        return $r->doResponse();
      }

    }
    public function getRecover($productID){
      try {

        $product = Products::onlyTrashed()->find($productID);
        $product->restore();
        $r = new ApiResponse();
        $r->success = true;
        $r->message = 'Element restored';
        $r->data = [];

        return $r->doResponse();
      } catch (Exception $e) {
        $r = new ApiResponse();
        $r->success = false;
        $r->message = $e->getMessage();
        return $r->doResponse();
      }

    }
    public function postEdit(Request $request, $productID){
      try {

          $data = $request->all();
          $element = Products::find($productID);
          $element->name = $data['name'];
          $element->description = $data['descripcion'];
          $element->tags = $data['tags'];

          if($request->file('coverimage')){
            $name = time()."_".$request->file('coverimage')->getClientOriginalName();
            $element->cover_image =$name;
            $request->file('coverimage')->move(
                 base_path() . '/public/storage/products/', $name
            );


          }

          $element->friendly_url = $data['friendly_url'];
          $element->save();

          #Update relationships
          $element->categories()->sync($data['categories']);
          $element->subcategories()->sync($data['subcategories']);
          $element->countries()->sync($data['countries']);

          $r = new ApiResponse();
          $r->success = true;
          $r->message = 'Element Success';
          $r->data = array('id'=>$element->id);
          return $r->doResponse();

      } catch(Exception $e){
          $r = new ApiResponse();
          $r->success = false;
          $r->message = $e->getMessage();
          return $r->doResponse();
      }

    }
    public function postCreate(Request $request){
      try {

          $data = $request->all();
          $element = new Products();
          $element->name = $data['name'];
          $element->description = $data['descripcion'];
          $element->tags = $data['tags'];

          if($request->file('coverimage')){
            $name = time()."_".$request->file('coverimage')->getClientOriginalName();
            $element->cover_image =$name;
            $request->file('coverimage')->move(
                 base_path() . '/public/storage/products/', $name
            );


          }

          $element->friendly_url = $data['friendly_url'];
          $element->save();

          #Add relationships
          $element->categories()->sync($data['categories']);
          $element->subcategories()->sync($data['subcategories']);
          $element->countries()->sync($data['countries']);


          $r = new ApiResponse();
          $r->success = true;
          $r->message = 'Element Success';
          $r->data = array('id'=>$element->id);
          return $r->doResponse();

      } catch(Exception $e){
          $r = new ApiResponse();
          $r->success = false;
          $r->message = $e->getMessage();
          return $r->doResponse();
      }

    }

    public function getList(Request $request,$countryID){
      try {

          $filters = ParseParameterFilters::getFilters();
        
          $status = $request->has('status') ? $request->input('status') : null;
          $category = $request->has('cat') ? $request->input('cat') : null;
          $subcategory = $request->has('sub') ? $request->input('sub') : null;
          $collection= Products::getProductsByCountry(
                                $countryID,
                                $status,
                                $filters['take'],
                                $filters['offset'],
                                $category,
                                $subcategory,
                                $filters['search']);

          $r = new ModelResponse();

          $r->draw = $filters['draw'];

          $r->recordsTotal = Products::getProductsByCountryCount($countryID,$status,$category,$subcategory,$filters['search']);
          $r->recordsFiltered = Products::getProductsByCountryCount($countryID,$status,$category,$subcategory,$filters['search']);
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
