<?php

    //PEMBUATAN CLASS (CORE)
    class App {

        //PEMBUATAN PROPERTY
        protected $controller = 'Home';
        protected $method     = 'index';
        protected $params     = []; 



        //PEMBUATAN CONSTRUCT METHOD
        public function __construct() {

            $url = $this->parseURL();
            

            //controller
            if( file_exists('../app/controllers/' .$url[0]. '.php') ) {

                $this->controller = $url[0];
                unset($url[0]);  
            }

            require_once '../app/controllers/' .$this->controller. '.php';
            $this->controller = new $this->controller;


            //method
            if( isset($url[1]) ) {

                if( method_exists($this->controller, $url[1]) ) {

                    $this->method = $url[1];
                    unset($url[1]);
                }
            }


            //params
            if( !empty($url) ) {

                $this->params = array_values($url);
            }


            //jalanakan controller & method, serta kirimkan params jika ada
            call_user_func_array([$this->controller, $this->method], $this->params);

        }


        //PEMBUATAN METHOD (pretty url)
        public function parseURL() {

            if( isset($_GET['url']) ) {

                $url = rtrim($_GET['url'], '/');  // <--Untuk memangkas url berdasarkan "/" untuk dijadikan string
                $url = filter_var($url, FILTER_SANITIZE_URL);  // <--Untuk membersihkan url dari karakter sembarang
                $url = explode('/', $url);  // <--Untuk memecah url per "/"
                return $url;

            }

        }




    }



?>