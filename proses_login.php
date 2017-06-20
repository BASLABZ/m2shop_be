<?php 	
		
	 
	
	  $username = $_POST['username'];
	  $password = md5($_POST['password']);

	  $no = 0;
	  $sql = "SELECT * from kustomer where username = '".$username."' and password = '".$password."' and username !='admin'  AND aktif='Y' ";
	  $result = mysql_query($sql);
	  while ($log=mysql_fetch_array($result))
	    {
	      $id_user = $log['id_kustomer'];
	      $username = $log['username'];
	      $password = $log['password'];
	      $nama_lengkap = $log['nama_lengkap'];
	      $email = $log['email'];
	      $notelp = $log['telpon'];
	      $alamat = $log['alamat'];
	      $propinsi  = $log['propinsi'];
	      $kabupaten  = $log['kabupaten'];

	      $no++;
	    }
	    if ($no>0) 
	    {
	        $_SESSION['id_kustomer'] = $id_user;
	        $_SESSION['username'] = $username;
	        $_SESSION['password'] = $password;
	        $_SESSION['nama_lengkap'] = $nama_lengkap;
	        $_SESSION['email'] = $email;
	        $_SESSION['alamat'] = $alamat;
	        $_SESSION['telpon'] = $notelp;
	        $_SESSION['propinsi'] = $propinsi;
	        $_SESSION['kabupaten'] = $kabupaten;
	        echo "<script> alert('Login Sukses'); location.href='index.php'</script>";exit;
	    }else
	    {
	        echo "<script> alert('Login gagal'); location.href='index.php'</script>";exit;
	    }
 ?>