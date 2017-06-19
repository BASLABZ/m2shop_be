<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><span class="fa fa-tags"></span> Data   Kategori  Produk </h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a>  Kategori Produk </a>
            </li>
            <li class="active">
                <strong>Data  Kategori Produk </strong>
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
            <h5><span class="fa fa-list"></span> Data  Kategori Produk  <a href="index.php?pos=tambah_kategori_produk" class="btn btn-primary btn-xs"><span class="fa fa-plus"></span> Tambah Kategori Data</a> </h5>
        </div>
        <div class="ibox-content">
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example datatable"  >
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th><center>Publish</center></th>
                <th><center>Aksi</center></th>
            </tr>
        </thead>
            <tbody>
            
               <?php
                        if(isset($_GET['publish']))
                        {
                            mysql_query("UPDATE kategori_produk set publish = '$_GET[publish]' where katpro_id = '$_GET[katpro_id]'");
                        }
                        elseif(isset($_GET['del']))
                        {
                            $sql_del = mysql_query("DELETE from kategori_produk where katpro_id = '$_GET[del]'");
                            if($sql_del)
                            {
                                echo "<script>alert('Data Berita Berhasil dihapus');
                                location.href='index.php?pos=data_kategori_produk'</script>";exit;
                            }
                        }
                        
                            $no = 1;
                            $sql = "SELECT * from kategori_produk ORDER BY katpro_id DESC";
                            $hasil = mysql_query($sql);
                            while ($data = mysql_fetch_row($hasil)){
                        ?>                                                                                   
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $data[1]; ?></td>
                                <td align="center">
                                <?php
                                    if($data[2] == 'yes')
                                    {
                                ?>
                                    <a class="btn btn-primary" href="index.php?pos=data_kategori_produk&publish=no&katpro_id=<?php echo $data[0]; ?>">On</a>
                                <?php   }
                                else    {   ?>
                                    <a class="btn btn-danger" href="index.php?pos=data_kategori_produk&publish=yes&katpro_id=<?php echo $data[0]; ?>">Off</a>
                                <?php   }   ?>
                                </td>
                                <td align="center">
                              
                                    <a class="btn btn-primary" href="index.php?pos=edit_kategori_produk&katpro_id=<?php echo $data[0]; ?>"><span class="fa fa-pencil"></span> Edit</a>
                              
                                    <a class="btn btn-danger" href="index.php?pos=data_kategori_produk&del=<?php echo $data[0]; ?>" onclick="return confirm('Anda Yakin ?')"><span class="fa fa-times"></span> Hapus</a>
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