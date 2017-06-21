 <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-3">
                <a href="index.php?pos=data_kustomer">
                <div class="widget style1 lazur-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Data Kustomer </span>
                            <?php 
                                $query_count_kustomer = mysql_query("SELECT count(*) as total_kustomer FROM kustomer where aktif='Y'");
                                $total_kustomer = mysql_fetch_array($query_count_kustomer);
                             ?>
                            <h2 class="font-bold"><?php echo $total_kustomer['total_kustomer']; ?> User</h2>
                        </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3">
            <?php 
                $query_total_transaksi_baru = mysql_query("SELECT count(*) as total_transaksi_baru from orders where status_order = 'Pending' ");
                $total_transaksi = mysql_fetch_array($query_total_transaksi_baru);
                if ($total_transaksi['total_transaksi_baru'] < 1) {
                
             ?>
             <a href="index.php?pos=data_transaksi_pembelian">
                    <div class="widget style1 yellow-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Transaksi Baru </span>
                            <h2 class="font-bold"><?php echo $total_transaksi['total_transaksi_baru']; ?></h2>
                        </div>
                    </div>
                </div>
                </a>
             <?php }else{ ?>
             <a href="index.php?pos=data_transaksi_pembelian">
                    <div class="widget style1 yellow-bg animated swing">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Transaksi Baru </span>
                            <h2 class="font-bold"><?php echo $total_transaksi['total_transaksi_baru']; ?></h2>
                        </div>
                    </div>
                </div>
                </a>
             <?php } ?>
                
            </div>
            <div class="col-lg-3">
            <?php 
                $query_stok_menipis = mysql_query("SELECT count(*) STOK_MENIPIS FROM produk where stok < 5");
                $row_produk_menipis = mysql_fetch_array($query_stok_menipis);
                if ($row_produk_menipis['STOK_MENIPIS'] < 1) {
             ?>
                <a href="index.php?pos=data_produk_menipis">
                    <div class="widget style1 red-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-exclamation-triangle fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Stok Produk Menipis </span>
                            
                            <h2 class="font-bold"><?php echo $row_produk_menipis['STOK_MENIPIS']; ?> Item</h2>
                        </div>
                    </div>
                </div>
                </a>
                <?php }else{ ?> 
                 <a href="index.php?pos=data_produk_menipis">
                    <div class="widget style1 red-bg animated swing">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-exclamation-triangle fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Stok Produk Menipis </span>
                            
                            <h2 class="font-bold"><?php echo $row_produk_menipis['STOK_MENIPIS']; ?> Item</h2>
                        </div>
                    </div>
                </div>
                </a>
                <?php } ?>
            </div>

            <div class="col-lg-3">
                <div class="widget style1 navy-bg">
                    <div class="row">
                        <div class="col-xs-4">
                            <i class="fa fa-file-o fa-5x"></i>
                        </div>
                        <div class="col-xs-8 text-right">
                            <span> Laporan Transaksi </span>
                            <h2 class="font-bold" style="font-size: 10px;">Lihat Data</h2>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                     <div class="ibox-title">
                        <h5><span class="fa fa-pie-chart"></span> Chartting Produk Terlaris</h5>
                    </div>
                    <div class="ibox-content">
                        <div>
                            <h3 class="font-bold no-margins">
                          
                            </h3>
                        </div>

                        <div class="m-t-sm">

                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                       <div id="produk_terlaris" style="height: 300px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Chartting Order Penjualan</h5>
                    </div>
                    <div class="ibox-content">
                        <div id="order_penjualan" style="height: 400px"></div>
                    </div>
                </div>
            </div>

        </div>