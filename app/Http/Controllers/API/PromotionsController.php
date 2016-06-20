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
use App\Models\Promotions;


class PromotionsController extends Controller
{
    public function getDelete($categoryID){
      try {

        $category = Promotions::find($categoryID);
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

        $category = Promotions::onlyTrashed()->find($categoryID);
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
    public function getList(Request $request,$countryID){
      try {

          $filters = ParseParameterFilters::getFilters();

          $status = $request->has('status') ? $request->input('status') : null;

          $collection= Promotions::getPromotions(
                                $status,
                                $countryID,
                                $filters['take'],
                                $filters['offset'],
                                $filters['search']
                                );

          $r = new ModelResponse();

          $r->draw = $filters['draw'];

          $r->recordsTotal = Promotions::getPromotionsCount($status,$countryID,null,$filters['offset'],$filters['search']);
          $r->recordsFiltered = Promotions::getPromotionsCount($status,$countryID,null,$filters['offset'],$filters['search']);
          $r->success = true;
          $r->message = 'Promotions List';
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

          $element = Promotions::find($categoryID);
          if($element->friendly_url != $data['friendly_url']){
              $existsFriendlyURL = Self::checkFriendlyUrl($data['friendly_url']);
          }
          $element->name = $data['name'];
          $element->country_id = $data['countries'];
          $element->description = $data['descripcion'];
          $element->friendly_url = $data['friendly_url'];
          if($request->file('coverimage')){
            $name = time()."_".$request->file('coverimage')->getClientOriginalName();
            $element->cover_image =$name;
            $request->file('coverimage')->move(
                 base_path() . '/public/storage/promotions/', $name
            );


          }
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
          $element = new Promotions();
          $element->name = $data['name'];
          $element->country_id = $data['countries'];
          $element->description = $data['descripcion'];
          $element->friendly_url = $data['friendly_url'];
          if($request->file('coverimage')){
            $name = time()."_".$request->file('coverimage')->getClientOriginalName();
            $element->cover_image =$name;
            $request->file('coverimage')->move(
                 base_path() . '/public/storage/promotions/', $name
            );


          }
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
      $elementCheck = Promotions::where('friendly_url',$url)->get();
      if(!$elementCheck->isEmpty()){
        throw new Exception("La URL de SEO ya existe, elija otra", 1);

      }
    }
}
