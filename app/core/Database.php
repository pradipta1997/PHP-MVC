<?php

    //PEMBUATAN CLASS (CORE)
    class Database {


        //PEMBUATAN PROPERTY
        private $host    = DB_HOST;
        private $user    = DB_USER;
        private $pass    = DB_PASS;
        private $db_name = DB_NAME;


        private $dbh;   // <-- database handler
        private $stmt;  // <-- statment

//-----------------------------------------------------------------------------------------------------

        //PEMBUATAN METHOD CONSTRUCT 
        public function __construct() {

            $dsn = 'mysql: host=' .$this->host. ';dbname=' .$this->db_name; // <-- data source name


            //PEMBUATAN OPTION, AGAR KONEKSI DATABASE SELALU TERJAGA BAIK
            $option = [

                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];


            try {
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
            }

            catch(PDOException $e) {
                die($e->getMessage());
            }

        }

//-----------------------------------------------------------------------------------------------------

        //PEMBUATAN METHOD
        public function query($query) {

            $this->stmt = $this->dbh->prepare($query);
        }



        //QUERY UNTUK MEN-GENERIK
        public function bind($param, $value, $type = null) {

            if( is_null($type) ) {

                switch( true ) {

                    case is_int($value) :
                        $type = PDO::PARAM_INT;
                        break;

                    case is_bool($value) :
                        $type = PDO::PARAM_BOOL;
                        break;

                    case is_null($value) :
                        $type = PDO::PARAM_NULL;
                        break;

                    default :
                        $type = PDO::PARAM_STR;

                }

            }


            //untuk mem-binding hasil generik diatas, agar lebih aman dan tidak bisa di sql injection
            $this->stmt->bindValue($param, $value, $type);

        }



        //untuk meng-eksekusi statment-nya (stmt)
        public function execute() {

            $this->stmt->execute();
        }


        //untuk mencetak data yang banyak, (misal SELECT * FROM mahasiswa)
        public function resultSet() {

            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }


        //untuk mencetak data cuma satu saja
        public function single() {

            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }


        //angka yang akan menghitung, ada berapa baris data yang ditambahkan & dihapus
        public function rowCount() {

            return $this->stmt->rowCount();
        }


    }




    






?>