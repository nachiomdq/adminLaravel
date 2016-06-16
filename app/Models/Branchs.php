<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Branchs extends Model
{
  use SoftDeletes;
  protected $table = 'branch_offices';
  public function countries()
  {
    return $this->belongsToMany('App\Models\Countries','branch_countries','branch_id','country_id');
  }
  public static function getBranchs($countryID,$status,$take,$offset,$search=""){

    $query = self::select('branch_offices.id as DT_RowId', 'branch_offices.*')
                   ->join('branch_countries','branch_countries.branch_id','=','branch_offices.id')
                   ->join('countries', 'countries.id' ,'=', 'branch_countries.country_id')

                   ->where('countries.id','=',$countryID);;

    if(!is_null($take)){

      $query->take($take);
      $query->offset($offset);
    }
    if($search!=""){

      $query->where('branch_offices.name','like','%'.$search.'%');
    }
    switch ($status) {

        case 'deleted':

            $query->onlyTrashed();
            break;
    }

    $collection = $query->get();
    return $collection;

  }
  public static function getBranchsCount($countryID,$status,$take=null,$offset=null,$search=""){
    $collection = self::getBranchs($countryID,$status,$take,$offset,$search);
    return $collection->count();

  }
}
