<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotions extends Model
{
    public static function getPromotions($status,$countryID,$take,$offset,$search=""){

      $query = self::select('promotions.id as DT_RowId', 'promotions.*')

                     ->where('promotions.country_id','=',$countryID);;
      if(!is_null($take)){

        $query->take($take);
        $query->offset($offset);
      }
      if($search!=""){

        $query->where('promotions.name','like','%'.$search.'%');
      }
      switch ($status) {

          case 'deleted':

              $query->onlyTrashed();
              break;
      }

      $collection = $query->get();
      return $collection;

    }
    public static function getPromotionsCount($status,$countryID,$take=null,$offset=null,$search=""){
      $collection = self::getPromotions($status,$countryID,$take,$offset,$search);
      return $collection->count();

    }
}
