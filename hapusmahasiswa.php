<?php
include 'connectdb.php';

if (isset($_GET['id'])) {
    $nim = $_GET['id'];

    $query = "DELETE FROM dhanimhs where dhaniMhsNim = '$nim'";
    $result = mysqli_query($connectdb, $query);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='dhanimahasiswa.php';</script>";
    } else {
        echo "Gagal menghapus data: " . mysqli_error($connectdb);
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location='dhanimahasiswa.php';</script>";
}
?>