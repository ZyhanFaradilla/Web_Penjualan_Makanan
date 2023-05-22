<?php
error_reporting(0);
$nama_dokumen='Laporan'; //Beri nama file PDF hasil.
include('mpdf60/..');//lokasi folder mpdf
require_once("mpdf60/mpdf.php");
$mpdf=new PDF('utf-8', 'A4-P'); // PDF mau L lanscape P potrait


ob_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style3 {
	color: #FFFFFF;
	font-weight: bold;
}
.style4 {font-size: 18px}
.style12 {	font-weight: bold;
	color: #006600;
	font-size: 24px;
	font-family: Broadway;
}
.style13 {color: #006600}
-->
</style>
</head>

<body>
<form name="form1" method="post" action="">
  <div align="center">
    <p align="center" class="style4"><img src="L.png" width="80" height="80">
    <p align="center" class="style12"> LAPORAN TRANSAKSI DISHSERVE </p>
    </p>
    <table width="856" border="1" cellpadding="0" cellspacing="0">
      <tr bgcolor="#006600">
        <td width="41"><div align="center" class="style3">No.</div></td>
        <td width="106"><div align="center" class="style3">Nama</div></td>
        <td width="58"><div align="center" class="style3">No.Rekening</div></td>
        <td width="183"><div align="center" class="style3">Nama Rekening</div></td>
        <td width="183"><div align="center" class="style3">Nama Bank</div></td>
        <td width="83"><div align="center" class="style3"> Email</div></td>
        <td width="114"><div align="center" class="style3">Hp </div></td>
        <td width="105"><div align="center" class="style3">Alamat </div></td>
        <td width="114"><div align="center" class="style3">Kota</div></td>
        <td width="183"><div align="center" class="style3">Kode Pos</div></td>
        <td width="183"><div align="center" class="style3">Quantity</div></td>
        <td width="183"><div align="center" class="style3">Total Bayar</div></td>
      </tr>

<?php
include 'oneksi.php';
$id_transaksi = @$_POST['id_transaksi'];
$sql = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_transaksi");
$no=1;
while ($data=mysqli_fetch_array($sql))
{
?>
      <tr bgcolor="#996600">
        <td><?php echo $no; ?></td>
        <td><?php echo $data['nama']; ?> </td>
        <td><?php echo $data['no_rek']; ?></td>
        <td><?php echo $data['nama_rek']; ?></td>
        <td><?php echo $data['bank']; ?></td>
        <td><?php echo $data['email']; ?></td>
        <td><?php echo $data['hp']; ?></td>
        <td><?php echo $data['alamat']; ?></td>
         <td><?php echo $data['kota']; ?></td>
          <td><?php echo $data['pos']; ?></td>
          <td><?php echo $data['quantity']; ?></td>
          <td><?php echo $data['total_bayar']; ?></td>
      </tr>
      <?php
	$no++;
	};
	?>
    </table>
    <p>&nbsp;</p>
  </div>
</form>
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>

