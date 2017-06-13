<div class="site-header-wrapper" >
        <header class="site-header" style="background-color: #37bc9b; color:white;">
            <div class="container sp-cont">
                <div class="site-logo">
                    <h1><a href="index.php"><img src="images/logo.jpg" class="img-circle"></a></h1>
                    <span class="site-tagline" style="color:white;">M2SHOP<br>Best Online Shop</span>
                </div>
                <div class="header-right">
                    <div class="user-login-panel" >
                        <a href="#" class="user-login-btn" style="color: white;" data-toggle="modal" data-target="#loginModal"><i class="fa fa-user"></i></a>
                    </div>
                    <div class="topnav dd-menu">
                        <ul class="top-navigation sf-menu">
                            <li><a href="results-list.html" style="color: white;"><span class="fa fa-shopping-cart"></span> Keranjang</a></li>
                             <li><a href="results-list.html" style="color: white;"><span class="fa fa-check"></span> Check Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- End Site Header -->
        <div class="navbar">
            <div class="container sp-cont">
                <div class="search-function">
                   
                    <span><i class="fa fa-phone"></i> Call us <strong>+6285 743 400 656</strong></span>
                </div>
                <a href="#" class="visible-sm visible-xs" id="menu-toggle"><i class="fa fa-bars"></i></a>
                <!-- Main Navigation -->
                <nav class="main-navigation dd-menu toggle-menu" role="navigation">
                    <ul class="sf-menu">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="index.php?p=daftar_produk">Produk</a></li>
                        <li><a href="javascript:void(0)">Berita</a>
                            <ul class="dropdown">
                                <?php 
                                $result = mysql_query("SELECT * FROM kategori");
                                while ($row = mysql_fetch_array($result)) {                   
                             ?>
                            <li><a href="index.php?p=daftar_berita&kat_id=<?php echo $row['kat_id']; ?>">
                                <?php echo $row['kat_nm']; ?></a></li>
                            <?php } ?>       
                            </ul>
                        </li>
                        <li><a href="index.php?p=daftar_profil">Profil</a></li>
                        <li><a href="index.php?p=caraorder">Cara Order</a>
                            <ul class="dropdown">
                                <li><a href="index.php?p=caraorder">Cara Order</a></li>
                                <li><a href="index.php?p=daftar_kota">Ongkir</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">Userprofil</a>
                            <ul class="dropdown">
                                <li><a href="user-dashboard.html">User Dashboard</a></li>
                                <li><a href="user-dashboard-profile.html">User Profile</a></li>
                                <li><a href="user-dashboard-settings.html">User Settings</a></li>
                                <li><a href="user-dashboard-settings.html">Keluar</a></li>
                            </ul>
                        </li>
                        <li><a href="#" data-toggle="modal" data-target="#loginModal">Login</a></li>
                        <li><a href="index.php?p=registrasi">Daftar</a></li>
                        <li><a href="index.php?p=kontak">Kontak</a>
                    </ul>
                </nav> 
            </div>
        </div>
    </div>