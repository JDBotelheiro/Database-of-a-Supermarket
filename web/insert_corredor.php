<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$user="####";
$host="####";
$port=####;
$password="####";
$dbname = $user;
$connection = pg_connect("host=$host port=$port user=$user password=$password dbname=$dbname") or die(pg_last_error());
    

$query = "insert into corredor (nif, num, largura) values (".$_POST['nif'].", '".$_POST['num']."', '".$_POST['largura']."');";

pg_query($query) or die("erro na query");
header("location: index.php");

exit();

?>