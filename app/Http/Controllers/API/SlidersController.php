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
use App\Models\Products;
use App\Models\Sliders;


class SlidersController extends Controller
{
    public function getDelete($sliderID){
      try {

        $category = Sliders::find($sliderID);
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
    public function getRecover($sliderID){
      try {

        $category = Sliders::onlyTrashed()->find($sliderID);
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

          $collection= Sliders::getSliders(
                                $status,
                                $filters['take'],
                                $filters['offset'],
                                $filters['search']
                                );

          $r = new ModelResponse();

          $r->draw = $filters['draw'];

          $r->recordsTotal = Sliders::getSlidersCount($status,null,$filters['offset'],$filters['search']);
          $r->recordsFiltered = Sliders::getSlidersCount($status,null,$filters['offset'],$filters['search']);
          $r->success = true;
          $r->message = 'Sliders List';
          $r->data = $collection;
          return $r->doResponse();
      } catch(Exception $e){
          $r = new ApiResponse();
          $r->success = false;
          $r->message = $e->getMessage();
          return $r->doResponse();
      }
    }
    public function postEdit(Request $request, $sliderID){
      try {

          $data = $request->all();

          $element = Sliders::find($sliderID);
          $data = $request->all();

        
          $element->title = $data['name'];
          $element->subtitle = $data['subtitle'];
          $element->button_text = $data['button_text'];
          $element->type_url = $data['radio-group1'];
          $typeID = null;
          $url = null;
          if($data['radio-group1'] == 'product'){
            $product = Products::find($data['product']);
            $url = env('APP_URL')."/producto/".$product->friendly_url;
            $typeID = $product->id;
          }
          if($data['radio-group1'] == 'promotion'){
            $promotion = Promotions::find($data['promotion']);
            $url = env('APP_URL')."/promocion/".$promotion->friendly_url;
            $typeID = $promotion->id;
          }
          $element->type_id = $typeID;
          if($data['radio-group1'] == 'other'){

            $url = $data['other_url'];
          }
          $element->href = $url;
          if($request->file('coverimage')){
            $name = time()."_".$request->file('coverimage')->getClientOriginalName();
            $element->image =$name;
            $request->file('coverimage')->move(
                 base_path() . '/public/sliders/', $name
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

          $element = new Sliders();
          $element->title = $data['name'];
          $element->subtitle = $data['subtitle'];
          $element->button_text = $data['button_text'];
          $element->type_url = $data['radio-group1'];
          $typeID = null;
          $url = null;
          if($data['radio-group1'] == 'product'){
            $product = Products::find($data['product']);
            $url = env('APP_URL')."/producto/".$product->friendly_url;
            $typeID = $product->id;
          }
          if($data['radio-group1'] == 'promotion'){
            $promotion = Promotions::find($data['promotion']);
            $url = env('APP_URL')."/promocion/".$promotion->friendly_url;
            $typeID = $promotion->id;
          }
          $element->type_id = $typeID;
          if($data['radio-group1'] == 'other'){

            $url = $data['other_url'];
          }
          $element->href = $url;
          if($request->file('coverimage')){
            $name = time()."_".$request->file('coverimage')->getClientOriginalName();
            $element->image =$name;
            $request->file('coverimage')->move(
                 base_path() . '/public/sliders/', $name
            );


          }
          $element->save();


          $r = new ApiResponse();
          $r->success = true;
          $r->message = 'Element Success';
          $r->data = array('id'=>$element->id);
          return $r->doResponse();

      } catch(\Exception $e){
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
