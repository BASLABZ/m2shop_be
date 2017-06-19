 <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle img-responsive" src="img/logo.jpg"  style="width: 50%;" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['nama']; ?></strong>
                             </span> <span class="text-muted text-xs block"> <b class="caret"></b></span> </span> Super Admin </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="index.php?pos=user_profil">Profil</a></li>
                                <li><a href="contacts.html">Contacts</a></li>
                                <li><a href="mailbox.html">Mailbox</a></li>
                                <li class="divider"></li>
                                <li><a href="login.html">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            <span class="fa fa-shopping-cart"></span>
                        </div>
                    </li>
                    <li class="active">
                        <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span></a>
                    </li>
                    <li>
                        <a href="index.php?pos=data_admin"><i class="fa fa-users"></i> <span class="nav-label">Data Admin</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-home"></i> <span class="nav-label">Profil Toko</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="index.php?pos=data_profil">Data Profil</a></li>
                            <li><a href="index.php?pos=data_kategori_berita">Data Kategori Berita</a></li>
                            <li><a href="index.php?pos=data_berita">Data Berita</a></li>
                            <li><a href="index.php?pos=data_cara_order">Cara Pesan</a></li>
                        </ul>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-tags"></i> <span class="nav-label">Data Produk</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="index.php?pos=data_kategori_produk">Kategori Produk</a></li>
                            <li><a href="index.php?pos=data_produk">Data Produk</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.php?pos=data_kustomer"><i class="fa fa-users"></i> <span class="nav-label">Data Kustomer </span></a>
                    </li>
                    <li>
                        <a href="index.php?pos=data_testimoni"><i class="fa fa-envelope"></i> <span class="nav-label">Testimoni </span></a>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-file"></i> <span class="nav-label"> Laporan</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="index.php?pos=preview_laporan_member">Laporan Data Member</a></li>
                            <li><a href="index.php?pos=preview_laporan_produk">Laporan Data Produk</a></li>
                            <li><a href="index.php?pos=preview_laporan_produk_menipis">Laporan Produk Menipis</a></li>
                            <li><a href="index.php?pos=preview_cartting_produk">Cart Produk </a></li>
                            <li><a href="index.php?pos=data_cara_order">Laporan Transaksi</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
        </nav>