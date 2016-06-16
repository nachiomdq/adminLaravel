<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Subcategories extends Model
{
    use SoftDeletes;
    public function products()
    {
      return $this->belongsToMany('App\Models\Products');
    }

    public static function getSubCategories($status,$take,$offset,$search=""){

      $query = self::select('subcategories.id as DT_RowId', 'subcategories.*');
      if(!is_null($take)){

        $query->take($take);
        $query->offset($offset);
      }
      if($search!=""){

        $query->where('subcategories.name','like','%'.$search.'%');
      }
      switch ($status) {

          case 'deleted':

              $query->onlyTrashed();
              break;
      }

      $collection = $query->get();
      return $collection;

    }
    public static function getSubCategoriesCount($status,$take=null,$offset=null,$search=""){
      $collection = self::getSubCategories($status,$take,$offset,$search);
      return $collection->count();

    }
}
