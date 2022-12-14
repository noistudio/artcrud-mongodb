<?php


namespace Artcrud_mongodb\fields\select;


class SelectField
{
    private $name;
    private $config = array();
    private $field_config = array();
    private $table_config=array();

    public function __construct($array = array(),$table_config=array())
    {
        if (isset($array['name'])) {
            $this->name = $array['name'];
        }
        if (isset($array) and is_array($array)) {
            $this->config = $array;
        }
        $this->setFieldConfig("data_table", "string");
        $this->setFieldConfig("data_title", "string");
        if (isset($this->config['data_table'])) {
            $this->config['data_model'] = "\\" . config("artcrud_mg.template_model.new_name_space") . "\\" . ucfirst($this->config['data_table']);

        }
        $this->table_config=$table_config;
    }

    public function getTitleField()
    {
        return "Список";
    }

    public function getDataStore(){
        $path_to_create = __DIR__ . "/controller/store.txt";
        $result=file_get_contents($path_to_create);


        $result=str_replace("[name_table_little]",$this->table_config['name_table'],$result);
        $result=str_replace("[name]",$this->config['name'],$result);
        $result = str_replace("[data_model]", $this->config['data_model'], $result);


        return $result;

    }

    public function getDataUpdate(){
        $path_to_create = __DIR__ . "/controller/update.txt";
        $result=file_get_contents($path_to_create);
        $result = str_replace("[name]",$this->config['name'],$result);

        $result=str_replace("[name_table_little]",$this->table_config['name_table'],$result);
        $result = str_replace("[data_model]", $this->config['data_model'], $result);



        return $result;

    }

    private function setFieldConfig($name, $type)
    {
        $this->field_config[$name] = $type;

    }

    public function getFieldConfig()
    {
        return $this->field_config;
    }

    public function getMigrationForNewTable(){
        return false;
    }

    public function getMigrationCodeUp()
    {

        $code = '$table->integer("' . $this->name . '")';

        if (isset($this->config['default']) and is_string($this->config['default']) and strlen($this->config['default']) >= 1) {
            $code .= '->default("' . $this->config['default'] . '")';
        }
        if (isset($this->config['nullable'])) {
            $code .= '->nullable()';
        }
        if (isset($this->config['unique'])) {
            $code .= '->unique()';
        }


        return $code;
    }

    public function isFillable()
    {
        return true;
    }

    public function getRequestValidate(){
        return null;

    }

    public function getRequestUpdateValidate(){

        return null;
    }

    public function getTemplateCreate()
    {
        $path_to_create = __DIR__ . "/views/create.txt";
        $result = file_get_contents($path_to_create);
        $result = str_replace("[name]", $this->name, $result);
        $result = str_replace("[data_table]", $this->config['data_table'], $result);
        $result = str_replace("[data_title]", $this->config['data_title'], $result);
        $result=  str_replace("[field.title]",$this->config['title'],$result);

        return $result;
    }

    public function getTemplateEdit()
    {
        $path_to_create = __DIR__ . "/views/edit.txt";
        $result = file_get_contents($path_to_create);
        $result = str_replace("[name]", $this->name, $result);
        $result = str_replace("[data_table]", $this->config['data_table'], $result);
        $result = str_replace("[data_title]", $this->config['data_title'], $result);
        $result=  str_replace("[field.title]",$this->config['title'],$result);

        return $result;
    }

    public function getTemplateIndex()
    {
        $path_to_create = __DIR__ . "/views/index.txt";
        $result = file_get_contents($path_to_create);
        $result = str_replace("[name]", $this->name, $result);
        $result = str_replace("[data_table]", $this->config['data_table'], $result);

        $result = str_replace("[data_title]", $this->config['data_title'], $result);

        return $result;
    }

    public function getTemplateShow()
    {
        $path_to_create = __DIR__ . "/views/show.txt";
        $result = file_get_contents($path_to_create);
        $result = str_replace("[name]", $this->name, $result);
        $result = str_replace("[data_table]", $this->config['data_table'], $result);
        $result = str_replace("[data_title]", $this->config['data_title'], $result);
        $result=  str_replace("[field.title]",$this->config['title'],$result);

        return $result;
    }

    public function getDataCreate()
    {
        $path_to_create = __DIR__ . "/controller/create.txt";
        $result = file_get_contents($path_to_create);
        $result = str_replace("[data_table]", $this->config['data_table'], $result);
        $result = str_replace("[data_model]", $this->config['data_model'], $result);

        return $result;
    }

    public function getDataEdit()
    {
        $path_to_create = __DIR__ . "/controller/edit.txt";
        $result = file_get_contents($path_to_create);
        $result = str_replace("[data_table]", $this->config['data_table'], $result);
        $result = str_replace("[data_model]", $this->config['data_model'], $result);

        return $result;
    }

    public function getMethodForModel()
    {
        $path_to_create = __DIR__ . "/model/method.txt";
        $result = file_get_contents($path_to_create);
        $result = str_replace("[name]", $this->config['name'], $result);
        $result = str_replace("[data_table]", $this->config['data_table'], $result);
        $result = str_replace("[data_model]", $this->config['data_model'], $result);


        return $result;
    }


}

