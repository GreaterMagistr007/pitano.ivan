<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MainSettings extends Model
{
    public static $models = [
        "Sets"=>[
            "show"  =>  true,
            "title" =>  "Наборы"
        ],
        "Pasta"=>[
            "show"  =>  true,
            "title" =>  "Неаполитанская пицца"
        ],
        "Pinza"=>[
            "show"  =>  true,
            "title" =>  "Римская пицца"
        ],
        "Salat"=>[
            "show"  =>  true,
            "title" =>  "Салаты"
        ],
        "Soup"=>[
            "show"  =>  false,
            "title" =>  "Супы"
        ],
        "Makaron"=>[
            "show"  =>  true,
            "title" =>  "Паста"
        ],
        "Hot"=>[
            "show"  =>  true,
            "title" =>  "Горячее"
        ],
        "Dessert"=>[
            "show"  =>  true,
            "title" =>  "Десерты"
        ],
    ];
    static function get__model_show_on_site(){
        $value = self::where("id",1)->first()->model_show_on_site;
//        $value = "";

//        dd($value);

//        dd(json_encode(self::$models));

        return ($value && strlen($value)) ? json_decode($value) : self::$models;
    }
    static function save__model_show_on_site($models){
        $this_model = self::where("id",1)->first();
        $this_model->model_show_on_site = json_encode($models);
        $this_model->save();
//        self::where("id",1)->update(["model_show_on_site",json_encode($models)]);
    }
}
