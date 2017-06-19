<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><span class="fa fa-shopping-cart"></span> Data Cara Pemesanan Toko</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a>Cara Pemesanan Toko</a>
            </li>
            <li class="active">
                <strong>Data Cara Pemesanan Toko</strong>
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
            <h5><span class="fa fa-list"></span> Data  Cara Pemesanan Toko <a href="index.php?pos=tambah_cara_pesan" class="btn btn-primary btn-xs"><span class="fa fa-plus"></span> Tambah Data</a> </h5>
        </div>
        <div class="ibox-content">
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example datatable"  >
        <thead>
          <tr>
            <th>No</th>
            <th width="20%">Judul</th>
            <th width="40%">Deskripsi</th>
            <th><center>Publish</center></th>
            <th><center>Aksi</center></th>
        </tr>
        </thead>
            <tbody>
           
                    <?php
            if(isset($_GET['publish']))
            {
                mysql_query("UPDATE caraorder set publish = '$_GET[publish]' where idcara = '$_GET[idcara]'");
            }
            elseif(isset($_GET['del']))
            {
                $sql_del = mysql_query("DELETE from caraorder where idcara = '$_GET[del]'");
                if($sql_del)
                {
                    echo "<script>alert('Data Cara Order Berhasil dihapus'); 
                    location.href='index.php?pos=data_cara_order'</script>";exit;
                }
            }
            
                $no = 1;
                $sql = "SELECT * from caraorder ORDER BY idcara DESC";
                $hasil = mysql_query($sql);
                while ($data = mysql_fetch_row($hasil)){
            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data[1]; ?></td>
                    <td><?php echo $data[2]; ?></td>
                    <td align="center">
                    <?php
                        if($data[3] == 'yes')
                        {
                    ?>
                        <a class="btn btn-primary" href="index.php?pos=data_cara_order&publish=no&idcara=<?php echo $data[0]; ?>">On</a>
                    <?php   }
                    else    {   ?>
                        <a class="btn btn-danger" href="index.php?pos=data_cara_order&publish=yes&idcara=<?php echo $data[0]; ?>">Off</a>
                    <?php   }   ?>
                    </td>
                    <td align="center">
                  
                        <a class="btn btn-primary" href="index.php?pos=edit_data_cara_order&idcara=<?php echo $data[0]; ?>"><span class="fa fa-pencil"></span> Edit</a>
                  
                        <a class="btn btn-danger" href="index.php?pos=data_cara_order&del=<?php echo $data[0]; ?>" onclick="return confirm('Anda Yakin ?')"><span class="fa fa-times"></span> Hapus</a>
                    </td>
                   
                </tr>
            <?php $no++; } ?>
            </tbody>
        </table>

        </div>
    </div>
</div>
</div>
</div>