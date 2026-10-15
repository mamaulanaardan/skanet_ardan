<?php
include "koneksi.php";
$id_mapel=$_POST['id_mapel'];
$mapel=$_POST['mapel'];
$query=mysqli_query($koneksi,"update mapel set mapel='$mapel' where id_mapel='$id_mapel'");
header('location:index.php');
?>