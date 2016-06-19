<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\AbstractControllers\BaseBackendController;
use App\Models\Countries;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Subcategories;

class ProductsController extends BaseBackendController
{
    public function getList(){
        $this->data['countries'] = Countries::all();
        $this->data['categories'] = Categories::all();
        $this->data['subcategories'] = Subcategories::all();

        return view('backend.products.list', $this->data);
    }
    public function getEdit($id){


      $this->data['categories'] = Categories::all();
      $this->data['subcategories'] = Subcategories::all();
      $this->data['countries'] = Countries::all();
      $this->data['product'] = Products::with('categories','subcategories')->find($id);
      $this->data['selectedCategories'] =  $this->data['product']->categories()->lists('category_id')->toArray();
      $this->data['selectedSubCategories'] =  $this->data['product']->subcategories()->lists('subcategory_id')->toArray();
      $this->data['selectedCountries'] =  $this->data['product']->countries()->lists('country_id')->toArray();
      //$this->data['product']['tablesizes'] = json_decode($this->data['product']['table_of_sizes']);
      //$this->data['product']['countTables'] = count($this->data['product']['tablesizes']);
      return view('backend.products.edit', $this->data);
      /*$this->data['postData']['favorite']=Favorites::findUserFavorite('posts_data',$postId);
      $media = new Media();
      $this->data['postData']->mediasArray=$media->buildMediasArray($this->data['postData']['medias']);

      return view('client.posts.detail', $this->data);*/
    }
    public function getNew(){
      $this->data['categories'] = Categories::all();
      $this->data['subcategories'] = Subcategories::all();
      $this->data['countries'] = Countries::all();
      return view('backend.products.create', $this->data);
    }
}
