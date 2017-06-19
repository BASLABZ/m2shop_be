<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><span class="fa fa-users"></span> Data Kustomer</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a>Kustomer</a>
            </li>
            <li class="active">
                <strong>Data Kustomer</strong>
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
            <h5><span class="fa fa-list"></span> Data  Kustomer </h5>
        </div>
        <div class="ibox-content">
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example datatable"  >
        <thead>
          <tr>
            <th width="1%">No</th>
            <th width="11%">Nama Pengguna</th>                                        
            <th width="8%">Email</th>
            <th width="8%">No. Telpon</th> 
            <th width="20%"><center>Alamat</center></th>
            <th width="5%"><center>Username</center></th> 
            <th width="5%"><center>Aksi</center></th>                                       
        </tr>
        </thead>
            <tbody>
            <?php 
            if (isset($_GET['aktif'])) {
                                        mysql_query("UPDATE kustomer set aktif = '".$_GET['aktif']."' where id_kustomer='".$_GET['id_kustomer']."'");
                                    } 
            $no=0;
            $query_kustomer = mysql_query("SELECT * FROM kustomer order by id_kustomer DESC");
            while ($row_kustomer  = mysql_fetch_array($query_kustomer)) {
             ?>
             <tr>
                 <td><?php echo ++$no; ?></td>
                 <td><?php echo $row_kustomer['nama_lengkap']; ?></td> 
                 <td><?php echo $row_kustomer['email']; ?></td>
                 <td><?php echo $row_kustomer['telpon']; ?></td>
                 <td><?php echo $row_kustomer['alamat']; ?></td>
                 <td><?php echo $row_kustomer['username']; ?></td>
                 <td>
                    <!--  <a href="index.php?pos=data_kustomer&del=<?php //echo $row_kustomer['id_kustomer']; ?>" onclick="return confirm(
                                'Anda Yakin Ingin Menghapus Member Ini ?')"
                                class="btn btn-danger">Hapus</a> -->
                                <?php if ($row_kustomer['aktif'] == 'Y'){                                    
                                 ?>
                                    <a href="index.php?pos=data_kustomer&aktif=N&id_kustomer=
                                    <?php echo $row_kustomer['id_kustomer']; ?>" class="btn btn-warning"  ><span class="fa fa-times"></span> Blokir</a>
                                <?php } else  { ?>
                                    <a href="index.php?pos=data_kustomer&aktif=Y&id_kustomer=
                                    <?php echo $row_kustomer['id_kustomer']; ?>" class="btn btn-primary" ><span class="fa fa-check"></span> Aktif</a>
                                <?php } ?>
                 </td>
                 
             </tr>
             <?php } ?>
            </tbody>
        </table>

        </div>
    </div>
</div>
</div>
</div>