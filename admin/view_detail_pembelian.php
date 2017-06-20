<?php     
    $idtransaksi = $_GET['id']; 
    $row_kustomer  = mysql_fetch_array(mysql_query("SELECT * FROM orders o JOIN kustomer k ON o.id_kustomer = k.id_kustomer where o.id_orders = '".$idtransaksi."'"));
    
    // ganti status pembelian
    if (isset($_POST['gantistatus'])) {
        $id_transaksi_pembelian = $_GET['id'];
        $email = $row_kustomer['email'];
        $query_update_status_order = mysql_query("UPDATE orders set status_order = 'Confirm' where id_orders = '".$idtransaksi."' ");

        if ($query_update_status_order) {
             echo "<script>
                    location.href='SENDEMAIL/sendEmailDebug.php?email=$email&idorders=$id_transaksi_pembelian'</script>";exit;
             // echo "<script> alert('Transaksi Pembelian Di Konfirmasi'); 
             // location.href='index.php?pos=view_detail_pembelian&id=".$id_transaksi_pembelian."'</script>";exit;
        }
    }
 ?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><span class="fa fa-users"></span>Detail Data Transaksi Pembelian</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index-2.html">Home</a>
                        </li>
                        <li>
                            <a>Transaksi Pembelian</a>
                        </li>
                        <li class="active">
                            <strong>Detail Transaksi Pembelian</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><span class="fa fa-user"></span> Profil Pembeli </h5>
                    </div>
                    <div class="ibox-content">
                    <form class="role" method="POST">
                       <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control"  disabled required value="<?php echo $row_kustomer['nama_lengkap']; ?>" >
                        </div>
                       <div class="form-group">
                            <label>Email</label>
                             <input type="text" class="form-control"  disabled required  name='email' disabled value="<?php echo $row_kustomer['email']; ?>">
                       </div>
                       <div class="form-group">
                           <label>Telpon</label>
                           <input type="number" class="form-control" disabled value="<?php echo $row_kustomer['telpon']; ?>">
                       </div>
                       <div class="form-group">
                           <label>Propinsi</label>
                           <input type="text"  class="form-control" disabled value="<?php echo $row_kustomer['propinsi']; ?>">
                       </div>
                       <div class="form-group">
                           <label>Kabupaten</label>
                           <input type="text" disabled value="<?php echo $row_kustomer['kabupaten']; ?>" class="form-control">
                       </div>
                       <div class="form-group">
                           <label>Alamat Pengiriman</label>
                           <textarea disabled class="form-control"><?php echo $row_kustomer['alamat']; ?></textarea>
                       </div>
                    </form>
                     </div>
            </div>
        </div>
        <div class="col-lg-8">
                
                <?php if ($row_kustomer['status_order']=='Pending') { ?>
                <button class="btn btn-warning btn-block"><span class="fa fa-exclamation-triangle "></span> Status Transaksi Pembelian : <?php echo $row_kustomer['status_order']; ?></button>
                <br>
                <form method="POST">
                    <button class="btn btn-success btn-block" type="submit" name="gantistatus"><span class="fa fa-check"></span> Konfirmasi Status Pembelian</button>
                </form>
                <?php }else{ ?>
                <button class="btn btn-success btn-block"><span class="fa fa-check "></span> Status Transaksi Pembelian : <?php echo $row_kustomer['status_order']; ?></button>
                <?php } ?>
                 <br>
                <a href="index.php?pos=data_transaksi_pembelian" class="btn btn-primary btn-block"><span class="fa fa-arrow-left"></span> Kembali Ke Daftar Transaksi Pembelian</a>
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><span class="fa fa-shopping-cart"></span> Detail Pembelian </h5>
                    </div>
                    <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example datatable"  >
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
                                    WHERE o.id_orders = '".$idtransaksi."'");
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

                    </div>
                     </div>
            </div>
        </div>
</div>