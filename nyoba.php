<?php
//buat koneksi dengan MySQL
$link=mysql_connect('localhost','root','');
  
//gunakan database universitas
$result=mysql_query('USE universitas');
                
//tampilkan tabel mahasiswa_ilkom
$result=mysql_query('SELECT * FROM mahasiswa_ilkom');
while ($row=mysql_fetch_array($result, MYSQL_NUM))
 {
   echo "$row[0] $row[1] $row[2] $row[3] $row[4]";
   echo "<br />";
 }
?>