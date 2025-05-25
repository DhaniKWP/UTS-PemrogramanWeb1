<article>
      <h1 align="center">DATA MATAKULIAH</h1>
      <table border="1" width="100%">
        <thead>
          <tr>
            <th width="5%">NO</th>
            <th width="10%">KODE</th>
            <th width="50%">MATAKULIAH</th>
            <th width="20%">SKS</th>
            <th width="15%"><a href="insertmatakuliahinput.php">TINDAKAN</a></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          include "connectdb.php";
          $dhanidata = mysqli_query($connectdb,"SELECT * FROM dhanimatkul");
          while($dhani = mysqli_fetch_array($dhanidata)){
          ?>
          <tr>
            <td><?php echo $no++;?></td>
            <td><?php echo $dhani["dhaniMatkulKode"];?></td>
            <td><?php echo $dhani["dhaniMatkulNama"];?></td>
            <td><?php echo $dhani["dhaniMatkulSks"];?></td>
            <td><a href="hapusmatakuliah.php?id=<?php echo $dhani["dhaniMatkulKode"];?>">HAPUS</a></td>
          </tr>
        </tbody>
        <?php } ?>
      </table>
</article>