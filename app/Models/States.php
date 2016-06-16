<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    public function branchs()
    {
      return $this->belongsToMany('App\Models\Branchs');
    }
}
