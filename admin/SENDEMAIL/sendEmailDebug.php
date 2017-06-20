
<?php
include 'config/config.php';
$emails = $_GET['email'];
$idorders = $_GET['idorders'];
date_default_timezone_set('Etc/UTC');
require 'PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
// $mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "ahmad.bastian8@gmail.com";
$mail->Password = "4m4nd4b4s";
$mail->setFrom('ahmad.bastian8@gmail.com', 'Konfirmasi Transaksi Pembelian Barang M2HOP');
$namaPenerimaEmail  = "$emails";
$mail->addAddress($emails, 'M2SHOP');
function get_include_contents($filename) {

    if (is_file($filename)) {
        ob_start();
        include $filename;
        return ob_get_clean();
    }
    return false;
}
$mail->IsHTML(true);    // set email format to HTML
$mail->Subject = "Konfirmasi Transaksi Pembelian Barang M2HOP";
$mail->Body = get_include_contents('content\invoice.php'); // HTML -> PHP!
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    
     echo "<script>alert('Transaksaksi Pembelian Telah Dikonfirmasi');location.href='../index.php?pos=data_transaksi_pembelian'</script>";exit;

}
