<?php 
	$idtestimoni = $_GET['idtestimoni'];
	$row = mysql_fetch_array(mysql_query("SELECT * FROM bukutamu where buku_id = '".$idtestimoni."' "));
 ?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><span class="fa fa-users"></span> Data Lihat Pesan</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index-2.html">Home</a>
            </li>
            <li>
                <a>Lihat Pesan</a>
            </li>
            <li class="active">
                <strong> Lihat Pesan</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>

        <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12 animated fadeInRight">
            <div class="mail-box-header">
                <div class="pull-right tooltip-demo">
                    <a href="index.php?pos=lihat_testimoni&idtestimoni=<?php echo $idtestimoni; ?>" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </a>
                </div>
                <h2>
                    View Pesan
                </h2>
                <div class="mail-tools tooltip-demo m-t-md">
                    <h5>
                        <span class="fa fa-user"></span> <?php echo $row['nama']; ?>
                    </h5>
                    <h5>
                        <span class="fa fa-envelope"> </span> <?php echo $row['email']; ?>
                    </h5>
                </div>
            </div>
                <div class="mail-box">


                <div class="mail-body">
                    <p>
                       <?php echo $row['pesan']; ?>
                </div>
                </div>
            </div>
        </div>
        </div>
           