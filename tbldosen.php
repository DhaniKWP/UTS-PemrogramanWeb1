<article>
<h1 align="center">DATA DOSEN</h1>
      <table border="1" width="100%">
        <thead>
          <tr>
            <th width="5%">NO</th>
            <th width="15%">NID</th>
            <th width="50%">NAMA</th>
            <th width="15%">PENDIDIKAN</th>
            <th width="15%"><a href="insertdoseninput.php">TINDAKAN</a></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          include "connectdb.php";
          $dhanidata = mysqli_query($connectdb,"SELECT * FROM dhanidosen");
          while($dhani = mysqli_fetch_array($dhanidata)){
          ?>
          <tr>
            <td><?php echo $no++;?></td>
            <td><?php echo $dhani["dhaniDosenNid"];?></td>
            <td><?php echo $dhani["dhaniDosenNama"];?></td>
            <td><?php echo $dhani["dhaniDosenPendidikan"];?></td>
            <td><a href="hapusdosen.php?id=<?php echo $dhani["dhaniDosenNid"];?>">HAPUS</a></td>
            
          </tr>
        </tbody>
        <?php } ?>
      </table>
</article>