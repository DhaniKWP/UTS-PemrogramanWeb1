<?php
include 'connectdb.php';

if (isset($_GET['id'])) {
    $nid = $_GET['id'];

    $query = "DELETE FROM dhanidosen where dhaniDosenNid = '$nid'";
    $result = mysqli_query($connectdb, $query);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus!'); window.location='dhanidosen.php';</script>";
    } else {
        echo "Gagal menghapus data: " . mysqli_error($connectdb);
    }
} else {
    echo "<script>alert('ID tidak ditemukan'); window.location='dhanidosen.php';</script>";
}
?>