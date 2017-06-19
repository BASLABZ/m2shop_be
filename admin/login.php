<?php 
if (isset($_POST['login'])) 
{
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $no = 0;
  $sql = "SELECT * from user where username = '$username' and password = '$password' and type = 'super'";
  $result = mysql_query($sql);
  while ($log=mysql_fetch_array($result))
    {
      $id_user = $log['iduser'];
      $username = $log['username'];
      $password = $log['password'];
      $nama = $log['nama'];
      $no++;
    }
    if ($no>0) 
    {
        $_SESSION['iduser'] = $id_user;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['nama'] = $nama;

        echo "<script> alert('Login Sukses'); location.href='index.php'</script>";exit;
    }
    else
    {
        echo "<script> alert('Login gagal'); location.href='index.php'</script>";exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M2SHOP Admin | Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div style="padding-top: 100px;">
                <center><img src="img/logo.jpg" class="img-responsive img-circle" style="width: 50%;"></center>
                <h3>M2SHOP Login Administrator</h3>
            </div>
            <form class="m-t" role="form" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" required="" name="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="" name="password">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b" name="login">Login</button>
            </form>
            <p class="m-t"> <small>M2SHOP Online shop &copy; <?php echo date('Y'); ?></small> </p>
        </div>
    </div>
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
