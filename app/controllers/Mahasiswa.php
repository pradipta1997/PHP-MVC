<?php

    //PEMBUATAN CLASS (CONTROLLERS)
    class Mahasiswa extends Controller {


        //PEMBUATAN METHOD
        public function index() {


            //Dari file header.php, agar judul halaman berubah sesuai
            $data['judul'] = 'Daftar Mahasiswa';


            //diambil dari function models di file Mahasiswa_model.php
            $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();


            //dimasukan kedalam function di file Controller.php
            $this->view('templates/header', $data);
            $this->view('mahasiswa/index', $data);
            $this->view('templates/footer');

        }



        public function detail($id) {


            //Dari file header.php, agar judul halaman berubah sesuai
            $data['judul'] = 'Detail Mahasiswa';
    
    
            //diambil dari function models di file Mahasiswa_model.php
            $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
    
    
            //dimasukan kedalam function di file Controller.php
            $this->view('templates/header', $data);
            $this->view('mahasiswa/detail', $data);
            $this->view('templates/footer');
    
        }



        public function tambah() {

            if( $this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0 ) {

                Flasher::setFlash('berhasil ', 'ditambahkan ', 'success ');  // <--harus ada spasi di akhir string
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }

            else {

                Flasher::setFlash('gagal ', 'ditambahkan ', 'danger ');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }



        public function hapus($id) {

            if( $this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0 ) {

                Flasher::setFlash('berhasil ', 'dihapus ', 'success ');  // <--harus ada spasi di akhir string
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }

            else {

                Flasher::setFlash('gagal ', 'dihapus ', 'danger ');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }



        public function getubah() {

            echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
        }


        public function ubah() {

            if( $this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0 ) {

                Flasher::setFlash('berhasil ', 'diubah ', 'success ');  // <--harus ada spasi di akhir string
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }

            else {

                Flasher::setFlash('gagal ', 'diubah ', 'danger ');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }

        }



        public function cari() {

             //Dari file header.php, agar judul halaman berubah sesuai
             $data['judul'] = 'Daftar Mahasiswa';


             //diambil dari function models di file Mahasiswa_model.php
             $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
 
 
             //dimasukan kedalam function di file Controller.php
             $this->view('templates/header', $data);
             $this->view('mahasiswa/index', $data);
             $this->view('templates/footer');


        }




    }

    

?>