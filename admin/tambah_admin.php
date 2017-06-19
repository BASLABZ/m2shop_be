<?php 
    if (isset($_POST['admin'])) 
    {
        $kar1=strstr($_POST['email'], "@");
        $kar1=strstr($_POST['email'], ".");
        $password=$_POST['password'];

        $cek_username=mysql_num_rows(mysql_query("SELECT username FROM user WHERE username='$_POST[username]'"));

        $cek_email=mysql_num_rows(mysql_query("SELECT email FROM user WHERE email='$_POST[email]'"));
        if ($cek_email>0) 
        {
            echo "<script>window.alert('Email yang anda masukkan sudah digunakan')</script>";
            echo "<meta http-equiv='refresh' content='0'; url=index.php?pos=data_admin'>";
        }
        if ($cek_username>0) {
            echo "<script>window.alert('Username yang anda masukkan sudah digunakan')</script>";
            echo "<meta http-equiv='refresh' content='0'; url=index.php?pos=data_admin'>";   
        }
        elseif (empty($_POST['nama']) || empty($_POST['password']) || empty($_POST['username']) || empty($_POST['email'])) {
            echo "<script>window.alert('Data yang anda isikan belum lengkap')</script>";
            echo "<meta http-equiv='refresh' content='0'; url=index.php?pos=data_admin'>";   
        }
        elseif (!ereg("[a-z|A-Z]","$_POST[nama]")) {
            echo "<script>window.alert('Nama tidak boleh diisi dengan angka atu simbol')</script>";
            echo "<meta http-equiv='refresh' content='0'; url=index.php?pos=data_admin'>";
        }else{
            $sql_admin = mysql_query("INSERT into user(nama,email,username,password,type)
            values('$_POST[nama]','$_POST[email]','$_POST[username]','$_POST[password]','super')");
            if ($sql_admin) 
            {
                echo "<script>alert('Data Admin Berhasil diinputkan'); 
                location.href='index.php?pos=data_admin'</script>";exit;
            }
        }

    }

 ?>
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><span class="fa fa-users"></span> Data Admin</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index-2.html">Home</a>
                        </li>
                        <li>
                            <a>Admin</a>
                        </li>
                        <li class="active">
                            <strong>Data Admin</strong>
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
                        <h5><span class="fa fa-plus"></span> Form Tambah Pengguna / Admin </h5>
                    </div>
                    <div class="ibox-content">
                    <form class="role" method="POST">
                               <div class="form-group">
                                <label>Nama Pengguna</label>
                                <input class="form-control" placeholder="Nama Pengguna" type="text" name="nama">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" placeholder="Email" type="text" name="email">
                            </div>

                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" placeholder="Username" type="text" name="username">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" placeholder="Password" type="password" name="password">
                            </div>
                            <center>                     
                            <button type="submit" class="btn btn-primary" name="admin"><span class="fa fa-save"></span> Simpan</button>
                            <button type="reset" class="btn btn-warning"><span class="fa fa-refresh"></span> Reset</button>
                            </center>
                    </form>
                     </div>
            </div>
        </div>
</div>