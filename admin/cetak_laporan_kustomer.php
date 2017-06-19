<?php 
	include 'koneksi.php';
 ?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN KUSTOMER | Cetak</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="white-bg">
                <div class="wrapper wrapper-content p-xl">
                    <div class="ibox-content p-xl">
                    	<center><h3>M2Shop</h3></center>
                    	<center><h2>Laporan Keseluruhan Data Kustomer</h2></center>
                            <div class="table-responsive m-t">
                                <table class="table table-stripped table-bordered ">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Telpon</th>
                                        <th>Alamat</th>
                                        <th>Propinsi</th>
                                        <th>Kabupaten</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    	<?php 
                                    	$no = 0;
                                    	$query_laporan_kustomer  = mysql_query("SELECT * FROM kustomer where  aktif = 'Y' order by id_kustomer DESC ");
                                    	while ($row_kustomer = mysql_fetch_array($query_laporan_kustomer)) {
                                    	 ?>
                                    	 <tr>
                                    	 	<td><?php echo ++$no; ?></td>
                                    	 	<td><?php echo $row_kustomer['nama_lengkap']; ?></td>
                                    	 	<td><?php echo $row_kustomer['email']; ?></td>
                                    	 	<td><?php echo $row_kustomer['telpon']; ?></td>
                                    	 	<td><?php echo $row_kustomer['alamat']; ?></td>
                                    	 	<td><?php echo $row_kustomer['propinsi']; ?></td>
                                    	 	<td><?php echo $row_kustomer['kabupaten']; ?></td>

                                    	 </tr>
                                    	<?php } ?>
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
