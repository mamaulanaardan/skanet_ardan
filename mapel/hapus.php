<?php
include "koneksi.php";
$id_mapel=$_GET['id_mapel'];
$query=mysqli_query($koneksi,"delete from mapel where id_mapel='$id_mapel'");
header('location:index.php');
?>