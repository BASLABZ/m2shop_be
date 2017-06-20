<?php 

  include'library/fungsi_rupiah.php';
  $sql = "SELECT id_kustomer,username,password,
                  nama_lengkap,alamat,password,email,telpon
                  from kustomer 
                  where username='".$_SESSION['username']."'";
    $hasil = mysql_query($sql);
            $r = mysql_fetch_array($hasil);

            function isi_keranjang(){
              $isikeranjang = array();
              $sid = session_id();
              $sql = mysql_query("SELECT * FROM orders_temp WHERE id_session='".$sid."'");
              while ($r=mysql_fetch_array($sql)) {
                $isikeranjang[] = $r;
              }
              return $isikeranjang;
            }

            $tgl_skrg = date("Ymd");
            $jam_skrg = date("H:i:s");
            $id_kustomer = $r['id_kustomer'];
            // inserrt to table taransaction
            // simpan data pemesanan 
          mysql_query("INSERT INTO orders(tgl_order,jam_order,id_kustomer) VALUES('".$tgl_skrg."','".$jam_skrg."','".$id_kustomer."')");  
           // mendapatkan nomor orders
          $id_orders=mysql_insert_id();
          // panggil fungsi isi_keranjang dan hitung jumlah produk yang dipesan
          $isikeranjang = isi_keranjang();
          $jml          = count($isikeranjang);
          
          // simpan data detail pemesanan  
          for ($i = 0; $i < $jml; $i++){
            mysql_query("INSERT INTO orders_detail(id_orders, id_produk, jumlah) 
                   VALUES('$id_orders',{$isikeranjang[$i]['id_produk']}, {$isikeranjang[$i]['jumlah']})");
          }
          //update/kurangi stok produk
          for ($i = 0; $i < $jml; $i++) {
           mysql_query("UPDATE produk SET stok = stok - {$isikeranjang[$i]['jumlah']}
                         WHERE id_produk = {$isikeranjang[$i]['id_produk']}");
          }
            
          // setelah data pemesanan tersimpan, hapus data pemesanan di tabel pemesanan sementara (orders_temp)
          for ($i = 0; $i < $jml; $i++) {
            mysql_query("DELETE FROM orders_temp
                   WHERE id_orders_temp = {$isikeranjang[$i]['id_orders_temp']}");
          }
          

            
 ?>
 
 <!-- proses view dan pengiriman barang dengan API ongkir -->
   <div class="main" role="main">
      <div id="content" class="content full dashboard-pages">
          <div class="container">
              <div class="dashboard-wrapper">
                    <div class="row">
                        <div class="col-md-9 col-sm-8">
                          <h2 style="font-size: 16px;">Transaksi Pembelian > <span class="fa fa-truck"></span> Proses Pengiriman </h2>
                            <div class="dashboard-block">
                                <div class="tabs profile-tabs">
                                    <ul class="nav nav-tabs">
                                        <li class="active"> <a data-toggle="tab" href="#personalinfo" aria-controls="personalinfo" role="tab"><span class="fa fa-truck"></span> Ongkir</a></li>
                                    </ul>
                                      <div class="tab-content">
                                          <div id="personalinfo" class="tab-pane fade active in">
                                            <form class="role">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-3">Asal Propinsi</label>
                                         <div class="col-md-6">
                                            <select class="form-control select2" id="oriprovince" style="width: 276px;"><option value="">Pilih Asal Propinsi</option></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-3">Asal Kota</label>
                                        <div class="col-md-6">
                                               <select id="oricity" class="select2"  style="width: 276px;"><option>Kota</option></select>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-3">Tujuan Propinsi</label>
                                        <div class="col-md-6">
                                             <select id="desprovince" class="select2" style="width: 276px;"><option>Pilih Tujuan Provinsi</option></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-3">Tujuan Kota</label>
                                        <div class="col-md-6">
                                            <select id="descity" class="select2" style="width: 276px;"><option>Kota</option></select></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row jumbotron">
                                     <div class="form-group">
                                        <label class="col-md-2" align='right'>Layanan</label>
                                        <div class="col-md-3">
                                            <select id="service" class="six columns">
                                                <option value="jne">JNE</option>
                                                <option value="pos">POS</option>
                                                <option value="tiki">TIKI</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2" align='left'>Berita / gram</label>
                                        <div class="col-md-2">
                                        <p align="left">
                                            <input type="number" style="width: 100px;" id="berat" ></p>
                                        </div>

                                        <div class="form-group">
                                           <div class="col-md-3">
                                                <button id="btncheck" class="btn btn-primary get" onclick="CekHarga()">
                                                <span class="fa fa-truck fa-2x"></span> CEK HARGA</button>
                                           </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                            </form>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                        <table class="table table-responsive">
                                        <thead>
                                        <th>Aksi</th>
                                        <th>Service</th>
                                        <th>Nama Paket</th>
                                        <th>Lama Kirim</th>
                                        <th>Total Biaya</th>
                                    </thead>    
                                    <tbody id="resultsbox">
                                        
                                    </tbody>
                                    </table>
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
    </div>