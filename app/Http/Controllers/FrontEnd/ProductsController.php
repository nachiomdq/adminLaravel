<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Categories;
use Meta;
class ProductsController extends Controller
{
    public function getIndex(){
      $this->data['products'] = Products::all();
      $this->data['categories'] = Categories::all();

      return view('frontend.products', $this->data);
    }

    public function getDetail(){

      $this->data['categories'] = Categories::all();
      $urlFriendly =  $this->getRouter()->current()->getParameter('FRIENDLYURL');
      $this->data['product'] = Products::with('categories','subcategories','medias')->where('friendly_url',$urlFriendly)->get();

      if($this->data['product']->isEmpty()){
        return Response::view('errors.missing', array(), 404);
      }
      #SEO
      Meta::setTitle($this->data['product'][0]['name']);
      Meta::setDescription($this->data['product'][0]['description']);
      Meta::setKeywords($this->data['product'][0]['tags']);

      return view('frontend.productsdetail', $this->data);
    }
}
