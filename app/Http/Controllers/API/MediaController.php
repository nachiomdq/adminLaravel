<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Enums\MediaType;
use App\Models\Products;
use App\Helpers\ApiResponse;
class MediaController extends Controller
{
    public function uploadFiles(){
      try {
        $input = Input::all();

        $destinationPath = 'storage/'.$input['location']; // upload path

        $extension = Input::file('file')->getClientOriginalExtension(); // getting file extension
        $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
        $upload_success = Input::file('file')->move($destinationPath, $fileName); // uploading file to given path
        #Insert in media
        $media = new Media();
        $media->type = MediaType::IMAGE;
        $media->content = $fileName;
        $media->save();
        switch ($input['location']) {
          case 'products':
            $products = Products::find($input['id']);
            $sync = array($media->id,$input['id']);
            $products->medias()->sync($sync);


            break;


        }

        $r = new ApiResponse();
        $r->success = true;
        $r->message = 'Element Success';
        $r->data =[];
        return $r->doResponse();

      } catch (Exception $e) {
        $r = new ApiResponse();
        $r->success = false;
        $r->message = $e->getMessage();
        return $r->doResponse();
      }




    }
}
