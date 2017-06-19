<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><span class="fa fa-envelope"></span> Data   Testimoni </h2>
        <ol class="breadcrumb">
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a>  Testimoni </a>
            </li>
            <li class="active">
                <strong>Data  Testimoni </strong>
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
            <h5><span class="fa fa-list"></span> Data  Testimoni </h5>
        </div>
        <div class="ibox-content">
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dataTables-example datatable"  >
        <thead>
             <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th><center>Aksi</center></th>
            </tr>
        </thead>
            <tbody>
                <?php 
                $no=0;
                $query_testimoni = mysql_query("SELECT * FROM bukutamu ORDER by buku_id DESC");
                while ($row_testimoni = mysql_fetch_array($query_testimoni) ) {
                 ?>
                 <tr>
                     <td><?php echo ++$no; ?></td>
                     <td><?php echo $row_testimoni['nama']; ?></td>
                     <td><?php echo $row_testimoni['email']; ?></td>
                     <td><?php echo $row_testimoni['pesan']; ?></td>
                     <td>

                         <a href="index.php?pos=lihat_testimoni&idtestimoni=<?php echo $row_testimoni['buku_id']; ?>" class="btn btn-primary"><span class="fa fa-desktop"></span> Lihat</a>
                         <a href="" class="btn btn-danger"><span class="fa fa-times"></span> Hapus</a>
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