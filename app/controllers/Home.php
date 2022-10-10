<?php

    //PEMBUATAN CLASS (CONTROLLERS)
    class Home extends Controller {

        //PEMBUATAN METHOD (DEFAULT)
        public function index() {

            //dari file header.php, agar judul halaman berubah sesuai
            $data['judul'] = 'Home';

            //diambil dari function models di file User_model.php
            $data['nama'] = $this->model('User_model')->getUser();

            //dimasukan kedalam function di file Controller.php
            $this->view('templates/header', $data);
            $this->view('home/index', $data);
            $this->view('templates/footer');
        }


    }



?>