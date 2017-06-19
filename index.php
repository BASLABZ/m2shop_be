<?php 
    session_start();
    include('admin_old/koneksi.php');
    if (isset($_GET['logout'])) 
    {session_destroy();   header('Location: index.php');}
    
 ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>M2SHOP - HOME</title>
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no">
<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="assets/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
<link href="assets/css/style.css" rel="stylesheet" type="text/css">
<link href="assets/vendor/prettyphoto/css/prettyPhoto.css" rel="stylesheet" type="text/css">
<link href="assets/vendor/owl-carousel/css/owl.carousel.css" rel="stylesheet" type="text/css">
<link href="assets/vendor/owl-carousel/css/owl.theme.css" rel="stylesheet" type="text/css">
<link href="assets/css/custom.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="assets/css/extralayers.css" media="screen" />  
    <link rel="stylesheet" type="text/css" href="assets/css/settings.css" media="screen" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800' rel='stylesheet' type='text/css'>
<link class="alt" href="assets/colors/color1.css" rel="stylesheet" type="text/css">
<link href="assets/style-switcher/css/style-switcher.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
<script src="assets/js/modernizr.js"></script>
<style type="text/css">
    
             .dim_about {box-shadow:inset 0 0 0 rgba(143, 215, 216, 0.07), 0 10px 0 0 rgb(255, 255, 255), 0 8px 10px rgba(123, 83, 83, 0.58);}

             .dim_about_item {box-shadow: inset 0 0 0 rgba(30, 172, 174, 0.39), 0 10px 0 0 rgba(30, 172, 174, 0), 0 8px 10px rgba(123, 83, 83, 0.58);}

    
    
</style>
</head>
<body class="home">
<div class="body">
    <?php include 'menuatas.php'; ?>
    <?php 
        if (isset($_GET['p'])) 
        {
            if ($_GET['p'] == 'checkout') 
            {
                if (isset($_SESSION['id_kustomer']) &&
                    isset($_SESSION['username'])) 
                {
                    include ($_GET['p'].'.php');
                }
                else
                {
                    include ('kontentengah.php');
                }
            }
            else
            {
                include ($_GET['p'].'.php');
            }
        }
        
        else
        {
            include ('kontentengah.php');
        }
     ?>
    
    <?php include 'footer.php'; ?>
    <a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>  
</div>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4>Login Member M2SHOP</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="Username">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"><span class="fa fa-sign-in"></span> Login</button>
                </form>
            </div>
            
        </div>
    </div>
</div>
<script src="assets/js/jquery-2.0.0.min.js"></script> <!-- Jquery Library Call -->
<script src="assets/vendor/prettyphoto/js/prettyphoto.js"></script> <!-- PrettyPhoto Plugin -->
<script src="assets/js/ui-plugins.js"></script> <!-- UI Plugins -->
<script src="assets/js/helper-plugins.js"></script> <!-- Helper Plugins -->
<script src="assets/vendor/owl-carousel/js/owl.carousel.min.js"></script> <!-- Owl Carousel -->
<script src="assets/vendor/password-checker.js"></script> <!-- Password Checker -->
<script src="assets/js/bootstrap.js"></script> <!-- UI -->
<script src="assets/js/init.js"></script> <!-- All Scripts -->
<script src="assets/vendor/flexslider/js/jquery.flexslider.js"></script> <!-- FlexSlider -->
<script src="assets/http://maps.googleapis.com/maps/api/js?sensor=false"></script>
  
<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script type="text/javascript" src="assets/js/jquery.themepunch.tools.min.js"></script>   
<script type="text/javascript" src="assets/js/jquery.themepunch.revolution.min.js"></script>
<script src="assets/script.js"></script>

<script type="text/javascript">

    jQuery(document).ready(function() {
        jQuery('.tp-banner').show().revolution(
        {
            dottedOverlay:"none",
            delay:9000,
            startwidth:1170,
            startheight:550,
            hideThumbs:200,
            
            thumbWidth:100,
            thumbHeight:50,
            thumbAmount:5,
            
            navigationType:"none",
            navigationArrows:"solo",
            navigationStyle:"preview2",
            
            touchenabled:"on",
            onHoverStop:"on",
            
            swipe_velocity: 0.7,
            swipe_min_touches: 1,
            swipe_max_touches: 1,
            drag_block_vertical: false,
                                    
                                    
            keyboardNavigation:"on",
            
            navigationHAlign:"center",
            navigationVAlign:"bottom",
            navigationHOffset:0,
            navigationVOffset:20,

            soloArrowLeftHalign:"left",
            soloArrowLeftValign:"center",
            soloArrowLeftHOffset:20,
            soloArrowLeftVOffset:0,

            soloArrowRightHalign:"right",
            soloArrowRightValign:"center",
            soloArrowRightHOffset:20,
            soloArrowRightVOffset:0,
                    
            shadow:0,
            fullWidth:"on",
            fullScreen:"off",

            spinner:"spinner0",
            
            stopLoop:"off",
            stopAfterLoops:-1,
            stopAtSlide:-1,

            shuffle:"off",
            
            autoHeight:"off",                       
            forceFullWidth:"off",                       
                                    
                                    
                                    
            hideThumbsOnMobile:"off",
            hideNavDelayOnMobile:1500,                      
            hideBulletsOnMobile:"off",
            hideArrowsOnMobile:"off",
            hideThumbsUnderResolution:0,
            
            hideSliderAtLimit:0,
            hideCaptionAtLimit:0,
            hideAllCaptionAtLilmit:0,
            startWithSlide:0
        });             
    }); //ready
</script>
<script src="assets/style-switcher/js/jquery_cookie.js"></script>
<script src="assets/style-switcher/js/script.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
    $(".select2").select2();
</script>