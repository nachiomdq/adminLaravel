<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\AbstractControllers\BaseBackendController;
use App\Models\Countries;
use App\Models\Promotions;

class PromotionsController extends BaseBackendController
{
    public function getList(){

        $this->data['countries'] = Countries::all();
        return view('backend.promotions.list', $this->data);
    }
    public function getEdit($id){


      $this->data['promotion'] = Promotions::find($id);

      return view('backend.promotions.edit', $this->data);
      /*$this->data['postData']['favorite']=Favorites::findUserFavorite('posts_data',$postId);
      $media = new Media();
      $this->data['postData']->mediasArray=$media->buildMediasArray($this->data['postData']['medias']);

      return view('client.posts.detail', $this->data);*/
    }
    public function getNew(){

      return view('backend.promotions.create', $this->data);
    }
}
