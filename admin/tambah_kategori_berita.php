<?php 
        if (isset($_POST['simpan'])) {
               if (!ereg("[a-z|A-Z]","$_POST[kat_nm]")){
            echo "<script>window.alert('Nama Kategori tidak boleh diisi dengan angka atau simbol')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?pos=data_kategori_berita'>";

            }else{
                $sql_kategori = mysql_query("INSERT into kategori (kat_nm,publish)
                values('$_POST[kat_nm]','yes')");
                if($sql_kategori)
                {
                echo "<script> alert(' Data berhasil dimasukkan '); location.href='index.php?pos=data_kategori_berita' </script>";exit;
              
                }
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
                        <h5><span class="fa fa-plus"></span> Form Tambah  Kategori Berita </h5>
                    </div>
                    <div class="ibox-content">
                    <form class="role" method="POST">
                       <div class="form-group">
                            <label>Kategori</label>
                            <input class="form-control" placeholder="Nama Kategori" type="text" name="kat_nm">
                        </div>
                        <center>                     
                        <button type="submit" class="btn btn-primary" name="simpan"><span class="fa fa-save"></span> Simpan</button>
                        <button type="reset" class="btn btn-warning"><span class="fa fa-refresh"></span> Reset</button>
                    </center>
                    </form>
                     </div>
            </div>
        </div>
</div>