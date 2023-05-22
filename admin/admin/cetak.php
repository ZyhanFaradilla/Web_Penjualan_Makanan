<?php
include 'oneksi.php';
$kdid = @$_GET['kdid'];
$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user");
$data = mysqli_fetch_array($sql);

?>