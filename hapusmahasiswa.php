
<?php
session_start();
require 'koneksi.php';
ceklogin();
cekadmin();
$nim = $_GET['nim'];
$query ="DELETE FROM mahasiswa WHERE nim='$nim'";


mysqli_query($conn, $query);

if(mysqli_affected_rows($conn) > 0 ) {
    echo "
            <script>
            alert('Data Berhasil Dihapus');
            document.location.href='mahasiswa.php';
            </script>  
            ";
} else {
    echo "
    <script>
    alert('Data Gagal dihapus');
    </script>  
    ";
echo mysqli_error($conn);
};
