<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '#';
$dbName = 'blog';

$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Veritabanı bağlantısı hatası: " . mysqli_connect_error());
}
?>
