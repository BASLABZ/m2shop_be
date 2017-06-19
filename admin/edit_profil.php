<?php 
    $profil_id=$_GET["profil_id"];
    $result=mysql_query("SELECT * FROM profil WHERE profil_id = $profil_id");
    $row_profil=mysql_fetch_array($result);
    $gambar=$row_profil['gambar'];

    if (isset($_POST['ubah'])) {
	    
	        if (!empty($_FILES) && $_FILES['gambar']['size'] > 0 && $_FILES['gambar']['error'] == 0) 
	    {
	        $fileName = $_FILES['gambar']['name'];
	        $move = move_uploaded_file($_FILES['gambar']['tmp_name'], 'images/'.$fileName);
	        if ($move) {
	            $query = mysql_query("UPDATE profil SET profil_nm='".$_POST['profil_nm']."',profil_des='".$_POST['profil_des']."',
	                    gambar='".$fileName."' WHERE profil_id='".$profil_id."'");
	        }
	        
	    }else{
	    	    $query = mysql_query("UPDATE profil SET profil_nm='".$_POST['profil_nm']."',profil_des='".$_POST['profil_des']."' WHERE profil_id='".$profil_id."'");
	    }
	    if ($query) {
	            echo "<script> alert(' Data Profil berhasil diubah '); 
	            location.href='index.php?pos=data_profil' </script>";exit;
	          
	        }else{
	            echo "<script> alert(' Data Gagal Disimpan '); 
	            location.href='index.php?pos=edit_profil' </script>";exit;  
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
                        <li>Ubah Data Profil </li>
                        <li><?php echo $row_profil['profil_nm']; ?></li>
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
                        <h5><span class="fa fa-plus"></span> Form Ubah Profil Toko </h5>
                    </div>
                    <div class="ibox-content">
                    <form class="role" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Judul Profil</label>
                            <input type="text" class="form-control" name="profil_nm" required value="<?php echo $row_profil['profil_nm']; ?>">
                        </div>     
                        <div class="form-group">
                            <label>Deskripsi Profil</label>
                            <textarea  class="summernote" name="profil_des"><?php echo $row_profil['profil_des']; ?></textarea>
                        </div>     
                        <div class="form-group">
                            <label>Upload</label>
                            <input type="file" name="gambar">
                            <br>
                            <img src="images/<?php echo $gambar; ?>" class="img-responsive" style="width: 200px;">
                        </div>
                        <div class="form-group">
                            <button type="submit" name="ubah" class=" btn btn-primary pull-right">
                                <span class="fa fa-pencil"></span> Ubah</button>
                            <br>
                        </div>     
                        
                        
                    </form>
                     </div>
            </div>
        </div>
</div>