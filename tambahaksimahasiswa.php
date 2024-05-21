
<?php
session_start();
require 'koneksi.php';
ceklogin();
cekadmin();

$nim = $_POST['nim'];
$nama = $_POST['namamahasiswa'];
$prodi = $_POST['namaprodi'];
$nomorhp = $_POST['nomorhp'];
$alamat = $_POST['alamat'];
$namaFile = $_FILES['photo']['name'];
$tmpName = $_FILES['photo']['tmp_name'];
move_uploaded_file($tmpName, "C:/xampp/htdocs/webIcal/dist/img/" . $namaFile);
$password = password_hash($nim,PASSWORD_DEFAULT);

$query = 'INSERT INTO mahasiswa (nim, nama, no_hp, alamat, password, id_prodi, foto)
             VALUES ("' . $nim . '", "' . $nama . '", "' . $nomorhp . '", "' . $alamat . '", "'.$password.'", "' . $prodi . '", "' .$namaFile. '")';



mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0) {
    echo "
            <script>
            alert('Data Berhasil Ditambahkan');
            document.location.href='mahasiswa.php';
            </script>
    ";
} else {
    echo "
    <script>
    alert ('Data gagal ditambahkan');
    </script>
";
    echo mysqli_error($conn);
}
;
