<?php
$connect = mysqli_connect("localhost", "root", "", "testing");
if(isset($_POST["judul"], $_POST["isi"]))
{
 $judul = mysqli_real_escape_string($connect, $_POST["judul"]);
 $isi = mysqli_real_escape_string($connect, $_POST["isi"]);
 $query = "INSERT INTO info(judul, isi) VALUES('$judul', '$isi')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>
