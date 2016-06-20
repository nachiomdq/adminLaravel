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
use App\Models\Subcategories;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Contacts;


class ClientController extends Controller
{
    //
    public function postContact(Request $request){
      try {
          $data = $request->all();
          $contact = new Contacts;
          $contact->name = $data['name'];
          $contact->lastname = $data['lastname'];
          $contact->email = $data['email'];
          $contact->subject = $data['subject'];
          $contact->tel = $data['tel'];
          $contact->query = $data['query'];
          $contact->save();

          #SendEMAIL to admin to notify the new contact
          #We send through sparkPost
          

          $r = new ApiResponse();
          $r->success = true;
          $r->message = 'OK';
          $r->data = [];
          return $r->doResponse();
      } catch (Exception $e) {
          $r = new ApiResponse();
          $r->success = false;
          $r->message = $e->getMessage();
          return $r->doResponse();
      }

    }
    public function getListBranchsByState(){
      try {
        $countryID = 1; // cuando sea multiCountry detectar la variable de sesion
        $data = Input::all();
        $this->data['branchs'] = Branchs::getBranchs($countryID,"actives",null,null,"",$data['stateID']);

        #Obtengo la primer latitud y longitud del primer state, por defecto queda en CABA SI NO HAY
        $this->data['latitude'] = "-34.642649";
        $this->data['longitude'] = "-58.546226";
        if(!$this->data['branchs']->isEmpty()){
          $this->data['latitude'] = $this->data['branchs'][0]->latitude;
          $this->data['longitude'] = $this->data['branchs'][0]->longitude;
        }
        if($data['returnView'] == "true"){
          #Instead of return response, return view to apply in front end
          return view('frontend.ajaxResponses.branchslist', $this->data);
        } else{

            $r = new ApiResponse();
            $r->success = true;
            $r->message = 'List of branchs by Category';
            $r->data = $this->data;
            return $r->doResponse();
        }







      } catch (Exception $e) {
          $r = new ApiResponse();
          $r->success = false;
          $r->message = $e->getMessage();
          return $r->doResponse();
      }
    }
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
