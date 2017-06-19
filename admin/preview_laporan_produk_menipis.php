    <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-8">
                    <h2>Laporan Produk Menipis</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index-2.html">Home</a>
                        </li>
                        <li>
                            Laporan
                        </li>
                        <li class="active">
                            <strong>Laporan Produk Menipis</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-4">
                    <div class="title-action">
                        <a href="cetak_laporan_produk_menipis.php" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print Laporan Produk Menipis </a>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="ibox-content p-xl">
                    	<center><h3>M2Shop</h3></center>
                    	<center><h2>Laporan Produk Stok Menipis</h2></center>
                            <div class="table-responsive m-t">
                                <table class="table table-stripped table-bordered  dataTables-example datatable">
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
            </div>
        </div>