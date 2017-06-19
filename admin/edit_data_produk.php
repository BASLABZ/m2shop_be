<?php 

$idproduk = $_GET['id_produk'];
$row_produk = mysql_fetch_array(mysql_query("SELECT * FROM produk where id_produk = '".$idproduk."' "));

if (isset($_POST['simpan'])) {
    $katpro_id = $_POST['katpro_id'];
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    $stok = $_POST['stok'];
    $status = $_POST['status'];


    if(!empty($_FILES) && $_FILES['gambar']['size'] > 0 && $_FILES['gambar']['error'] == 0){
        $fileName = $_FILES['gambar']['name'];
        $move = move_uploaded_file($_FILES['gambar']['tmp_name'], 'images/'.$fileName);
        if($move){
            $query = mysql_query("UPDATE produk set 
                                                    nama_produk='".$nama_produk."',
                                                    harga = '".$harga."',
                                                    deskripsi = '".$deskripsi."',
                                                    stok = '".$stok."',
                                                    status = '".$status."',
                                                    katpro_id = '".$katpro_id."',
                                                    gambar = '".$fileName."' where id_produk = '".$idproduk."' ");

        }
        
        }else{
           $query = mysql_query("UPDATE produk set 
                                                nama_produk='".$nama_produk."',
                                                harga = '".$harga."',
                                                deskripsi = '".$deskripsi."',
                                                stok = '".$stok."',
                                                status = '".$status."',
                                                katpro_id = '".$katpro_id."' 
                                                where id_produk = '".$idproduk."' "); 
        }
        if($query) {
            echo "<script> alert('Data Berhasil dimasukkan'); location.href='index.php?pos=data_produk' </script>";exit;}
        else {
            echo "<script> alert('Data Gagal Masuk!!'); location.href='index.php?pos=tambah_produk' </script>";exit;}
    }
 ?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><span class="fa fa-gift"></span> Data Produk</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a>Produk</a>
                        </li>
                        <li class="active">
                            <strong>Data Produk</strong>
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
                        <h5><span class="fa fa-pencil"></span> Form Ubah Produk </h5>
                    </div>
                    <div class="ibox-content">
                    <form class="role" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Judul Produk</label>
                            <input type="text" class="form-control" name="nama_produk" required value="<?php echo $row_produk['nama_produk']; ?>">
                        </div>     
                        <div class="form-group">
                         <div class="row">
                             <div class="col-md-3">
                                    <label>Kategori Produk</label>
                                    <select name="katpro_id" class="form-control">
                                        <option>Pilih Kategori</option>
                                       <?php 
                                              $querykategori = mysql_query("SELECT * from kategori_produk order by katpro_id ASC ");
                                              while ($kategori  = mysql_fetch_array($querykategori)) {
                                           ?>
                                           <option value="<?php echo $kategori['katpro_id']; ?>"
                                             <?php if($kategori['katpro_id']== $row_produk['katpro_id']){echo "selected=selected";}?>>
                                             <?php echo $kategori['kat_nm']; ?>
                                             </option>
                                             <?php } ?>                                   
                                    </select>
                             </div>
                             <div class="col-md-3">
                                 <label>Status Produk</label>
                                 <select name="status" class="form-control">
                                   <option value="new" <?php if($row_produk['status']=='new'){echo "selected=selected";}?>>Baru</option>
                                      <option value="old" <?php if($row_produk['status']=='old'){echo "selected=selected";}?>>Lama</option>
                                 </select>
                             </div>
                              <div class="col-md-3">
                                <label>Stok</label>
                                <input type="number" class="form-control" name="stok" value="<?php echo $row_produk['stok']; ?>">
                            </div>
                            <div class="col-md-3">
                                <label>Harga</label>
                                <input type="number" class="form-control" name="harga" value="<?php echo $row_produk['harga']; ?>">
                            </div>
                         </div>
                        </div>     
                        <div class="form-group">
                            <label>Deskripsi Produk</label>
                            <textarea  class="summernote" name="deskripsi">
                                <?php echo $row_produk['deskripsi']; ?>
                            </textarea>
                        </div>     
                        <div class="form-group">
                            <label>Upload</label>
                            <input type="file" name="gambar">
                            <br>
                            <br>
                            <img src="images/<?php echo $row_produk['gambar']; ?>" style='width: 100px;' class='img-responsive'> 

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
