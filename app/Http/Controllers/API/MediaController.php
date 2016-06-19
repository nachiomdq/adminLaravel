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
        $arrayAttach = array();
        foreach ($input['file'] as $file) {
            $extension = $file->getClientOriginalExtension(); // getting file extension
            $fileName = rand(11111, 99999) . '.' . $extension; // renameing image
            $upload_success = $file->move($destinationPath, $fileName); // uploading file to given path
            #Insert in media
            $media = new Media();
            $media->type = MediaType::IMAGE;
            $media->content = $fileName;
            $media->save();
            $arrayAttach[] = $media->id;
        }

        switch ($input['location']) {
          case 'products':
            $products = Products::find($input['productId']);
            foreach($arrayAttach as $attach){
          
              $products->medias()->attach($attach);
            }


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
