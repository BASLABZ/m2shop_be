<?php 
	$id = $_GET['id'];
 ?>
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
                                        <li  class="active"> <a data-toggle="tab" href="#changepassword" aria-controls="changepassword" role="tab">Preview Pembelian</a></li>
                                        <li> <a data-toggle="tab" href="#personalinfo" aria-controls="personalinfo" role="tab">Profil Penerima / Pembeli</a></li>
                                        
                                    </ul>
                                    
                                        <div class="tab-content">
                                            <!-- PROFIE PERSONAL INFO -->
                                            <div id="changepassword" class="tab-pane fade active in">
                                              <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-stripped table-bordered table-hover">
                                                        	<thead>
                                                        		<th>No</th>
                                                        		<th>Produk</th>
                                                        		<th>Jumlah</th>
                                                        		<th>Harga</th>
                                                        		<th>Subtotal</th>
                                                        	</thead>
                                                        	<tbody>
                                                        	<?php 
                                                        			$no =0;
                                                        		 	$jumlahitem = 0;
					                                                $total = 0;
					                                                $vat  = 0;
					                                                $total_rp = 0;
                                                        		$query_detail_transaksi = mysql_query("SELECT * FROM orders o JOIN orders_detail od ON o.id_orders = od.id_orders 
                                                        			JOIN produk p ON 
                                                        			od.id_produk = p.id_produk
                                                        			WHERE o.id_orders = '".$id."'");
                                                        		while ($row_transaksi = mysql_fetch_array($query_detail_transaksi)) {
                                                        			 $subtotal = $row_transaksi['harga']*$row_transaksi['jumlah'];
				                                                    $item = $row_transaksi['jumlah'];
				                                                  	$jumlahitem=$jumlahitem+$item;
				                                                    $subtotal    = ($row_transaksi['harga']) * $row_transaksi['jumlah'];
				                                                    $total       = $total + $subtotal;  
				                                                    $vat_rp      = rupiah($vat);
				                                                    $ttl_rp      = $total+$vat;
				                                                    $subtotal_rp = rupiah($subtotal);
				                                                    $total_rp    = rupiah($ttl_rp);
                                                        	 ?>
                                                        		<tr>
                                                        			<td><?php echo ++$no; ?></td>
                                                        			<td><?php echo $row_transaksi['nama_produk']; ?></td>
                                                        			<td> <?php echo $row_transaksi['jumlah']; ?></td>
                                                        			<td><?php echo rupiah($row_transaksi['harga']); ?></td>
                                                        			<td><?php echo rupiah($subtotal  = $row_transaksi['harga'] * $row_transaksi['jumlah']); ?></td>
                                                        			
                                                        		</tr>
                                                        		<?php } ?>
                                                        	</tbody>
                                                        	<tfoot>
					                                            <tr>
					                                                <td colspan="4">Jumlah / Item</td>
					                                                <td><?php echo $jumlahitem; ?> / Item</td>
					                                            </tr>
					                                            <tr>

					                                                <td colspan="4">Total Pembayaran</td>
					                                                <td>Rp. <?php echo $total_rp; ?> </td>
					                                            </tr>
					                                        </tfoot>
                                                        </table> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="personalinfo" class="tab-pane fade">
                                                <form method="POST"> 
                                                    <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Nama Lengkap</label>
                                                                <input type="text"  disabled  class="form-control" placeholder="" required value="<?php echo $_SESSION['nama_lengkap']; ?>" name='nama_lengkap'>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Email</label>
                                                                 <input type="text"  disabled  class="form-control" placeholder="mail@example.com" required value="<?php echo $_SESSION['email']; ?>" name='email' disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                        	<div class="col-md-6">
                                                        		<label>Propinsi</label>
                                                        		<input type="text" class="form-control" disabled="" value="<?php echo $_SESSION['propinsi']; ?>">
                                                        	</div>
                                                        	<div class="col-md-6">
                                                        		<label>Kota</label>
                                                        		<input type="text"class="form-control"  disabled="" value="<?php echo $_SESSION['kabupaten']; ?>">
                                                        	</div>
                                                        </div>
                                                           <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Alamat*</label>
                                                                <textarea disabled  class="form-control" name="alamat" style="margin: 0px -17.0156px 20px 0px; height: 138px; width: 261px;">
                                                                    <?php echo $_SESSION['alamat']; ?>
                                                                </textarea>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>No Telp</label>
                                                                <input type="text" disabled name="telpon" class="form-control" value="<?php echo $_SESSION['telpon']; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
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