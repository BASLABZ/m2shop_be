<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><span class="fa fa-gift"></span> Stok Menipis </h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a>Produk</a>
            </li>
            <li class="active">
                <strong>Stok Menipis </strong>
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
            <h5><span class="fa fa-list"></span> Stok Menipis  </h5>
        </div>
        <div class="ibox-content">
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example datatable"  >
        <thead>
           <tr>
                <th>No</th>
                <th>Nama Produk</th>                                        
                <th>Kategori</th>
                <th>Harga</th>
                <th><center>Stok</center></th>
                <th>Suplier</th>
                <th><center>Gambar</center></th>
                <th><center>Aksi</center></th>
            </tr>
        </thead>
            <tbody>
                <?php 
               

                $no=0;
                    $query_produk = mysql_query("SELECT p.id_produk,p.nama_produk,p.tgl_posting,p.harga,
                                                p.deskripsi,p.stok,p.gambar,p.public,k.kat_nm,s.nama_suplier,s.alamat_suplier,s.email_suplier,s.kontak_suplier,s.id_suplier
                                                 from produk p INNER JOIN kategori_produk k on 
                                                p.katpro_id = k.katpro_id
                                                JOIN suplier s on
                                                p.id_suplier = s.id_suplier
                                                 where p.stok < 5 order by p.id_produk desc");
                    while ($row_produk = mysql_fetch_array($query_produk)) {
                 ?>
                 <tr>
                     <td><?php echo ++$no; ?></td>
                     <td><?php echo $row_produk['nama_produk']; ?></td>
                     <td><?php echo $row_produk['kat_nm']; ?></td>
                     <td><?php echo $row_produk['harga']; ?></td>
                     <td><?php echo $row_produk['stok']; ?></td>
                     <td><?php echo $row_produk['nama_suplier']; ?></td>
                     <td><img src="images/<?php echo $row_produk['gambar']; ?>" class='img-responsive' style='width: 200px;'></td>
                     <td>
                           <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#lihat_suplier-<?php echo $row_produk['id_suplier']; ?>"><span class="fa fa-eye"></span> Lihat Suplier</button>
                           <!-- Modal Suplier tampil disini-->
                            <div id="lihat_suplier-<?php echo $row_produk['id_suplier']; ?>" class="modal fade" role="dialog">
                              <div class="modal-dialog">
                                <!-- Modal Suplier tampil disini-->
                                <div class="modal-content">
                                  <div class="modal-header" style="background-color: #1ab394;">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title" style="color: white;"><span class="fa fa-user"></span> Informasi Suplier </h4>
                                  </div>
                                  <div class="modal-body">
                                    <form class="role">
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" disabled="" value="<?php echo $row_produk['nama_suplier']; ?>" class='form-control'>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea class="form-control" disabled><?php echo $row_produk['alamat_suplier']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Kontak </label>
                                            <input type="number" value="<?php echo $row_produk['kontak_suplier']; ?>" disabled class='form-control'>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" disabled value="<?php echo $row_produk['email_suplier']; ?>" class='form-control'>
                                        </div>
                                    </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                  </div>
                                </div>

                              </div>
                            </div>
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