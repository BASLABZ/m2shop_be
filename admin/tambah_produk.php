<?php 
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
            $query = mysql_query("INSERT into produk values('','".$katpro_id."','".$nama_produk."',NOW(),'".$harga."','".$deskripsi."',
                '".$fileName."','".$stok." ','".$status."','1')");

        }
        
        }else{
           $query = mysql_query("INSERT into produk values('','".$katpro_id."','".$nama_produk."',NOW(),'".$harga."','".$deskripsi."',
                '','".$stok." ','".$status."','1')"); 
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
                        <h5><span class="fa fa-plus"></span> Form Tambah Produk </h5>
                    </div>
                    <div class="ibox-content">
                    <form class="role" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Judul Produk</label>
                            <input type="text" class="form-control" name="nama_produk" required>
                        </div>     
                        <div class="form-group">
                         <div class="row">
                             <div class="col-md-3">
                                    <label>Kategori Produk</label>
                                    <select name="katpro_id" class="form-control">
                                        <option>Pilih Kategori</option>
                                        <?php $query_kategori = mysql_query("SELECT * FROM kategori_produk order by katpro_id DESC");
                                            while ($row_kategori  = mysql_fetch_array($query_kategori)) {
                                         ?>
                                         <option value="<?php echo $row_kategori['katpro_id']; ?>">
                                             <?php echo $row_kategori['kat_nm']; ?>
                                         </option>
                                        <?php } ?>
                                    </select>
                             </div>
                             <div class="col-md-3">
                                 <label>Status Produk</label>
                                 <select name="status" class="form-control">
                                     <option value="new">Produk Baru</option>
                                     <option value="old">Produk Lama</option>
                                 </select>
                             </div>
                              <div class="col-md-3">
                                <label>Stok</label>
                                <input type="number" class="form-control" name="stok">
                            </div>
                            <div class="col-md-3">
                                <label>Harga</label>
                                <input type="number" class="form-control" name="harga">
                            </div>
                         </div>
                        </div>     
                        <div class="form-group">
                            <label>Deskripsi Produk</label>
                            <textarea  class="summernote" name="deskripsi"></textarea>
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
