<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Products extends Model
{
    use SoftDeletes;
    public function categories()
    {
      return $this->belongsToMany('App\Models\Categories','products_categories','product_id','category_id');
    }
    public function subcategories()
    {
      return $this->belongsToMany('App\Models\Subcategories','products_subcategories','product_id','subcategory_id');
    }
    public function countries()
    {
      return $this->belongsToMany('App\Models\Countries','products_countries','product_id','country_id');
    }
    public function medias() {
        return $this->belongsToMany('App\Models\Media', 'products_media', 'product_id', 'media_id');
    }
    public static function getProductsByCountry($countryID,$status,$take,$offset,$categories=null,$subcategories=null){

      $query = self::select('products.id as DT_RowId', 'products.*','products_countries.price')
                 ->join('products_countries','products_countries.product_id','=','products.id')
                 ->join('countries', 'countries.id' ,'=', 'products_countries.country_id')

                 ->where('countries.id','=',$countryID);
      if(!is_null($take)){

        $query->take($take);
        $query->offset($offset);
      }
      if(!is_null($categories)){
        $query->join('products_categories', 'products_categories.product_id' ,'=', 'products.id');
        $query->join('categories', 'products_categories.category_id' ,'=', 'categories.id');
        $query->where('categories.id','=',$categories);
      }
      if(!is_null($subcategories)){

        $query->join('products_subcategories', 'products_subcategories.product_id' ,'=', 'products.id');
        $query->join('subcategories', 'products_subcategories.subcategory_id' ,'=', 'subcategories.id');
        $query->where('subcategories.id','=',$subcategories);
      }
      switch ($status) {
					case 'deleted':
							$query->onlyTrashed();
							break;
      }

      $collection = $query->get();
      return $collection;

    }
    public static function getProductsByCountryCount($countryID,$status,$take=null,$offset=null,$categories=null,$subcategories=null){
      $collection = self::getProductsByCountry($countryID,$status,$take,$offset,$categories,$subcategories);
      return $collection->count();

    }


}
