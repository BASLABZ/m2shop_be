  	<?php 
            if (isset($_POST['registrasi'])) {
                $email  = $_POST['email'];
                $cek_email = mysql_query("SELECT count(*) as cek_email FROM kustomer where email = 
                    '".$email."'");
                $ketersediaan_email = mysql_fetch_array($cek_email);

                if ($ketersediaan_email['cek_email'] == 0 ) {
                   $queryResgitrasi = mysql_query("INSERT INTO kustomer (username,password,nama_lengkap,alamat,email,telpon,propinsi,kabupaten,aktif) 
                     VALUES ('".$_POST['username']."',md5('".$_POST['password']."'),'".$_POST['nama_lengkap']."','".$_POST['alamat']."','".$_POST['email']."','".$_POST['telpon']."','".$_POST['propinsi']."','".$_POST['kabupaten']."','N')");
                    if ($queryResgitrasi) {
                     echo "<script>
                    location.href='SENDEMAIL/sendEmailDebug.php?email=".$email."'</script>";exit;       
                }}else{
                      echo "<script> alert('Email Sudah Digunakan'); 
                    location.href='index.php?p=registrasi' </script>";exit;
                }
            }
     ?>
    <div class="main" role="main">
    	<div id="content" class="content full">
        	<div class="container">
            	<div class="row">
                	<div class="col-md-6">
                        <h2>Registrasi Member M2SHOP</h2>
                        <p>Terinspirasi oleh trend fashion yang semakin berkembang pesat, maka kami siap memberikan solusi untuk gaya fashion anda dengan berbagai produk yang up to date dan pasti dengan harga terjangkau</p>
                        <div class="spacer-20"></div>
                        <div class="icon-box ibox-rounded ibox-light ibox-effect">
                            <div class="ibox-icon">
                                <i class="fa fa-user-plus"></i>
                            </div>
                            <h3>Registrasi Menjadi Member M2SHOP</h3>
                            <p>Daftarkan diri anda untuk dapat melakukan pembelian produk - produk dari M2SHOP</p>
                        </div>
                        <div class="spacer-20"></div>
                        <div class="icon-box ibox-rounded ibox-light ibox-effect">
                            <div class="ibox-icon">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                            <h3>Keranjang Belanja</h3>
                            <p>Pembelian akan diarahkan ke keranjang belanja dan anda dapat melakukan proses pembelian dengan mudah</p>
                        </div>
                        <div class="spacer-20"></div>
                        <div class="icon-box ibox-rounded ibox-light ibox-effect">
                            <div class="ibox-icon">
                                <i class="fa fa-list-alt"></i>
                            </div>
                            <h3>Daftar Produk</h3>
                            <p>Produk Yang lengkap yang kami sediakan pada M2SHOP</p>
                        </div>
                        <div class="spacer-20"></div>
                        <div class="icon-box ibox-rounded ibox-light ibox-effect">
                            <div class="ibox-icon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <h3>Informasi Yang Up to Date</h3>
                            <p>Infomasi yang up to date dari produk M2SHOP</p>
                        </div>
                        <div class="spacer-20"></div>
                    </div>
                    <div class="col-md-6">
                    	<section class="signup-form sm-margint">
                                <div class="regular-signup">
                        			<h3>Buat Akun Pelanggan Baru</h3>
                                    <form class="role" method="POST">
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" name="nama_lengkap" class="form-control" required=""> 
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="username" class="form-control" required=""> 
                                        </div><div class="form-group">
                                            <label>password</label>
                                            <input type="password" name="password" class="form-control" required=""> 
                                        </div><div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" required=""> 
                                        <div class="form-group">
                                                <label>Asal Propinsi</label>
                                                <br>
                                                <select id="oriprovince" name="propinsi" class="select2" style="width: 470px;">
                                                    <option>Propinsi</option>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Asal Kota</label>
                                            <br>
                                                <select id="oricity" name="kabupaten" class="select2" style="width: 470px;">
                                                <option>Kota</option></select>
                                        </div>
                                          </div><div class="form-group">
                                            <label>Telepon</label>
                                            <input type="number" name="telpon" class="form-control" required=""> 
                                        </div>
                                        <div class="form-group">
                                            <label>alamat</label>
                                            <textarea class="form-control" required="" name="alamat"></textarea>
                                            <small><i>* Isi alamat lengkap anda beserta kode pos anda</i></small>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="registrasi" class="btn btn-success btn-block">
                                                <span class="fa fa-save"></span> Simpan
                                            </button>
                                        </div>
                                    </form>
                                          </div>
                                    
                                </div>
                        </section>
                    </div>
                    <br>
                    <div class="col-md-12">
                         <header>
                            <center><h3><span class="fa fa-comments"></span> Testimoni  / Buku Tamu</h3></center>
                        </header>
                        <div class="spacer-40"></div>
                        <!-- Testimonials -->
                        <div class="carousel-wrapper">
                            <div class="row">
                                <ul class="owl-carousel carousel-fw" id="testimonials-slider" data-columns="2" data-pagination="yes" data-arrows="no" data-single-item="no" data-items-desktop="2" data-items-desktop-small="2" data-items-tablet="2" data-items-mobile="1">
                                    <?php 
                                    $query_bukutamu = mysql_query("SELECT * FROM bukutamu order by buku_id DESC");
                                    while ($rowbuku = mysql_fetch_array($query_bukutamu)) { 
                                     ?>
                                    <li class="item">
                                        <div class="testimonial-block">
                                            <blockquote>
                                                <p style="font-size: 10;"><?php echo $rowbuku['pesan']; ?></p>
                                            </blockquote>
                                            <div class="testimonial-avatar"><img src="images/icon_bukutamu.png" alt="" width="60" height="60"></div>
                                            <div class="testimonial-info">
                                                <div class="testimonial-info-in">
                                                    <strong><?php echo $rowbuku['nama']; ?></strong><span><?php echo $rowbuku['email']; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   	</div>