<?php
    if(isset($_POST['simpan']))
    {
        if (!ereg("[a-z|A-Z]","$_POST[judul]")){
    echo "<script>window.alert('Judul Order tidak boleh diisi dengan angka atau simbol')</script>";
    echo "<meta http-equiv='refresh' content='0; url=index.php?pos=tambah_cara_order'>";

    }
        /*$mdd= date("Y-m-d");*/
        else{
        $sql_cara = mysql_query("INSERT into caraorder (judul,deskripsi,publish)
        values('$_POST[judul]','$_POST[deskripsi]','yes')");
        
        if($sql_cara)
        {
            echo "<script> alert(' Data berhasil dimasukkan '); location.href='index.php?pos=data_cara_order' </script>";exit;
        }
    }}
?> 
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><span class="fa fa-users"></span> Data Cara Pemesanan Di Toko</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a>Cara Pemesanan Di Toko</a>
                        </li>
                        <li class="active">
                            <strong>Data Cara Pemesanan Di Toko</strong>
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
                        <h5><span class="fa fa-plus"></span> Form Tambah Cara Pemesanan Di Toko </h5>
                    </div>
                    <div class="ibox-content">
                    <form class="role" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Judul Cara Pesan</label>
                            <input type="text" class="form-control" name="judul" required>
                        </div>     
                        <div class="form-group">
                            <label>Deskripsi Cara Pesan</label>
                            <textarea  class="summernote" name="deskripsi"></textarea>
                        </div>     
                        <div class="form-group">
                            <button type="submit" name="simpan" class=" btn btn-primary pull-right">
                                <span class="fa fa-save"></span> Simpan</button>
                            <br>
                        </div>     
                        
                        
                    </form>
                     </div>
            </div>
        </div>
</div>
