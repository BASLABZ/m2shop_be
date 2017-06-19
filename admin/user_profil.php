<?php 
    $iduser = $_SESSION['iduser'];
    $row_pengguna  = mysql_fetch_array(mysql_query("SELECT * from user where iduser = '".$iduser."'"));

    if (isset($_POST['simpan_profil'])) {
        $query_simpan = mysql_query("UPDATE user set 
                                            nama='".$_POST['nama']."',
                                            email = '".$_POST['email']."',
                                            username = '".$_POST['username']."'

                                         where iduser = '".$iduser."'");
        if ($query_simpan) {
            echo "<script>alert('Data Admin Berhasil diinputkan'); 
                location.href='index.php?pos=user_profil'</script>";exit;
        }
    }

    // ganti password
    if (isset($_POST['gantipassword'])) {
        $query_ganti_password = mysql_query("UPDATE user password = md5('".$_POST['password']."') where iduser =  '".$iduser."' ");
         if ($query_ganti_password) {
            echo "<script>alert('Data Admin Berhasil diinputkan'); 
                location.href='index.php?pos=user_profil'</script>";exit;
        }
    }

 ?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><span class="fa fa-user"></span> Profil Pengguna</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a>  Profil </a>
            </li>
            <li class="active">
                <strong>Profil Pengguna </strong>
            </li>
            <li><?php echo $row_pengguna['nama']; ?></li>
        </ol>
    </div>
    <div class="col-lg-2"></div>
</div>
        <div class="wrapper wrapper-content">
            <div class="row animated fadeInRight">
                <div class="col-md-8">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#tab-1"> Ubah Profil</a></li>
                            <li class=""><a data-toggle="tab" href="#tab-2">Ganti Password</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane active">
                                <div class="panel-body">
                                    <form class="role" method="POST">
                                           <div class="form-group">
                                            <label>Nama Pengguna</label>
                                            <input class="form-control" placeholder="Nama Pengguna" type="text" name="nama" value="<?php echo $row_pengguna['nama']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" placeholder="Email" type="text" name="email" value="<?php echo $row_pengguna['email']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" placeholder="Username" type="text" name="username" value="<?php echo $row_pengguna['username']; ?>">
                                        </div>
                                        <center>                     
                                            <button type="submit" class="btn btn-primary pull-right" name="simpan_profil"><span class="fa fa-save"></span> Simpan</button>
                                        </center>
                                </form>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane">
                                <div class="panel-body">
                                    <form class="role" method="POST">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" placeholder="Username" type="text" name="usernmae" value="<?php echo $row_pengguna['username']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" placeholder="Password" type="text" name="password">
                                        </div>
                                        
                                        <center>                     
                                            <button type="submit" class="btn btn-primary pull-right" name="gantipassword"><span class="fa fa-save"></span> Simpan</button>
                                        </center>
                                </form>
                                </div>
                            </div>
                        </div>


                </div>

                </div>
            </div>
        </div>