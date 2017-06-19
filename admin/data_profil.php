<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><span class="fa fa-home"></span> Data Profil Toko</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a>Profil Toko</a>
            </li>
            <li class="active">
                <strong>Data Profil Toko</strong>
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
            <h5><span class="fa fa-list"></span> Data  Profil Toko <a href="index.php?pos=tambah_profil" class="btn btn-primary btn-xs"><span class="fa fa-plus"></span> Tambah Data</a> </h5>
        </div>
        <div class="ibox-content">
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example datatable"  >
        <thead>
           <tr>
                <th>No</th>
                <th>Judul Profil</th>
                <th>Deskripsi Profil</th>
                <th><center>Gambar</center></th>                             
                <th><center>Aksi</center></th>
            </tr>
        </thead>
            <tbody>
             <?php
                if(isset($_GET['del']))
                {
                    $sql_del = mysql_query("DELETE from profil where profil_id = '$_GET[del]'");
                    if($sql_del)
                    {
                        echo "<script>alert('Data Profil Berhasil dihapus'); 
                        location.href='index.php?pos=data_profil'</script>";exit;
                    }
                }
                
                    $no = 1;
                    $sql = "SELECT * from profil ORDER BY profil_id DESC";
                    $hasil = mysql_query($sql);
                    while ($data = mysql_fetch_row($hasil)){
                        $gambar= $data[3];
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data[1]; ?></td>
                        <td><?php echo $data[2]; ?></td>
                        <td>
                        
                        <center><?php echo "<img src='images/$gambar' width='150' height='150'>"; ?></center>
                        </td>
                        <td align="center">
                      
                            <a class="btn btn-primary" href="index.php?pos=edit_profil&profil_id=<?php echo $data[0]; ?>"><span class="fa fa-pencil"></span> Edit</a>
                      
                            <a class="btn btn-danger" href="index.php?pos=data_profil&del=<?php echo $data[0]; ?>" onclick="return confirm('Anda Yakin ?')"><span class="fa fa-times"></span> Hapus</a>
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