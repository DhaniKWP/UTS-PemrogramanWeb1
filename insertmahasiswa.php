<?php
include 'connectdb.php';

$pesan = '';
$tujuan = 'dhanimahasiswa.php';

if (isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $kota = $_POST['kota'];
    $alamat = $_POST['alamat'];

    $check_query = "SELECT dhaniMhsNim FROM dhanimhs WHERE dhaniMhsNim = '$nim'";
    $check_result = mysqli_query($connectdb, $check_query);
  
    if (mysqli_num_rows($check_result) > 0) {
        $pesan = "NIM $nim GANDA BROOO!";
    } else {
        $query = "INSERT INTO dhanimhs (dhaniMhsNim, dhaniMhsNama, dhaniMhsProdi, dhaniMhsKota, dhaniMhsAlamat) 
                  VALUES ('$nim', '$nama', '$prodi','$kota','$alamat')";
        
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
    <h2>Tambah Data Mahasiswa Baru</h2>
    <form method="POST" action="insertmahasiswa.php">
        <div class="form-group">
            <label>NIM:</label>
            <input type="text" name="nim" required maxlength="20">
        </div>
        <div class="form-group">
            <label>Nama Mahasiswa:</label>
            <input type="text" name="nama" required maxlength="50">
        </div>
        <div class="form-group">
            <label>Program Studi:</label>
            <input type="text" name="prodi" required maxlength="30">
        </div>
        <div class="form-group">
            <label>Kota Asal:</label>
            <input type="text" name="kota" required maxlength="30">
        </div>
        <div class="form-group">
            <label>Alamat Mahasiswa:</label>
            <input type="text" name="alamat" required maxlength="30">
        </div>
        
        <div class="button-group">
            <button type="submit" name = "submit" class="btn-submit">Simpan Data</button>
            <a href="dhanimahasiswa.php" class="cancel-btn">Batal</a>
        </div>
    </form>
</article>