<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><span class="fa fa-gift"></span> Data Produk</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a>Produk</a>
            </li>
            <li class="active">
                <strong>Data Produk</strong>
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
            <h5><span class="fa fa-list"></span> Data  Produk <a href="index.php?pos=tambah_produk" class="btn btn-primary btn-xs"><span class="fa fa-plus"></span> Tambah Data</a> </h5>
        </div>
        <div class="ibox-content">
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example datatable"  >
        <thead>
           <tr>
                <th>No</th>
                <th>Nama Produk</th>                                        
                <th>Kategori</th>
                <th>Tanggal Posting</th> 
                <th>Harga</th>
                <th>Deskripsi</th>
                <th><center>Stok</center></th>
                <th><center>Gambar</center></th>
                <th><center>Aksi</center></th>
            </tr>
        </thead>
            <tbody>
                <?php 
                // hapus data 

                if (isset($_GET['del'])) {
                    $query_hapus = mysql_query("DELETE FROM produk where id_produk = '".$_GET['del']."' ");
                    if ($query_hapus) {
                         echo "<script>alert('Data Produk Berhasil dihapus'); 
                        location.href='index.php?pos=data_produk'</script>";exit;
                    }
                }

                $no=0;
                    $query_produk = mysql_query("SELECT p.id_produk,p.nama_produk,p.tgl_posting,p.harga,p.deskripsi,p.stok,
                            p.gambar,p.public,k.kat_nm from produk p INNER JOIN kategori_produk k on 
                            p.katpro_id = k.katpro_id order by p.id_produk desc");
                    while ($row_produk = mysql_fetch_array($query_produk)) {
                 ?>
                 <tr>
                     <td><?php echo ++$no; ?></td>
                     <td><?php echo $row_produk['nama_produk']; ?></td>
                     <td><?php echo $row_produk['kat_nm']; ?></td>
                     <td><?php echo $row_produk['tgl_posting']; ?></td>
                     <td><?php echo $row_produk['harga']; ?></td>
                     <td><?php echo $row_produk['deskripsi']; ?></td>
                     <td><?php echo $row_produk['stok']; ?></td>
                     <td><img src="images/<?php echo $row_produk['gambar']; ?>" class='img-responsive' style='width: 200px;'></td>
                     <td>
                           <a class="btn btn-primary" href="index.php?pos=edit_data_produk&id_produk=<?php echo $row_produk['id_produk']; ?>"><span class="fa fa-pencil"></span> Edit</a>
                      
                            <a class="btn btn-danger" href="index.php?pos=data_produk&del=<?php echo $row_produk['id_produk']; ?>" onclick="return confirm('Anda Yakin ?')"><span class="fa fa-times"></span> Hapus</a>
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