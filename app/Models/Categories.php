<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Categories extends Model
{
  use SoftDeletes;
  public function products()
  {
    return $this->belongsToMany('App\Models\Products');
  }

  public static function getCategories($status,$take,$offset){

    $query = self::select('categories.id as DT_RowId', 'categories.*');
    if(!is_null($take)){

      $query->take($take);
      $query->offset($offset);
    }

    switch ($status) {

        case 'deleted':

            $query->onlyTrashed();
            break;
    }

    $collection = $query->get();
    return $collection;

  }
  public static function getCategoriesCount($status,$take=null,$offset=null){
    $collection = self::getCategories($status,$take,$offset);
    return $collection->count();

  }
}
