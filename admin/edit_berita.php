<?php 
    $berita_id=$_GET["berita_id"];
    $result=mysql_query("SELECT * FROM berita WHERE berita_id = $berita_id");
    $row_berita=mysql_fetch_array($result);
    $gambar=$row_berita['gambar'];

    if (isset($_POST['ubah'])) {
    if (!empty($_FILES) && $_FILES['gambar']['size'] > 0 && $_FILES['gambar']['error'] == 0) 
    {
        $fileName = $_FILES['gambar']['name'];
        $move = move_uploaded_file($_FILES['gambar']['tmp_name'], 'images/'.$fileName);
        if ($move) {
          $query = mysql_query("UPDATE berita SET berita_judul='".$_POST['berita_judul']."', berita_des='".$_POST['berita_des']."',gambar='".$fileName."',kat_id='".$_POST['kat_id']."' WHERE berita_id='".$berita_id."'");
        }
       
    }else{
    	$query = mysql_query("UPDATE berita SET berita_judul='".$_POST['berita_judul']."', berita_des='".$_POST['berita_des']."'
				,kat_id='".$_POST['kat_id']."' WHERE berita_id='".$berita_id."'");
    }
     if ($query) {
            echo "<script> alert(' Data Berita berhasil dimasukkan '); 
            location.href='index.php?pos=data_berita' </script>";exit;
          
        }else{
            echo "<script> alert(' Data Gagal Disimpan '); 
            location.href='index.php?pos=tambah_berita' </script>";exit;    
        }
}

 ?>

 <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><span class="fa fa-users"></span> Data Berita</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a>Berita</a>
            </li>
            <li class="active">
                <strong>Data Berita</strong>
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
	                <h5><span class="fa fa-plus"></span> Form Ubah Berita </h5>
	            </div>
	            <div class="ibox-content">
	            <form class="role" method="POST" enctype="multipart/form-data">
	                <div class="form-group">
	                    <label>Judul Berita</label>
	                    <input type="text" class="form-control" name="berita_judul" required value="<?php echo $row_berita['berita_judul']; ?>">
	                </div>
	                <div class="form-group">
	                    <div class="row">
	                        <div class="col-lg-6">
	                            <label>Kategori Berita</label> 
	                                <select name="kat_id" class="form-control" >
	                                    <option value="null">Pilih Kategori</option>
	                                     <?php 
                                              $querykategori = mysql_query("SELECT * from kategori order by kat_id ASC ");
                                              while ($kategori  = mysql_fetch_array($querykategori)) {
                                           ?>
                                           <option value="<?php echo $kategori['kat_id']; ?>"
                                             <?php if($kategori['kat_id']== $row_berita['kat_id']){echo "selected=selected";}?>>
                                             <?php echo $kategori['kat_nm']; ?>
                                             </option>
                                             <?php } ?>                                   
	                                </select>
	                        </div>
	                    </div>
	                </div>
	                     
	                <div class="form-group">
	                    <label>Deskripsi Berita</label>
	                    <textarea  class="summernote" name="berita_des"><?php echo $row_berita['berita_des']; ?></textarea>
	                </div>     
	                <div class="form-group">
	                    <label>Upload</label>
	                    <input type="file" name="gambar">
	                    <br>
	                    <img src="images/<?php echo $gambar; ?>" class='img-responsive' style='width: 400px'>
	                </div>
	                <div class="form-group">
	                    <button type="submit" name="ubah" class=" btn btn-primary pull-right">
	                        <span class="fa fa-save"></span> Simpan</button>
	                    <br>
	                </div>     
	                
	                
	            </form>
	             </div>
	    </div>
	</div>
	</div>