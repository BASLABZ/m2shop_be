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
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><span class="fa fa-list"></span> Data Pengguna / Admin <a href="index.php?pos=tambah_admin" class="btn btn-primary btn-xs"><span class="fa fa-plus"></span> Tambah Data</a> </h5>
                    </div>
                    <div class="ibox-content">
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example datatable"  >
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pengguna</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th><center>Aksi</center></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                                if (isset($_GET['del'])) {
                                    $sql_hapus = mysql_query("DELETE FROM user where iduser='$_GET[del]'");
                                    if ($sql_hapus) {
                                        echo "<script>alert('Data Admin Berhasil dihapus'); 
                                        location.href='index.php?pos=data_admin'</script>";exit;
                                    }
                                }
                             ?>
                             <?php 

                                 $sql=mysql_query("SELECT iduser,nama,username,password,email FROM user where type='super' order by iduser desc");
                                 $no=1;
                                     while ($row_data=mysql_fetch_array($sql)) {
                                  ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row_data['nama']; ?></td>
                                        <td><?php echo $row_data['email']; ?></td>
                                        <td><?php echo $row_data['username']; ?></td>
                                        <td><center>
                                        <a href="index.php?pos=edit_data_admin&iduser=<?php echo $row_data[0]; ?>">
                                        <button  class="btn btn-primary"><span class="fa fa-pencil"></span> Edit</button>
                                        </a>  
                                        <a href="index.php?pos=data_admin&del=<?php echo $row_data[0]; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini ?')">
                                        <button  class="btn btn-danger"><span class="fa fa-times"></span> Hapus</button>
                                        </a></center>
                                        </td>
                                    </tr>
                                    <?php $no++;}?>
                        </tbody>
                    </table>

                    </div>
                </div>
            </div>
        </div>
</div>