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
use App\Models\Branchs;


class BranchsController extends Controller
{
    public function getDelete($ID){
      try {

        $category = Branchs::find($ID);
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
    public function getRecover($ID){
      try {

        $category = Branchs::onlyTrashed()->find($ID);
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

          $collection= Branchs::getBranchs(
                                $countryID,
                                $status,
                                $filters['take'],
                                $filters['offset'],
                                $filters['search']
                                );

          $r = new ModelResponse();

          $r->draw = $filters['draw'];

          $r->recordsTotal = Branchs::getBranchsCount($countryID,$status,null,$filters['offset'],$filters['search']);
          $r->recordsFiltered = Branchs::getBranchsCount($countryID,$status,null,$filters['offset'],$filters['search']);
          $r->success = true;
          $r->message = 'Branch List';
          $r->data = $collection;
          return $r->doResponse();
      } catch(Exception $e){
          $r = new ApiResponse();
          $r->success = false;
          $r->message = $e->getMessage();
          return $r->doResponse();
      }
    }
    public function postEdit(Request $request, $ID){
      try {

          $data = $request->all();

          $element = Branchs::find($ID);

          $element->name = $data['name'];
          $element->description = $data['descripcion'];
          $element->latitude = $data['latitude'];
          $element->subtitle = $data['subtitle'];
          $element->longitude = $data['longitude'];
          $element->save();
          #Add relationships

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

          $element = new Branchs();

          $element->name = $data['name'];
          $element->description = $data['descripcion'];
          $element->latitude = $data['latitude'];
          $element->subtitle = $data['subtitle'];
          $element->longitude = $data['longitude'];
          $element->save();
          #Add relationships

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
}
