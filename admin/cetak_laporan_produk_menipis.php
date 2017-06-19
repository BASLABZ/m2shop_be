<?php 
	include 'koneksi.php';
 ?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN PRODUK | Cetak</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="white-bg">
                <div class="wrapper wrapper-content p-xl">
                    <div class="ibox-content p-xl">
                    	<center><h3>M2Shop</h3></center>
                    	<center><h2>Laporan Produk Stok Menipis</h2></center>
                            <div class="table-responsive m-t">
                                  <table class="table table-stripped table-bordered ">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>                                        
                                            <th>Kategori</th>
                                            <th>Tanggal Posting</th> 
                                            <th>Harga</th>
                                            <th><center>Stok</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=0;
                                            $query_produk = mysql_query("SELECT p.id_produk,p.nama_produk,p.tgl_posting,p.harga,p.deskripsi,p.stok,
                                                    k.kat_nm from produk p INNER JOIN kategori_produk k on 
                                                    p.katpro_id = k.katpro_id 
                                                    WHERE stok <= 2
                                                    order by p.id_produk desc");
                                            while ($row_produk = mysql_fetch_array($query_produk)) {
                                            if ($row_produk['stok'] == 0) {
                                         ?>
                                         <tr class='danger'>
                                             <td><?php echo ++$no; ?></td>
                                             <td><?php echo $row_produk['nama_produk']; ?></td>
                                             <td><?php echo $row_produk['kat_nm']; ?></td>
                                             <td><?php echo $row_produk['tgl_posting']; ?></td>
                                             <td><?php echo $row_produk['harga']; ?></td>
                                             <td><?php echo $row_produk['stok']; ?></td>
                                        </tr>
                                         <?php }else{ ?>
                                         <tr>
                                             <td><?php echo ++$no; ?></td>
                                             <td><?php echo $row_produk['nama_produk']; ?></td>
                                             <td><?php echo $row_produk['kat_nm']; ?></td>
                                             <td><?php echo $row_produk['tgl_posting']; ?></td>
                                             <td><?php echo $row_produk['harga']; ?></td>
                                             <td><?php echo $row_produk['stok']; ?></td>
                                        </tr>
                                        <?php }} ?>
                                    </tbody>
                                </table>
                            </div>
                    </div>

    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>

    <script type="text/javascript">
        window.print();
    </script>

</body>
</html>
