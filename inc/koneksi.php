<?php
$host = "localhost"; 
$user = "root";
$pass = "";
$nama_db = "pulau_lemukutan"; //nama database
$koneksi = mysqli_connect($host,$user,$pass,$nama_db); //pastikan urutan nya seperti ini, dan jangan tertukar

if(!$koneksi){ //jika tidak terkoneksi maka akan tampil error
  die ("Koneksi dengan database gagal: ".mysql_connect_error());
}

?>