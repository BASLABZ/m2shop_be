<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><span class="fa fa-tags"></span> Data   Transaksi Penjualan </h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a>  Transaksi </a>
            </li>
            <li class="active">
                <strong>Data  Transaksi Penjualan </strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="row">
    <div class="col-lg-12">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5><span class="fa fa-list"></span> Data  Transaksi Penjualan </h5>
        </div>
        <div class="ibox-content">
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example datatable"  >
            <thead>
                <th>No</th>
                <th>Tanggal Order</th>
                <th>Jam Order</th>
                <th>Status Order</th>
                <th>Kustomer</th>
                <th>Di Kirim ke</th>
                <th>Kontak</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                <?php 
                    $no=0;
                    $query_pembelian  = mysql_query("SELECT * FROM orders o JOIN orders_detail od on o.id_orders = od.id_orders JOIN kustomer k ON o.id_kustomer = k.id_kustomer GROUP by o.id_orders order by o.id_orders DESC");
                    while ($row_pembelian  = mysql_fetch_array($query_pembelian)) {
                 ?>
                 <tr>
                    <td><?php echo ++$no; ?></td>
                    <td><?php echo $row_pembelian['tgl_order']; ?></td>
                    <td><?php echo $row_pembelian['jam_order']; ?></td>
                    <td>
                        <?php 
                            if ($row_pembelian['status_order']=='Pending') {
                         ?>
                         <button class="btn btn-warning btn-xs"><span class="fa fa-exclamation-triangle "></span>
                        <?php echo $row_pembelian['status_order']; ?>
                    </button>
                         <?php }else{ ?>
                         <button class="btn btn-success btn-xs"><span class="fa fa-check"></span>
                        <?php echo $row_pembelian['status_order']; ?>
                    </button>
                         <?php } ?>
                    </td> 
                    <td><?php echo $row_pembelian['nama_lengkap']; ?></td>
                    <td><?php echo $row_pembelian['alamat']; ?>,
                        <?php echo $row_pembelian['propinsi']; ?>,
                        <?php echo $row_pembelian['kabupaten']; ?></td>
                    <td><?php echo $row_pembelian['telpon']; ?></td>
                    <td>
                        <a href="index.php?pos=view_detail_pembelian&id=<?php echo $row_pembelian['id_orders']; ?>" class="btn btn-info btn-sm"><span class="fa fa-eye"></span> Cek Pembelian</a>
                    </td>

                </tr>
                 <?php } ?>
            </tbody>
        </table>

        </div>
    </div>
</div>
</div>
</div>