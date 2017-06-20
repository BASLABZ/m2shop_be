<script>
function harusangka(jumlah){
  var karakter = (jumlah.which) ? jumlah.which : event.keyCode
  if (karakter > 31 && (karakter < 48 || karakter > 57))
    return false;

  return true;
}
</script>

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
                                    <a href="user-dashboard-saved-cars.html"><i class="fa fa-list"></i>Pembelian Barang</a></li>
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
                            	<div class="dashboard-block-head">
                            		<h3><span class="fa fa-shopping-cart"></span> Keranjang Belanja</h3>
                                </div>
                                <div class="table-responsive">
                                <form method=post action=aksi.php?module=keranjang&act=update>
                                    <table class="table table-bordered dashboard-tables saved-cars-table">
                                        <thead>
                                         <tr class="cart_menu">
                                            <td>No</td>
                                            <td class="image">Gambar</td>
                                            <td class="description">Nama Produk</td>
                                            <td class="price">Harga</td>
                                            <td class="quantity">Jumlah</td>
                                            <td class="total">Sub Total</td>
                                            <td>Aksi</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                                $jumlahitem = 0;
                                                $total = 0;
                                                $vat  = 0;
                                                $total_rp = 0;
                                                $no = 0;
                                                $sid = session_id();
                                                $query = mysql_query("SELECT * FROM orders_temp, produk 
                                                WHERE id_session='$sid' AND 
                                                  orders_temp.id_produk=produk.id_produk");
                                                while ($row = mysql_fetch_array($query)) {
                                                    $subtotal = $row['harga']*$row['jumlah'];
                                                    $item = $row['jumlah'];
                                                  $jumlahitem=$jumlahitem+$item;
                                                    $subtotal    = ($row['harga']) * $row['jumlah'];
                                                    $total       = $total + $subtotal;  
                                                    $vat_rp      = rupiah($vat);
                                                    $ttl_rp      = $total+$vat;
                                                    $subtotal_rp = rupiah($subtotal);
                                                    $total_rp    = rupiah($ttl_rp);
                                            ?>
                                            <tr>
                                                <td><?php echo ++$no; ?></td>
                                                <td>
                                                    <!-- Result -->
                                                    <a href="vehicle-details.html" class="car-image"><img src="admin/images/<?php echo $row['gambar']; ?>" alt=""></a>
                                                </td>
                                                <td><?php echo $row['nama_produk']; ?></td>
                                                <td><span class="price"><?php echo "Rp."; echo rupiah($row['harga']); ?></span></td>
                                                <td>
                                                  <?php
                                                 echo "<input type=text name='jml[$no]' value='".$row['jumlah']."' size=1 onchange=\"this.form.submit()\" onkeypress=\"return harusangka(event)\"><br>";
                                                 echo "<input type=hidden name=id[$no] value='".$row['id_orders_temp']."'>";
                                                ?>
                                                </td>
                                                <td>
                                                    <?php echo "Rp."; echo rupiah($subtotal = $row['harga'] * $row['jumlah']); ?>
                                                </td>

                                                <td align="center"><a onclick="return confirm('Apakah Anda ingin Menghapus <?php echo $row['nama_produk']; ?> Ini Dari Keranjang Belanja ?')"  class="text-danger" href="aksi.php?module=keranjang&act=hapus&id=<?php echo $row['id_orders_temp']; ?>" ><i class="fa fa-times"></i></a></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>

                                                <td colspan="5">Jumlah / Item</td>
                                                <td><?php echo $jumlahitem; ?> / Item</td>
                                            </tr>
                                            <tr>

                                                <td colspan="5">Total Pembayaran</td>
                                                <td>Rp. <?php echo $total_rp; ?> </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <a href="index.php?p=daftar_produk" class="btn btn-info"><span class="fa fa-shopping-cart"></span> Belanja Lagi</a>
                                    <a href="" class="btn btn-success"><span class="fa fa-check"></span> Check Out</a>
                                    
                                    </form>
                               	</div>
                            </div>
                        </div>
                    </div>
                </div>
           	</div>
        </div>
   	</div>