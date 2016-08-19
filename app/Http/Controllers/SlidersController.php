<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\AbstractControllers\BaseBackendController;
use App\Models\Countries;
use App\Models\Sliders;
use App\Models\Products;
use App\Models\Promotions;


class SlidersController extends BaseBackendController
{
    public function getList(){

        $this->data['countries'] = Countries::all();
        return view('backend.sliders.list', $this->data);
    }
    public function getEdit($id){

      $this->data['products'] = Products::all();
      $this->data['promotions'] = Promotions::all();
      $this->data['slider'] = Sliders::find($id);

      return view('backend.sliders.edit', $this->data);
      /*$this->data['postData']['favorite']=Favorites::findUserFavorite('posts_data',$postId);
      $media = new Media();
      $this->data['postData']->mediasArray=$media->buildMediasArray($this->data['postData']['medias']);

      return view('client.posts.detail', $this->data);*/
    }
    public function getNew(){
      $this->data['products'] = Products::all();
      $this->data['promotions'] = Promotions::all();
      return view('backend.sliders.create', $this->data);
    }
}
