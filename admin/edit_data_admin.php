<?php 
$sql_be=mysql_fetch_array(mysql_query("SELECT * FROM user where iduser='$_GET[iduser]'"));

if (isset($_POST['edit_data_admin'])) 
{
    $sql_data= mysql_query("UPDATE user set nama='$_POST[nama]',email='$_POST[email]',username='$_POST[username]',
               password='$_POST[password]' where iduser='$_GET[iduser]'");

    if ($sql_data) 
    {
        echo "<script> alert(' Data berhasil diubah '); 
        location.href='index.php?pos=data_admin' </script>";exit;
      
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
                    <form role="form" method="POST">
                        <h2>Form Profil Admin</h2>

                            <div class="form-group">
                                <label>Nama Pengguna</label>
                                <input class="form-control" placeholder="Nama Pengguna" type="text" name="nama" 
                                value="<?php echo $sql_be[1]; ?>">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" placeholder="Email" type="text" name="email"
                                value="<?php echo $sql_be[2]; ?>">
                            </div>

                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" placeholder="Username" type="text" name="username"
                                value="<?php echo $sql_be [3]; ?>">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" placeholder="Password" type="password" name="password"
                                value="<?php echo $sql_be[4]; ?>">
                            </div>                 
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary pull-right" name="edit_data_admin"><span class="fa fa-pencil"></span> Ubah</button>    
                            
                            </div>
                        </form>
                     </div>
            </div>
        </div>
</div>