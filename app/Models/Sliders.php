<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Sliders extends Model
{
    use SoftDeletes;
    public static function getSliders($status,$take,$offset,$search=""){

      $query = self::select('sliders.id as DT_RowId', 'sliders.*');

      if(!is_null($take)){

        $query->take($take);
        $query->offset($offset);
      }
      if($search!=""){

        $query->where('sliders.title','like','%'.$search.'%');
      }
      switch ($status) {

          case 'deleted':

              $query->onlyTrashed();
              break;
      }

      $collection = $query->get();
      return $collection;

    }
    public static function getSlidersCount($status,$take=null,$offset=null,$search=""){
      $collection = self::getSliders($status,$take,$offset,$search);
      return $collection->count();

    }
}
