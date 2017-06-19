<?php 
if (isset($_POST['simpan'])) {
    $profil_nm=$_POST['profil_nm'];
    $profil_des=$_POST['profil_des'];
    if (!empty($_FILES) && $_FILES['gambar']['size'] > 0 && $_FILES['gambar']['error'] == 0) 
    {
        $fileName = $_FILES['gambar']['name'];
        $move = move_uploaded_file($_FILES['gambar']['tmp_name'], 'images/'.$fileName);
        if ($move) {
            $query = mysql_query("INSERT into profil values('','$profil_nm','$profil_des','$fileName','yes')");
        }else{
            $query = mysql_query("INSERT into profil values('','$profil_nm','$profil_des','','yes')");
        }
        if ($query) {
            echo "<script> alert(' Data Profil berhasil dimasukkan '); 
            location.href='index.php?pos=data_profil' </script>";exit;
          
        }else{
            echo "<script> alert(' Data Gagal Disimpan '); 
            location.href='index.php?pos=tambah_profil' </script>";exit;    
        }
    }
}
 ?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><span class="fa fa-users"></span> Data Profil Toko</h2>
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
                        <h5><span class="fa fa-plus"></span> Form Tambah Profil Toko </h5>
                    </div>
                    <div class="ibox-content">
                    <form class="role" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Judul Profil</label>
                            <input type="text" class="form-control" name="profil_nm" required>
                        </div>     
                        <div class="form-group">
                            <label>Deskripsi Profil</label>
                            <textarea  class="summernote" name="profil_des"></textarea>
                        </div>     
                        <div class="form-group">
                            <label>Upload</label>
                            <input type="file" name="gambar" required>
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
