<?php 
$row_kategori=mysql_fetch_array(mysql_query("SELECT * FROM kategori where kat_id='".$_GET['kat_id']."'"));

if (isset($_POST['ubah'])) 
{
   $sql_ubah = mysql_query("UPDATE kategori set kat_nm = '".$_POST['kat_nm']."' WHERE kat_id = '".$_GET['kat_id']."' ");
   if ($sql_ubah) 
    {
        echo "<script> alert(' Data berhasil diubah '); 
        location.href='index.php?pos=data_kategori_berita' </script>";exit;
      
    }
}

 ?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><span class="fa fa-users"></span> Data Kategori Berita</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index-2.html">Home</a>
                        </li>
                        <li>
                            <a>Kategori Berita</a>
                        </li>
                        <li class="active">
                            <strong>Data Kategori Berita</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><span class="fa fa-plus"></span> Form Ubah  Kategori Berita </h5>
                    </div>
                    <div class="ibox-content">
                    <form class="role" method="POST">
                       <div class="form-group">
                            <label>Kategori</label>
                            <input class="form-control" placeholder="Nama Kategori" type="text" name="kat_nm" value="<?php echo $row_kategori['kat_nm']; ?>">
                        </div>
                        <center>                     
                        <button type="submit" class="btn btn-primary" name="ubah"><span class="fa fa-pencil"></span> Ubah</button>
                    </center>
                    </form>
                     </div>
            </div>
        </div>
</div>