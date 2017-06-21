<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><span class="fa fa-tags"></span> Filter Laporan Transaksi Per Periode</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a>Laporan</a>
                        </li>
                        <li class="active">
                            <strong>Filter Laporan Transaksi Per Periode</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5><span class="fa fa-file-o"></span> Filter Laporan Transaksi Per Periode </h5>
                    </div>
                    <div class="ibox-content">
                    <form class="role" action="cetak_hasil_filter_laporan_transaksi.php" method="POST" name="form1" target="_blank">
                       <div class="row">
                           <div class="col-md-5">
                               <div class="form-group">
                                    <label>Periode 1</label>
                                    <input type="date" name="periode1" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                </div>
                           </div>
                           <div class="col-md-5">
                               <div class="form-group">
                                    <label>Periode 2</label>
                                    <input type="date" name="periode2"  class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                </div>
                           </div>
                           <div class="col-md-2"><br>
                            <button type="submit" class="btn btn-primary" name="cetak"><span class="fa fa-search"></span> Filter</button>       
                           </div> 
                       </div>
                    </form>
                     </div>
            </div>
        </div>
</div>