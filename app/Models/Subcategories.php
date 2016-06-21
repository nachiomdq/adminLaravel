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
    public function categories()
    {
      return $this->belongsToMany('App\Models\Categories','subcategories_categories','subcategory_id','category_id');
    }
    public static function getSubCategoriesByCategory($categories){

      $query = self::select('subcategories.id as DT_RowId', 'subcategories.*')

                    ->join('subcategories_categories','subcategories_categories.subcategory_id','=','subcategories.id')
                    ->whereIn('subcategories_categories.category_id',$categories);


      $collection = $query->get();
      return $collection;
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
