<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\AbstractControllers\BaseBackendController;
use App\Models\Countries;
use App\Models\Categories;
use App\Models\Subcategories;
class SubCategoriesController extends BaseBackendController
{
    public function getList(){


        return view('backend.subcategories.list', $this->data);
    }
    public function getEdit($id){


      $this->data['category'] = Categories::find($id);

      return view('backend.subcategories.edit', $this->data);
      /*$this->data['postData']['favorite']=Favorites::findUserFavorite('posts_data',$postId);
      $media = new Media();
      $this->data['postData']->mediasArray=$media->buildMediasArray($this->data['postData']['medias']);

      return view('client.posts.detail', $this->data);*/
    }
    public function getNew(){

      return view('backend.subcategories.create', $this->data);
    }
}
