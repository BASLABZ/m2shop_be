    <?php
    $row_suplier = mysql_fetch_array(mysql_query("SELECT * FROM suplier where id_suplier = '".$_GET['id_suplier']."'"));

    if(isset($_POST['ubah']))
    {

    if (!ereg("[a-z|A-Z]","".$_POST['nama_suplier']."")){
            echo "<script>window.alert('Nama Kategori tidak boleh diisi dengan angka atau simbol')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?pos=data_suplier'>";

    }else{
        $sql_suplier = mysql_query("UPDATE suplier set nama_suplier = '".$_POST['nama_suplier']."',
                                                      alamat_suplier = '".$_POST['alamat_suplier']."',
                                                      kontak_suplier = '".$_POST['kontak_suplier']."',
                                                      email_suplier = '".$_POST['email_suplier']."'
                                                      ");

        if($sql_suplier)
        {
            echo "<script> alert(' Data berhasil diubah '); 
            location.href='index.php?pos=data_suplier' </script>";exit;
      
        }
    }}
?>

<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><span class="fa fa-users"></span> Data Suplier</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index-2.html">Home</a>
                        </li>
                        <li>
                            <a>Supliers</a>
                        </li>
                        <li class="active">
                            <strong>Data Suplier</strong>
                        </li>
                        <li><?php echo $row_suplier['nama_suplier']; ?></li>
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
                        <h5><span class="fa fa-plus"></span> Form Tambah  Suplier Produk </h5>
                    </div>
                    <div class="ibox-content">
                    <form class="role" method="POST">
                       <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input class="form-control" placeholder="Nama Suplier" type="text" name="nama_suplier" value="<?php echo $row_suplier['nama_suplier']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Kontak </label>
                            <input class="form-control" placeholder="Kontak Suplier" type="text" name="kontak_suplier" value="<?php echo $row_suplier['kontak_suplier']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Alamat </label>
                            <textarea class="form-control" name="alamat_suplier" required="">
                                <?php echo $row_suplier['alamat_suplier']; ?>
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Email </label>
                            <input class="form-control" placeholder="Nama Suplier" type="text" name="email_suplier" value="<?php echo $row_suplier['email_suplier']; ?>">
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