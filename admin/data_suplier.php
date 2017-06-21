<?php 
        // fungsi untuk hapus data
        if (isset($_GET['hapus'])) {
            $query_hapus  = mysql_query("DELETE FROM suplier where id_suplier = '".$_GET['hapus']."'");
            if ($query_hapus) {
                   echo "<script>alert('Data Suplier Berhasil dihapus'); 
                        location.href='index.php?pos=data_suplier'</script>";exit;
            }
        }
 ?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><span class="fa fa-users"></span> Data Suplier </h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a> Suplier </a>
            </li>
            <li class="active">
                <strong>Data  Suplier </strong>
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
            <h5><span class="fa fa-list"></span> Data Suplier  <a href="index.php?pos=tambah_suplier" class="btn btn-primary btn-xs"><span class="fa fa-plus"></span> Tambah Suplier Data</a> </h5>
        </div>
        <div class="ibox-content">
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example datatable"  >
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Suplier</th>
                <th>Alamat Suplier</th>
                <th>Kontak Suplier</th>
                <th>Email Suplier</th>
                <th><center>Aksi</center></th>
            </tr>
        </thead>
            <tbody>
                <?php 
                $no = 0;
                $query_suplier = mysql_query("SELECT * FROM suplier order by id_suplier DESC");
                while ($row_suplier  = mysql_fetch_array($query_suplier)) {     ?>
                <tr>
                    <td><?php echo ++$no; ?></td>
                    <td><?php echo $row_suplier['nama_suplier']; ?></td>
                    <td><?php echo $row_suplier['alamat_suplier']; ?></td>
                    <td><?php echo $row_suplier['kontak_suplier']; ?></td>
                    <td><?php echo $row_suplier['email_suplier']; ?></td>
                    <td>
                        <a href="index.php?pos=edit_data_suplier&id_suplier=<?php echo $row_suplier['id_suplier']; ?>" class="btn btn-primary btn-sm"><span class="fa fa-pencil"></span> Ubah</a>
                        <a href="index.php?pos=data_suplier&hapus=<?php echo $row_suplier['id_suplier']; ?>" class="btn btn-danger btn-sm"  onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini ?')"><span class="fa fa-times"></span> Hapus</a>
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