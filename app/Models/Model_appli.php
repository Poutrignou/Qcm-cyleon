<?php

class Model_appli extends Model
{
    public static function getModel()
    {
        if(is_null(Model::$instance)) {
            Model::$instance = new Model_appli();
        }
        return Model::$instance;
    }



}