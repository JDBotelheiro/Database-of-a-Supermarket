<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$user="#####";
$host="#####";
$port=####;
$password="#####";
$dbname = $user;
$connection = pg_connect("host=$host port=$port user=$user password=$password dbname=$dbname") or die(pg_last_error());
   
$nif = $_REQUEST['nif'];
$query = "(select localizado.cod from localizado,supermercado,produto where localizado.nif = $nif and localizado.nif = supermercado.nif) except (select localizado.cod from localizado, supermercado, produto where localizado.nif != $nif and localizado.nif = supermercado.nif);";

$result=pg_query($query);


while($row = pg_fetch_assoc($result)) {
	$organizado = ("delete from organizado where cod = '$row[0]';");
	$result=pg_query($organizado) or die(pg_last_error());
	$primario = ("delete from primario where cod = '$row[0]';");
	$result=pg_query($primario) or die(pg_last_error());
	$secundario = ("delete from secundario where cod = '$row[0]';");
	$result=pg_query($secundario) or die(pg_last_error());
	$produto = ("delete from produto where cod = '$row[0]';");
	$result=pg_query($produto) or die(pg_last_error());


	$function = "delete from localizado where nif = $nif;";
	$result=pg_query($function) or die(pg_last_error());
 	$function = "delete from prateleira where nif = $nif;";
	$result=pg_query($function) or die(pg_last_error());
	$function = "delete from corredor where nif = $nif;";
	$result=pg_query($function) or die(pg_last_error());
	$function = "delete from supermercado where nif = $nif;";
	$result=pg_query($function) or die(pg_last_error());
}

echo (" Supermercado Apagado");
header("location: index.php");

exit();

?>