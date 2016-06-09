<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function categories()
    {
      return $this->hasMany('App\Models\Categories');
    }
    public function subcategories()
    {
      return $this->hasMany('App\Models\Subcategories');
    }
    public function countries()
    {
      return $this->belongsToMany('App\Models\Countries','products_countries','product_id','country_id');
    }
    public static function getProductsByCountry($countryID,$status){

      $query = self::select('products.id as DT_RowId', 'products.*')
                 ->join('products_countries','products_countries.product_id','=','products.id')
                 ->join('countries', 'countries.id' ,'=', 'products_countries.country_id')

                 ->where('countries.id','=',$countryID);

      switch ($status) {
					case 'deleted':
							$query->onlyTrashed();
							break;
      }

      $collection = $query->get();
      return $collection;

    }
    public static function getProductsByCountryCount($countryID,$status){
      $collection = self::getProductsByCountry($countryID,$status);
      return $collection->count();

    }


}
