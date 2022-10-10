<?php

    //PEMBUATAN CLASS (CONTROLLERS)
    class About extends Controller {


        //PEMBUATAN METHOD (DEFAULT)
        public function index($nama = "(nama)", $pekerjaan = "(pekerjaan)", $umur = 0) {

            //jika user memasukan data
            $data['nama']      = $nama;
            $data['pekerjaan'] = $pekerjaan;
            $data['umur']      = $umur;


            ////dari file header.php, agar judul halaman berubah sesuai
            $data['judul'] = 'About Me';

            //dimasukan kedalam function di file Controller.php
            $this->view('templates/header', $data);
            $this->view('about/index', $data);
            $this->view('templates/footer');
        }


        ////PEMBUATAN METHOD (METHOD)
        public function page() {


            //
            $data['judul'] = 'About Page';

            //dimasukan kedalam function di file Controller.php
            $this->view('templates/header', $data);
            $this->view('about/page');
            $this->view('templates/footer');
        }


    }





?>