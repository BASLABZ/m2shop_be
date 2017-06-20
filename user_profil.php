	<!-- fungi update akun -->
    <?php 
        if (isset($_POST['UPDATE_AKUN'])) {
            $query_update_akun  = mysql_query("UPDATE kustomer set 
                                                nama_lengkap = '".$_POST['nama_lengkap']."' ,
                                                alamat = '".$_POST['alamat']."',
                                                telpon = '".$_POST['telpon']."'
                                                WHERE id_kustomer  = '".$_SESSION['id_kustomer']."' ");
            if ($query_update_akun) {
                 echo "<script> alert('Akun Telah Berhasil Di Update'); 
                    location.href='index.php?p=user_profil' </script>";exit;
            }
        }
     ?>
    <!-- fungsi ganti password -->
    <?php 
            if (isset($_POST['UBAH_PASSWORD'])) {
                $password_baru = $_POST['password_baru'];
                $password_konfirmasi_baru = $_POST['konfirmasi_password_baru'];
                if ($password_baru != $password_konfirmasi_baru) {
                     echo "<script> alert('Konfirmasi Password Baru Anda Tidak Sesuai'); 
                    location.href='index.php?p=user_profil' </script>";exit;
                }else{
                    $sql_update_password  = mysql_query("UPDATE kustomer set password = md5('".$password_baru."') where id_kustomer = '".$_SESSION['id_kustomer']."' ");
                    if ($sql_update_password) {
                      echo "<script> alert('Password Telah Diganti'); 
                    location.href='index.php?p=user_profil' </script>";exit;  
                    }
                }
            }

     ?>
    <div class="main" role="main">
    	<div id="content" class="content full dashboard-pages">
        	<div class="container">
            	<div class="dashboard-wrapper">
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <!-- SIDEBAR -->
                            <?php if (isset($_SESSION['id_kustomer'])) { ?>
                            <div class="users-sidebar tbssticky">
                                <a href="index.php?p=user_profil" class="btn btn-block btn-primary add-listing-btn">Profil Kustomer</a>
                                <ul class="list-group">
                                    <li class="list-group-item"> <a href="index.php?p=user_profil"><i class="fa fa-user"></i> Profil Ku</a></li>
                                    <li class="list-group-item active"> 
                                    <?php 
                                       $sid_cek = session_id();
                                        $query_jumlah_keranjang = mysql_query("SELECT count(*) As JUMLAH_ORDER_SEMENTARA FROM orders_temp where id_session = '".$sid_cek."'");
                                        $jumlah_order = mysql_fetch_array($query_jumlah_keranjang);
                                        if ($jumlah_order['JUMLAH_ORDER_SEMENTARA'] >0 ) {
                                     ?>
                                      <span class="badge"><?php echo $jumlah_order['JUMLAH_ORDER_SEMENTARA']; ?></span> 
                                       <?php } ?>
                                     <a href="index.php?p=cart"><i class="fa fa-shopping-cart"></i> Keranjang Belanja</a></li>
                                    
                                    <li class="list-group-item">
                                    <?php 
                                        $query_pembelian = mysql_query("SELECT count(*) AS JUMLAH_PEMBELIAN FROM orders where id_kustomer = '".$_SESSION['id_kustomer']."'");
                                        $jumlah_pembelian = mysql_fetch_array($query_pembelian);
                                     ?>
                                     <span class="badge"><?php echo $jumlah_pembelian['JUMLAH_PEMBELIAN']; ?></span> 
                                    <a href="index.php?p=list_pembelian"><i class="fa fa-list"></i>Pembelian Barang</a></li>
                                    <li class="list-group-item"> <a href="index.php?logout=1"><i class="fa fa-sign-out"></i> Keluar</a></li>
                                </ul>
                            </div>
                            <?php }else{ ?>
                            <div class="users-sidebar tbssticky">
                                <ul class="list-group">

                                    <li class="list-group-item active"> 
                                    <?php 
                                       $sid_cek = session_id();
                                        $query_jumlah_keranjang = mysql_query("SELECT count(*) As JUMLAH_ORDER_SEMENTARA FROM orders_temp where id_session = '".$sid_cek."'");
                                        $jumlah_order = mysql_fetch_array($query_jumlah_keranjang);
                                        if ($jumlah_order['JUMLAH_ORDER_SEMENTARA'] >0 ) {
                                     ?>
                                      <span class="badge"><?php echo $jumlah_order['JUMLAH_ORDER_SEMENTARA']; ?></span> 
                                       <?php } ?>
                                     <a href="index.php?p=cart"><i class="fa fa-shopping-cart"></i> Keranjang Belanja</a></li>

                                    <li class="list-group-item"> <a data-toggle="modal" data-target="#loginModal"><i class="fa fa-sign-in"></i> Login</a></li>
                                    <li class="list-group-item"> <a href="index.php?p=cart"><i class="fa fa-check"></i> Informasi Keranjang Belanja</a>
                                      <p>
                                          Untuk Melakukan Pembelian Silahkan Login Terbih Dahulu,<br>
                                          Atau Baca Aturan Cara Pembelian <br>
                                          <a href="index.php?p=caraorder" class="btn btn-success btn-block btn-xs pull-right" style="color: white;"><span class="fa fa-book"></span> Cara Beli </a> <br>
                                      </p>
                                      </li>
                                </ul>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-9 col-sm-8">
                        	<h2>Profil Kustomer </h2>
                            <div class="dashboard-block">
                                <div class="tabs profile-tabs">
                                    <ul class="nav nav-tabs">
                                        <li class="active"> <a data-toggle="tab" href="#personalinfo" aria-controls="personalinfo" role="tab">Personal Info</a></li>
                                        <li> <a data-toggle="tab" href="#changepassword" aria-controls="changepassword" role="tab">Ubah Password</a></li>
                                    </ul>
                                    
                                        <div class="tab-content">
                                            <!-- PROFIE PERSONAL INFO -->
                                            <div id="personalinfo" class="tab-pane fade active in">
                                                <form method="POST"> 
                                                    <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Nama Lengkap</label>
                                                                <input type="text" class="form-control" placeholder="" required value="<?php echo $_SESSION['nama_lengkap']; ?>" name='nama_lengkap'>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Email</label>
                                                                 <input type="text" class="form-control" placeholder="mail@example.com" required value="<?php echo $_SESSION['email']; ?>" name='email' disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Alamat*</label>
                                                                <textarea class="form-control" name="alamat" style="margin: 0px -17.0156px 20px 0px; height: 138px; width: 261px;">
                                                                    <?php echo $_SESSION['alamat']; ?>
                                                                </textarea>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>No Telp</label>
                                                                <input type="text" name="telpon" class="form-control" value="<?php echo $_SESSION['telpon']; ?>">
                                                            </div>
                                                        </div>
                                                        <button type="submit" name="UPDATE_AKUN" class="btn btn-info">Update Akun</button>

                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                            <!-- PROFIE CHANGE PASSWORD -->
                                            <div id="changepassword" class="tab-pane fade">
                                            	<div class="row">
                                                    <div class="col-md-8">
                                                        <form class="role" method="POST">
                                                            <div class="row">
                                                            <div class="col-md-6">
                                                                <label>Password Baru</label>
                                                                <input type="password" class="form-control" placeholder="" name="password_baru">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Konfirmasi password Baru</label>
                                                                <input type="password" class="form-control" placeholder="" name="konfirmasi_password_baru">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                <button type="submit" name="UBAH_PASSWORD" class="btn btn-warning"><span class="fa fa-save"></span> Ubah Passowrd</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        </form>
                                                  	</div>
                                               	</div>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                       	</div>
                    </div>
                </div>
           	</div>
        </div>
   	</div>