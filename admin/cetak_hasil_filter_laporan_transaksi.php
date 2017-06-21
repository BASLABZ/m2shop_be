<?php 
include 'koneksi.php';
if (isset($_POST['cetak'])){
  $per1=$_POST['periode1'];
  $per2=$_POST['periode2'];
  $sql = "SELECT o.id_orders,o.tgl_order,k.nama_lengkap,d.jumlah,k.alamat,k.kabupaten,k.propinsi FROM orders o 
          inner join orders_detail d
          on o.id_orders = d.id_orders
          cross join produk p 
          on d.id_produk = p.id_produk 
          cross join kustomer k 
          on o.id_kustomer = k.id_kustomer  
          WHERE o.tgl_order BETWEEN '$per1' AND '$per2' ";
}?>
<body onload="window.print()">
<h1 align="Center">M2shop</h1>
<P align="Center"> Laporan Order Periode</P>
<P align="Center"> Periode <?php  echo $per1." s/d ".$per2; ?></P>
<br>
<center>
<table class="table table-bordered table-striped" style="width:700px" border="1">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>No Order</th>
                        <th>Nama Member</th>
                        <th>Tanggal Order</th>
                        <th>Jumlah</th>
                        <th>Kota Tujuan</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php
                      $no=1;
                      $run_query=mysql_query($sql);
                      while($row_laporan=mysql_fetch_array($run_query)){
                     
                    ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $row_laporan['id_orders']; ?></td>
                        <td><?php echo $row_laporan['nama_lengkap']; ?></td>
                        <td><?php echo $row_laporan['tgl_order']; ?></td>
                        <td><?php echo $row_laporan['jumlah']; ?></td>
                        <td><?php echo $row_laporan['alamat']; ?>, Propinsi : <?php echo $row_laporan['propinsi']; echo $row_laporan['kabupaten']; ?> </td>
                      </tr>
                    <?php
                       $no++; } 
                    ?>
                    </tbody>
            </tr>            
</tbody>
</table>
</center>

</body>