<?php
// load query database
 mysql_connect("localhost","root","") or die('sql error');
    mysql_select_db("db_muamuashop") or die('db not found');

$email = $_GET['email'];
$idorders = $_GET['idorders'];
$querymember  = mysql_query("SELECT * from  kustomer where email='".$email."'");
$row  = mysql_fetch_array($querymember);
$emails  = $row['email'];

function format_rupiah($angka){
  $rupiah=number_format($angka,0,',','.');
  return $rupiah;
}

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Verifikasi Pembayaran M2SHOP</title>
</head>
<body>
	<center>Data Pembeli & Pengiriman Barang</center>
	<table>
		<tr>
			<td>Nama : </td>
			<td><?php echo $row['nama_lengkap']; ?></td>
		</tr>
		<tr>
			<td>Alamat : </td>
			<td><?php echo $row['alamat']; ?></td>
		</tr>
		<tr>
			<td>Propinsi : </td>
			<td><?php echo $row['propinsi']; ?></td>
		</tr>
		<tr>
			<td>Kabupaten : </td>
			<td><?php echo $row['kabupaten']; ?></td>
		</tr>
		
		
	</table>
	<hr>
	<center><h1>Data Transaksi</h1>

	<table border="1">
		<thead>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Subtotal</th>
		</thead>
		<tbody>
			<?php 
				 $no =0;
                $jumlahitem = 0;
                $total = 0;
                $vat  = 0;
                $total_rp = 0;
            $query_detail_transaksi = mysql_query("SELECT * FROM orders o JOIN orders_detail od ON o.id_orders = od.id_orders 
                JOIN produk p ON 
                od.id_produk = p.id_produk
                WHERE o.id_orders = '".$idorders."'");
            while ($row_transaksi = mysql_fetch_array($query_detail_transaksi)) {
                 $subtotal = $row_transaksi['harga']*$row_transaksi['jumlah'];
                $item = $row_transaksi['jumlah'];
                $jumlahitem=$jumlahitem+$item;
                $subtotal    = ($row_transaksi['harga']) * $row_transaksi['jumlah'];
                $total       = $total + $subtotal;  
                $vat_rp      = format_rupiah($vat);
                $ttl_rp      = $total+$vat;
                $subtotal_rp = format_rupiah($subtotal);
                $total_rp    = format_rupiah($ttl_rp);
			 ?>
			<tr>
                <td><?php echo ++$no; ?></td>
                <td><?php echo $row_transaksi['nama_produk']; ?></td>
                <td> <?php echo $row_transaksi['jumlah']; ?></td>
                <td><?php echo format_rupiah($row_transaksi['harga']); ?></td>
                <td><?php echo format_rupiah($subtotal  = $row_transaksi['harga'] * $row_transaksi['jumlah']); ?></td>
                
            </tr>
			<?php } ?>
		</tbody>
		 <tfoot>
            <tr>
                <td colspan="4">Jumlah / Item</td>
                <td><?php echo $jumlahitem; ?> / Item</td>
            </tr>
            <tr>

                <td colspan="4">Total Pembayaran</td>
                <td>Rp. <?php echo $total_rp; ?> </td>
            </tr>
        </tfoot>
	</table>
	</center>
</body>
</html>