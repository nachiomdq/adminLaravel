<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\AbstractControllers\BaseBackendController;
use App\Models\Countries;
use App\Models\Categories;
use App\Models\Subcategories;

class CategoriesController extends BaseBackendController
{
    public function getList(){
      $this->data = [];
      return view('backend.categories.list', $this->data);
    }
    public function getEdit($id){


      $this->data['category'] = Categories::find($id);

      return view('backend.categories.edit', $this->data);
      /*$this->data['postData']['favorite']=Favorites::findUserFavorite('posts_data',$postId);
      $media = new Media();
      $this->data['postData']->mediasArray=$media->buildMediasArray($this->data['postData']['medias']);

      return view('client.posts.detail', $this->data);*/
    }
    public function getNew(){
      $this->data = [];
      return view('backend.categories.create', $this->data);
    }
}
