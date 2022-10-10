<?php

    //UNTUK MEMULAI SESSION-NYA DARI FILE CORE FLASHER.PHP
    if( !session_id() ) session_start();

    //AGAR TERHUBUNG KE FILE APP INIT.PHP
    require_once '../app/init.php';


    //MEMANGGIL FILE CORE APP.PHP
    $app = new App;




?>