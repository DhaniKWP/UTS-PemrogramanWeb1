<?php
include 'connectdb.php';

$pesan = '';
$tujuan = 'dhanidosen.php';

if (isset($_POST['submit'])) {
    $nid = $_POST['nid'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];

    $check_query = "SELECT dhaniDosenNid FROM dhanidosen WHERE dhaniDosenNid = '$nid'";
    $check_result = mysqli_query($connectdb, $check_query);
  
    if (mysqli_num_rows($check_result) > 0) {
        $pesan = "NID $nid sudah ada dalam database!";
    } else {
        $query = "INSERT INTO dhanidosen (dhaniDosenNid, dhaniDosenNama, dhaniDosenProdi) 
                  VALUES ('$nid', '$nama', '$prodi')";
        
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
    <h2>Tambah Data Dosen Baru</h2>
    <form method="POST" action="insertdosen.php">
        <div class="form-group">
            <label>NID:</label>
            <input type="text" name="nid" required maxlength="20">
        </div>
        <div class="form-group">
            <label>Nama Dosen:</label>
            <input type="text" name="nama" required maxlength="50">
        </div>
        <div class="form-group">
            <label>Program Studi:</label>
            <input type="text" name="prodi" required maxlength="30">
        </div>
        
        <div class="button-group">
            <button type="submit" name = "submit" class="btn-submit">Simpan Data</button>
            <a href="dhanidosen.php" class="cancel-btn">Batal</a>
        </div>
    </form>
</article>