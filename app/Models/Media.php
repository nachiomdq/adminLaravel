<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    public function products() {
        return $this->belongsToMany('App\Models\Products', 'products_media', 'media_id', 'product_id');
    }
}
