<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Subcategories;
use Meta;
class ProductsController extends Controller
{
    public function getIndex(){
      $this->data['products'] = Products::all();
      $this->data['categories'] = Categories::all();
      $urlFriendly =  $this->getRouter()->current()->getParameter('FRIENDLYURL');
      if(!is_null($urlFriendly)){
        $this->data['categoriesSelectedNames'] = Categories::where('friendly_url',$urlFriendly)->get()->toArray();
        $this->data['subcategories'] = Subcategories::getSubCategoriesByCategory($this->data['categoriesSelectedNames']);

      } else{
        #Obtengo la primer categoria
        $this->data['categoriesSelectedNames'] = Categories::all()->take(1)->toArray();
      }

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
    public function getDetailv2(){
      #Data
      $this->data['categories'] = Categories::all();

      $urlFriendly =  $this->getRouter()->current()->getParameter('FRIENDLYURL');
      $this->data['product'] = Products::with('categories','subcategories','medias')->where('friendly_url',$urlFriendly)->get();

      #Products Related
      $this->data['categoriesSelected'] =   $this->data['product'][0]->categories()->lists('category_id')->toArray();
      $this->data['subCategoriesSelected'] =   $this->data['product'][0]->subcategories()->lists('subcategory_id')->toArray();
      $this->data['productForThisCategories'] = Products::getProductsByManyCategories($this->data['categoriesSelected']);
      $this->data['categoriesSelectedNames'] = Categories::whereIn('id',$this->data['categoriesSelected'])->orderBy('name')->get();
      $this->data['subCategoriesSelectedNames'] = Subcategories::whereIn('id',$this->data['subCategoriesSelected'])->orderBy('name')->get();
      $this->data['subcategories'] = Subcategories::getSubCategoriesByCategory($this->data['categoriesSelected']);

  
      if($this->data['product']->isEmpty()){
        return Response::view('errors.missing', array(), 404);
      }


      #SEO
      Meta::setTitle($this->data['product'][0]['name']);
      Meta::setDescription($this->data['product'][0]['description']);
      Meta::setKeywords($this->data['product'][0]['tags']);

      return view('frontend.productsdetailv2', $this->data);
    }
}
