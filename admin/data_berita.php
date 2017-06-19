<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><span class="fa fa-calendar"></span> Data Berita </h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a>Berita </a>
            </li>
            <li class="active">
                <strong>Data Berita </strong>
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
            <h5><span class="fa fa-list"></span> Data  Berita  <a href="index.php?pos=tambah_berita" class="btn btn-primary btn-xs"><span class="fa fa-plus"></span> Tambah Data</a> </h5>
        </div>
        <div class="ibox-content">
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example datatable"  >
        <thead>
           <tr>
                <tr>
                    <th>No</th>
                    <th>Judul Berita</th>
                    <th>Tanggal Posting</th>
                    <th width="20%">Isi</th>
                    <th><center>Kategori</center></th>
                    <th><center>Gambar</center></th>
                    <th><center>Publish</center></th>                                        
                    <th><center>Aksi</center></th>
                </tr>
            </tr>
        </thead>
            <tbody>
             <?php
                
            if(isset($_GET['publish']))
            {
                mysql_query("UPDATE berita set publish = '$_GET[publish]' where berita_id = '$_GET[berita_id]'");
            }
            elseif(isset($_GET['del']))
            {
                $sql_del = mysql_query("DELETE from berita where berita_id = '$_GET[del]'");
                if($sql_del)
                {
                    echo "<script>alert('Data Berita Berhasil dihapus'); 
                    location.href='index.php?pos=data_berita'</script>";exit;
                }
            }
            
                $no = 1;
                $sql = "SELECT b.berita_id,b.berita_judul,b.mdd,b.berita_des,b.gambar,b.publish,k.kat_nm 
                        from berita b INNER JOIN kategori k on b.kat_id = k.kat_id order by b.berita_id desc" ;
                $hasil = mysql_query($sql);
                while ($data = mysql_fetch_row($hasil)){
                    $gambar= $data[4];
            ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data[1]; ?></td>
                    <td><?php echo $data[2]; ?></td>
                    <td><?php echo $data[3]; ?></td>
                    <td><center><?php echo $data[6]; ?></center></td>
                    <td><center>                                
                    <?php echo "<img src='images/$gambar' width='150' height='150'>"; ?>
                    </center></td>
                    <td align="center">
                    <?php
                        if($data[5] == 'yes')
                        {
                    ?>
                        <a class="btn btn-primary" href="index.php?pos=data_berita&publish=no&berita_id=<?php echo $data[0]; ?>">On</a>
                    <?php   }
                    else    {   ?>
                        <a class="btn btn-danger" href="index.php?pos=data_berita&publish=yes&berita_id=<?php echo $data[0]; ?>">Off</a>
                    <?php   }   ?>
                    </td>
                    <td align="center">
                  
                        <a class="btn btn-primary" href="index.php?pos=edit_berita&berita_id=<?php echo $data[0]; ?>"><span class="fa fa-pencil"></span> Edit</a>
                  
                        <a class="btn btn-danger" href="index.php?pos=data_berita&del=<?php echo $data[0]; ?>" onclick="return confirm('Anda Yakin ?')"><span class="fa fa-times"></span> Hapus</a>
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