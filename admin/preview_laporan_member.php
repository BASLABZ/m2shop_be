       <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Laporan Kustomer</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index-2.html">Home</a>
                        </li>
                        <li>
                            Laporan
                        </li>
                        <li class="active">
                            <strong>Laporan Kustomer</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-4">
                    <div class="title-action">
                        <a href="cetak_laporan_kustomer.php" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print Laporan Kustomer </a>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="ibox-content p-xl">
                    	<center><h3>M2Shop</h3></center>
                    	<center><h2>Laporan Keseluruhan Data Kustomer</h2></center>
                            <div class="table-responsive m-t">
                                <table class="table table-stripped table-bordered  dataTables-example datatable">
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
            </div>
        </div>