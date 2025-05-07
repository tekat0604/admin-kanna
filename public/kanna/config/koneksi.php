<?php
error_reporting(E_ALL ^ E_DEPRECATED);

$db_host = "localhost";
$db_name = "tservice"; // database name
$db_user = "root"; // datebase user
$db_pass = "";  // database password

$koneksi = "mysql:host=$db_host;dbname=$db_name";

try 
{
    $db = new PDO($koneksi, $db_user, $db_pass);   
}
catch (exception $e) 
{
    echo "error";
    exit();
}
?>
