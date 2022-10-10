<?php

    //PEMBUATAN CLASS (CORE)
    class Controller {


        //PEMBUATAN METHOD (views)
        public function view($view, $data = []) {

            require_once '../app/views/' .$view. '.php';
        }


        //PEMBUATAN METHOD (Models)
        public function model($model) {

            require_once '../app/models/' .$model. '.php';
            return new $model;
        }


        
    }



?>