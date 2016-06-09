<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\AbstractControllers\BaseBackendController;
use App\Models\Countries;
use App\Models\Categories;
use App\Models\Subcategories;

class ProductsController extends BaseBackendController
{
    public function getList(){
        $this->data['countries'] = Countries::all();
        $this->data['categories'] = Categories::all();
        $this->data['subcategories'] = Subcategories::all();
        
        return view('backend.products.list', $this->data);
    }
}
