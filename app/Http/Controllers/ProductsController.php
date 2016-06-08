<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProductsController extends Controller
{
    public function getList(){
        $this->data= [];
        return view('backend.products.list', $this->data);
    }
}
