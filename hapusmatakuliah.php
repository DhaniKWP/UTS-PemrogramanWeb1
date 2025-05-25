<?php
include 'connectdb.php';

if (isset($_GET['id'])) {
    $kode = $_GET['id'];

    $query = "DELETE FROM dhanimatkul where dhaniMatkulKode = '$kode'";
    $result = mysqli_query($connectdb, $query);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='dhanimatakuliah.php';</script>";
    } else {
        echo "Gagal menghapus data: " . mysqli_error($connectdb);
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location='dhanimatakuliah.php';</script>";
}
?>