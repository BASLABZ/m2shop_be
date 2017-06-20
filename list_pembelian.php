
 <div class="main" role="main">
      <div id="content" class="content full dashboard-pages">
          <div class="container">
              <div class="dashboard-wrapper">
                    <div class="row">
                         <div class="col-md-3 col-sm-4">
                            <!-- SIDEBAR -->
                            <?php if (isset($_SESSION['id_kustomer'])) { ?>
                            <div class="users-sidebar tbssticky">
                                <a href="index.php?p=user_profil" class="btn btn-block btn-primary add-listing-btn">Profil Kustomer</a>
                                <ul class="list-group">
                                    <li class="list-group-item"> <a href="index.php?p=user_profil"><i class="fa fa-user"></i> Profil Ku</a></li>
                                    <li class="list-group-item active"> 
                                    <?php 
                                       $sid_cek = session_id();
                                        $query_jumlah_keranjang = mysql_query("SELECT count(*) As JUMLAH_ORDER_SEMENTARA FROM orders_temp where id_session = '".$sid_cek."'");
                                        $jumlah_order = mysql_fetch_array($query_jumlah_keranjang);
                                        if ($jumlah_order['JUMLAH_ORDER_SEMENTARA'] >0 ) {
                                     ?>
                                      <span class="badge"><?php echo $jumlah_order['JUMLAH_ORDER_SEMENTARA']; ?></span> 
                                       <?php } ?>
                                     <a href="index.php?p=cart"><i class="fa fa-shopping-cart"></i> Keranjang Belanja</a></li>
                                    
                                    <li class="list-group-item">
                                    <?php 
                                        $query_pembelian = mysql_query("SELECT count(*) AS JUMLAH_PEMBELIAN FROM orders where id_kustomer = '".$_SESSION['id_kustomer']."'");
                                        $jumlah_pembelian = mysql_fetch_array($query_pembelian);
                                     ?>
                                     <span class="badge"><?php echo $jumlah_pembelian['JUMLAH_PEMBELIAN']; ?></span> 
                                    <a href="index.php?p=list_pembelian"><i class="fa fa-list"></i>Pembelian Barang</a></li>
                                    <li class="list-group-item"> <a href="index.php?logout=1"><i class="fa fa-sign-out"></i> Keluar</a></li>
                                </ul>
                            </div>
                            <?php }else{ ?>
                            <div class="users-sidebar tbssticky">
                                <ul class="list-group">

                                    <li class="list-group-item active"> 
                                    <?php 
                                       $sid_cek = session_id();
                                        $query_jumlah_keranjang = mysql_query("SELECT count(*) As JUMLAH_ORDER_SEMENTARA FROM orders_temp where id_session = '".$sid_cek."'");
                                        $jumlah_order = mysql_fetch_array($query_jumlah_keranjang);
                                        if ($jumlah_order['JUMLAH_ORDER_SEMENTARA'] >0 ) {
                                     ?>
                                      <span class="badge"><?php echo $jumlah_order['JUMLAH_ORDER_SEMENTARA']; ?></span> 
                                       <?php } ?>
                                     <a href="index.php?p=cart"><i class="fa fa-shopping-cart"></i> Keranjang Belanja</a></li>

                                    <li class="list-group-item"> <a data-toggle="modal" data-target="#loginModal"><i class="fa fa-sign-in"></i> Login</a></li>
                                    <li class="list-group-item"> <a href="index.php?p=cart"><i class="fa fa-check"></i> Informasi Keranjang Belanja</a>
                                      <p>
                                          Untuk Melakukan Pembelian Silahkan Login Terbih Dahulu,<br>
                                          Atau Baca Aturan Cara Pembelian <br>
                                          <a href="index.php?p=caraorder" class="btn btn-success btn-block btn-xs pull-right" style="color: white;"><span class="fa fa-book"></span> Cara Beli </a> <br>
                                      </p>
                                      </li>
                                </ul>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-9 col-sm-8">
                            <div class="dashboard-block">
                                <div class="tabs profile-tabs">
                                    <ul class="nav nav-tabs">
                                        <li  class="active"> <a data-toggle="tab" href="#changepassword" aria-controls="changepassword" role="tab"><span class="fa fa-list"></span>  Daftar Pembelian</a></li>
                                    </ul>
                                    
                                        <div class="tab-content">
                                            <div id="changepassword" class="tab-pane fade active in">
                                              <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-stripped table-bordered table-hover">
                                                        	<thead>
                                                        		<th>No</th>
                                                        		<th>Tanggal Pembelian</th>
                                                        		<th>Jam Order</th>
                                                        		<th>Status Pembelian</th>
                                                        		<th>Aksi</th>
                                                        	</thead>
                                                        	<tbody>
                                                        	<?php 
                                                        			$no =0;
                                                        		 	$query_pembelian_list = mysql_query("SELECT * FROM orders order by id_orders DESC");
                                                                    while ($row_pemebelian = mysql_fetch_array($query_pembelian_list)) {
                                                        	 ?>
                                                        		<tr>
                                                        			<td><?php echo ++$no; ?></td>
                                                        			<td><?php echo $row_pemebelian['tgl_order']; ?></td>
                                                        			<td> <?php echo $row_pemebelian['jam_order']; ?></td>
                                                        			<td>
                                                                    <?php 
                                                                        if ($row_pemebelian['status_order'] == 'Pending') {
                                                                     ?>
                                                                    <button class="btn btn-warning btn-xs"><span class="fa fa-exclamation-triangle"></span>
                                                                        <?php echo $row_pemebelian['status_order']; ?>
                                                                    </button>
                                                                    <?php }else{ ?>
                                                                    <button class="btn btn-success btn-xs"><span class="fa fa-check"></span> <?php echo $row_pemebelian['status_order']; ?></button>
                                                                    <?php } ?>
                                                                    </td>
                                                                    <td><a href="index.php?p=preview_cart&id=<?php echo $row_pemebelian['id_orders']; ?>" class='btn btn-info btn-sm'> <span class="fa fa-eye"></span> Lihat Detail Transaksi</a></td>
                                                        			
                                                        		</tr>
                                                        		<?php } ?>
                                                        	</tbody>
                                                        </table> 
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>