<article> 
      <h2 align="center">DATA MAHASISWA</h2>
      <table border="1" width="100%">
        <thead>
          <tr>
            <th width="5%">NO</th>
            <th width="15%">NIM</th>
            <th width="20%">NAMA</th>
            <th width="10%">PRODI</th>
            <th width="10%">KOTA</th>
            <th width="25%">ALAMAT</th>
            <th width="15%"><a href="insertmahasiswainput.php">TINDAKAN</a></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          include "connectdb.php";
          $dhanidata = mysqli_query($connectdb,"SELECT * FROM dhanimhs");
          while($dhani = mysqli_fetch_array($dhanidata)){
          ?>
          <tr>
            <td><?php echo $no++;?></td>
            <td><?php echo $dhani["dhaniMhsNim"];?></td>
            <td><?php echo $dhani["dhaniMhsNama"];?></td>
            <td><?php echo $dhani["dhaniMhsProdi"];?></td>
            <td><?php echo $dhani["dhaniMhsKota"];?></td>
            <td><?php echo $dhani["dhaniMhsAlamat"];?></td>
            <td><a href="hapusmahasiswa.php?id=<?php echo $dhani["dhaniMhsNim"];?>">HAPUS</a></td>
          </tr>
        </tbody>
        <?php } ?>
      </table>
</article>