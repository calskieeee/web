
<?php
session_start();
require 'koneksi.php';
ceklogin();
cekadmin();
include 'template/header.php';
include 'template/side.php';


$query = "SELECT * FROM prodi";
$hasil = mysqli_query($conn, $query);

$dataProdi = [];
while ($baris = mysqli_fetch_assoc($hasil)) {
  $dataProdi[] = $baris;
}

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Mahasiswa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Data Mahasiswa</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Tambah Mahasiswa</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="tambahaksimahasiswa.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="nim">NIM</label>
                  <input type="text" name="nim" class="form-control" id="nim" placeholder="Masukkan NIM">
                </div>
                <div class="form-group">
                  <label for="namamahasiswa">Nama Mahasiswa</label>
                  <input type="text" name="namamahasiswa" class="form-control" id="namamahasiswa"
                    placeholder="Masukkan Nama Mahasiswa">
                </div>
                <div class="form-group">
                  <label for="namaprodi">Prodi</label>
                  <select name="namaprodi" id="namaprodi" class="form-control">
                    <?php
                    foreach ($dataProdi as $data) {
                      ?>
                      <option id="<?php echo $data['nama_prodi'] ?>" value="<?php echo $data['id_prodi'] ?>">
                        <?php echo $data['nama_prodi'] ?>
                      </option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="nomorhp">Nomor HP</label>
                  <input type="text" name="nomorhp" class="form-control" id="nomorhp" placeholder="Masukkan Nomor HP">
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan Alamat">
                </div>
                <div class="form-group">
                  <label for="photo">Foto</label><br>
                  <input type="file" name="photo" id="photo" accept="image/*" >
                </div>
              </div>

              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-danger">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">

          <!-- /.card-footer -->
      </div>

  </section>
  <!-- right col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<?php
include 'template/footer.php';
?>
