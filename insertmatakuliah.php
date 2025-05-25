<?php
include 'connectdb.php';

$pesan = '';
$tujuan = 'dhanimatakuliah.php';

if (isset($_POST['submit'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $sks = $_POST['sks'];

    $check_query = "SELECT dhaniMatkulKode FROM dhanimatkul WHERE dhaniMatkulKode = '$kode'";
    $check_result = mysqli_query($connectdb, $check_query);
    
    if (mysqli_num_rows($check_result) > 0) {
        $pesan = "KODE $kode sudah ada dalam database!";
    } else {
        $query = "INSERT INTO dhanimatkul (dhaniMatkulKode, dhaniMatkulNama, dhaniMatkulSks) 
                  VALUES ('$kode', '$nama', '$sks')";
        
        if (mysqli_query($connectdb, $query)) {
            $pesan = "Data berhasil ditambahkan!";
        } else {
            $pesan = "Gagal menambahkan data: " . mysqli_error($connectdb);
        }
    }
    echo "<script>
            alert('$pesan');
            window.location.href = '$tujuan';
          </script>";
    exit();
}
?>
<article class="form-container">
    <h2>Tambah Data Matakuliah Baru</h2>
    <form method="POST" action="insertmatakuliah.php">
        <div class="form-group">
            <label>Kode Matakuliah:</label>
            <input type="text" name="kode" required maxlength="20">
        </div>
        <div class="form-group">
            <label>Nama Matakuliah:</label>
            <input type="text" name="nama" required maxlength="50">
        </div>
        <div class="form-group">
            <label>Sks:</label>
            <input type="number" name="sks" required maxlength="30">
        </div>
        
        <div class="button-group">
            <button type="submit" name = "submit" class="btn-submit">Simpan Data</button>
            <a href="dhanimatakuliah.php" class="cancel-btn">Batal</a>
        </div>
    </form>
</article>