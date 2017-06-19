    <?php
    $idkategori = $_GET['katpro_id'];
    $row_kategori = mysql_fetch_array(mysql_query("SELECT * from kategori_produk where katpro_id = '".$idkategori."'"));
    if(isset($_POST['ubah']))
    {
        $sqlubah = mysql_query("UPDATE kategori_produk set kat_nm='".$_POST['kat_nm']."' where katpro_id = '".$idkategori."'");
        if ($sqlubah) {
            echo "<script> alert(' Data berhasil dimasukkan '); 
            location.href='index.php?pos=data_kategori_produk' </script>";exit;
        }
    }
?>

<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><span class="fa fa-users"></span> Data Kategori Produk</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index-2.html">Home</a>
                        </li>
                        <li>
                            <a>Kategori Produk</a>
                        </li>
                        <li class="active">
                            <strong>Data Kategori Produk</strong>
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
                        <h5><span class="fa fa-plus"></span> Form Ubah  Kategori Produk </h5>
                    </div>
                    <div class="ibox-content">
                    <form class="role" method="POST">
                       <div class="form-group">
                            <label>Kategori</label>
                            <input class="form-control" placeholder="Nama Kategori" type="text" name="kat_nm" value="<?php echo $row_kategori['kat_nm']; ?>">
                        </div>
                        <center>                     
                        <button type="submit" class="btn btn-primary" name="ubah"><span class="fa fa-pencil"></span> Ubah</button>
                        <button type="reset" class="btn btn-warning"><span class="fa fa-refresh"></span> Reset</button>
                    </center>
                    </form>
                     </div>
            </div>
        </div>
</div>