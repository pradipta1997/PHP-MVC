<div class = "container mt-3">


    <!-- MEMANGGIL FLASHER MESSAGE -->
    <div class="row">
      <div class="col-lg-6">

        <?php Flasher::flash(); ?>
      
      </div>
    </div>


    <!-- TOMBOL TAMBAH DATA MAHASISWA -->
    <div class = "row mt-5">
      <div class = "col-lg-6">

            <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
                Tambah Data Mahasiswa
            </button>

      </div>
    </div>



    <!-- TOMBOL CARI DATA MAHASISWA/INPUT GROUP -->
    <div class = "row">
      <div class = "col-lg-6">

            <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
            
              <div class="input-group mt-3">
                <input type="text" class="form-control" placeholder="Cari Data Mahasiswa..." name="keyword" id="keyword" autocomplete="off">
                
                  <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit" id="tombolCari">Cari</button>
                  </div>

              </div>

            </form>

      </div>
    </div>



    <!-- LIST GROUP -->
    <div class = "row">
        <div class = "col-lg-6">

            <!-- LABLE JUDUL -->
            <h3 class="font-weight-bold mt-3">DAFTAR MAHASISWA</h3>


                <!-- DAFTAR LIST MAHASISWA -->
                <ul class="list-group mt-3 shadow">

                    <?php foreach( $data['mhs'] as $mhs ) : ?>

                        <li class="list-group-item ">
                        
                            <?= $mhs['nama']; ?>
                               
                            <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" 
                            class="badge badge-danger float-right ml-1" onclick="return confirm('Anda yakin?');">Hapus</a>

                            <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id']; ?>" 
                            class="badge badge-success float-right ml-1 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id']; ?>">Ubah</a>

                            <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" 
                            class="badge badge-primary float-right ml-1">Detail</a>

                        </li>

                    <?php endforeach; ?>

                </ul>

        </div>
    </div>

</div>




<!-- MODAL -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">

  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <div class="modal-body">
        
        <!-- form input -->
        <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
            
            <input type="hidden" name="id" id="id">  <!-- untuk menjadi data json pada script.js -->

            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="number" class="form-control" id="nim" name="nim" placeholder="Masukan NIM Mahasiswa">
            </div>

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Mahasiswa">
            </div>

            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select class="form-control" id="jurusan" name="jurusan">

                <option value="---">---</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Teknik Elektro">Teknik Elektro</option>
                <option value="Teknik Komputer">Teknik Komputer</option>
                <option value="Teknik Arsitektur">Teknik Arsitektur</option>
                <option value="Teknik Industri">Teknik Industri</option>
                <option value="Teknik Sipil">Teknik Sipil</option>
                <option value="Teknik Agrocultur">Teknik Agrocultur</option>
                <option value="Teknik Mesin">Teknik Mesin</option>
                <option value="Teknik Nuklir">Teknik Nuklir</option>
                <option value="Teknik Lingkungan">Teknik Lingkungan</option>
                <option value="Teknik Perminyakan">Teknik Perminyakan</option>
               
                </select>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email Mahasiswa">
            </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>

    </div>
  </div>

</div>