<table align="center" width="90%" border="1">
	<tr style="height: 40px; text-align: center; color: white; background-color: dodgerblue;">
		<th style="text-align: center;"> Username</th>
		<th style="text-align: center;"> Password</th>

	</tr>
	<!-- Untuk Menampilkan data dari DB-->
	<?php 
	include 'oneksi.php';
	$sql = mysqli_query($koneksi, "SELECT * FROM akun");

	while ( $tampil = mysqli_fetch_array($sql)) {
		# code...
	

	 ?>
	<tr  style="height: 25px;">
		<td> <?php echo  $tampil ['username'] ; ?> </td>
		<td> <?php echo $tampil ['password'] ; ?> </td>
	</tr>
	<?php 
};
	 ?>
	
</table>