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
    return $this->belongsTo('App\Models\Countries','country_id');
  }
  public function states()
  {
    return $this->belongsTo('App\Models\States','state_id');
  }
  public static function getBranchs($countryID,$status,$take,$offset,$search="",$stateId = null){

    $query = self::select('branch_offices.id as DT_RowId', 'branch_offices.*')

                   ->join('countries', 'countries.id' ,'=', 'branch_offices.country_id')

                   ->where('branch_offices.country_id','=',$countryID);;

    if(!is_null($take)){

      $query->take($take);
      $query->offset($offset);
    }
    if(!is_null($stateId)){
      if($stateId != "-1")
      $query->where('branch_offices.state_id','=',$stateId);;

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
