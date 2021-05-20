<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dwisusanto_311810957";

$koneksi = mysqli_connect($servername, $username, $password, $dbname);
if (!$koneksi){
        die("Connection Failed:".mysqli_connect_error());
    }
?>