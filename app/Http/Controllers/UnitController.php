<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnitController extends Controller
{
    function get($modules){
        return $this->set_modules_and_return_this_class_func($modules);
    }

    function post($modules){
        return $this->set_modules_and_return_this_class_func($modules);
    }

    function get_by_id($id=null){

    }
}
