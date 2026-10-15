<?php 
include "koneksi.php";
$id_mapel=$_POST['id_mapel'];
$mapel=$_POST['mapel'];
$query=mysqli_query($koneksi,"insert into mapel(id_mapel,mapel) values('$id_mapel','$mapel')");
header('location:index.php');
?>