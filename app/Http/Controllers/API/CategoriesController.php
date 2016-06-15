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
use App\Models\Categories;


class CategoriesController extends Controller
{
    public function getDelete($categoryID){
      try {

        $category = Categories::find($categoryID);
        $category->delete();
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
    public function getRecover($categoryID){
      try {

        $category = Categories::onlyTrashed()->find($categoryID);
        $category->restore();
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
    public function getList(Request $request){
      try {

          $filters = ParseParameterFilters::getFilters();

          $status = $request->has('status') ? $request->input('status') : null;

          $collection= Categories::getCategories(
                                $status,
                                $filters['take'],
                                $filters['offset']
                                );

          $r = new ModelResponse();

          $r->draw = $filters['draw'];

          $r->recordsTotal = Categories::getCategoriesCount($status);
          $r->recordsFiltered = Categories::getCategoriesCount($status);
          $r->success = true;
          $r->message = 'Categories List';
          $r->data = $collection;
          return $r->doResponse();
      } catch(Exception $e){
          $r = new ApiResponse();
          $r->success = false;
          $r->message = $e->getMessage();
          return $r->doResponse();
      }
    }
    public function postEdit(Request $request, $categoryID){
      try {

          $data = $request->all();

          $element = Categories::find($categoryID);
          if($element->friendly_url != $data['friendly_url']){
              $existsFriendlyURL = Self::checkFriendlyUrl($data['friendly_url']);
          }
          $element->name = $data['name'];
          $element->description = $data['descripcion'];
          $element->friendly_url = $data['friendly_url'];
          $element->save();

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
          $existsFriendlyURL = Self::checkFriendlyUrl($data['friendly_url']);
          $element = new Categories();
          $element->name = $data['name'];
          $element->description = $data['descripcion'];
          $element->friendly_url = $data['friendly_url'];
          $element->save();


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
    public static function checkFriendlyUrl($url){
      #Check if exists friendlyURL, if exists, throw exception
      $elementCheck = Categories::where('friendly_url',$url)->get();
      if(!$elementCheck->isEmpty()){
        throw new Exception("La URL de SEO ya existe, elija otra", 1);

      }
    }
}
