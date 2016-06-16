<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\AbstractControllers\BaseBackendController;
use App\Models\Branchs;
use App\Models\Countries;


class BranchsController extends BaseBackendController
{
    public function getList(){
      $this->data['countries'] = Countries::all();
      return view('backend.branchs.list', $this->data);
    }
    public function getEdit($id){
      $this->data['countries'] = Countries::all();
      $this->data['branch'] = Branchs::find($id);
      $this->data['selectedCountries'] =  $this->data['branch']->countries()->lists('country_id')->toArray();
      return view('backend.branchs.edit', $this->data);
      /*$this->data['postData']['favorite']=Favorites::findUserFavorite('posts_data',$postId);
      $media = new Media();
      $this->data['postData']->mediasArray=$media->buildMediasArray($this->data['postData']['medias']);

      return view('client.posts.detail', $this->data);*/
    }
    public function getNew(){
      return view('backend.branchs.create', $this->data);
    }
}
