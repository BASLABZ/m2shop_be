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
          mysql_query("INSERT INTO orders(status_order,tgl_order,jam_order,id_kustomer) VALUES('Pending','".$tgl_skrg."','".$jam_skrg."','".$id_kustomer."')");  
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

          echo "<script> alert('Transaksi Berhasil DI Simpan'); location.href='index.php?p=preview_cart&id=".$id_orders."'</script>";exit;

            
 ?>
 
 