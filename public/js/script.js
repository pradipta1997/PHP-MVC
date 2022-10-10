// <--$ ARTI-NYA KATA LAIN DARI JQUERY.
//$(function() ini adalah fungsi ready dari Jquery, dimana jika sudah ready maka file didalam nya akan dijalankan.
$(function() {  


    //FUNCTION UNTUK TOMBOL "TAMBAH DATA MAHASISWA"
    $('.tombolTambahData').on('click', function() {

        $('#formModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');

    });



    //FUNCTION UNTUK TOMBOL "UBAH DATA MAHASISWA"
    $('.tampilModalUbah').on('click', function() {

        $('#formModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/ubah');  // <--untuk menjadi action ubah data


        const id = $(this).data('id'); // <--fungsi untuk menangkap id $mhs pada tombol ubah di view mahasiswa index.php
        

        //data json dengan metode jquery
        $.ajax({

            url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){ 
                
                $('#nim').val(data.nim); // <--diambil dari data json yang sudah dibuat berdasarkan "id" pada file index.php
                $('#nama').val(data.nama);  // <--sama
                $('#jurusan').val(data.jurusan);  // <--sama
                $('#email').val(data.email);  // <--sama
                $('#id').val(data.id);  // <--sama
            }

        });


     



    });
    





});