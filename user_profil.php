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
                            <div class="users-sidebar tbssticky">
                            	<a href="index.php?p=user_profil" class="btn btn-block btn-primary add-listing-btn">Profil Kustomer</a>
                                <ul class="list-group">
                                    <li class="list-group-item active"> <a href="user-dashboard-profile.html"><i class="fa fa-user"></i> Profil Ku</a></li>
                                    <li class="list-group-item"> <span class="badge">5</span> <a href="user-dashboard.html"><i class="fa fa-home"></i> Dashboard</a></li>
                                    <li class="list-group-item"> <span class="badge">5</span> <a href="user-dashboard-saved-searches.html"><i class="fa fa-folder-o"></i> Saved Searches</a></li>
                                    <li class="list-group-item"> <span class="badge">12</span> <a href="user-dashboard-saved-cars.html"><i class="fa fa-star-o"></i> Saved Cars</a></li>
                                    <li class="list-group-item"> <a href="add-listing-form.html"><i class="fa fa-plus-square-o"></i> Create new Ad</a></li>
                                    <li class="list-group-item"> <span class="badge">2</span> <a href="user-dashboard-manage-ads.html"><i class="fa fa-edit"></i> Manage Ads</a></li>
                                    <li class="list-group-item"> <a href="user-dashboard-settings.html"><i class="fa fa-cog"></i> Account Settings</a></li>
                                    <li class="list-group-item"> <a href="javascript:void(0)"><i class="fa fa-sign-out"></i> Log Out</a></li>
                                </ul>
                            </div>
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