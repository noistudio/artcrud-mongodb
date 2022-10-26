<?php

namespace Artcrud_mongodb\controllers;

use Artcrud_mongodb\FieldModel;
use Artcrud_mongodb\fields\string\NumberField;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class CrudController extends Controller
{
    public function create()
    {


        $fields = FieldModel::getFields();

        $data['fields'] = $fields;
        return view("artcrud_mg::create_table", $data);
    }

    public function get_field(){
     $post=request()->post();
     if(isset($post['field'])) {
         $field = FieldModel::get($post['field']);
         $data['field']=$field;
         $data['config']=$field->getFieldConfig();
         if(method_exists($field,"getDefaultValues")){
         $data['defaults_value']=$field->getDefaultValues();
         }
         return view("artcrud_mg::get_field",$data);

     }
    }

    public function docreate(){

        $result=FieldModel::generateConfigFile();
        return "plz run php artisan artcrud_mg:table artcrud_mg.txt";
    }
}
