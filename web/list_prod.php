<!DOCTYPE html>
<html>
<head>
	<title>Listar produtos</title>
</head>
<body>

<h2><font color="#669999">Produtos Selecionados: </font><h2>

<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	$user="ist426091";
	$host="db.ist.utl.pt";
	$port=5432;
	$password="1998";
	$dbname= $user;
	$connection = pg_connect("host=$host port=$port user=$user password=$password dbname=$dbname") or die(pg_last_error());
	
	$nif=$_REQUEST['nif'];

	

	$sql="SELECT nome_marca, designacao, cod FROM supermercado NATURAL JOIN localizado NATURAL JOIN produto WHERE nif = '$nif'";
	$result=pg_query($sql) or die('ERROR: ' . pg_last_error());

	echo("<table border=\"0\" cellspacing=\"6\">\n");

	while($row = pg_fetch_assoc($result))
    	{
        	echo("<tr>\n");
        	echo("<td><strong>Cod:</strong></td><td>{$row['cod']}</td>\n");
        	echo("<td><strong>Designacao:</strong></td><td>{$row['designacao']}</td>\n");
        	echo("<td><strong>Nome_marca:</strong></td><td>{$row['nome_marca']}</td>\n");
        	echo("</tr>\n");
    
    	echo("</table>\n");
  		}
    	

    
pg_close($connection);
?>

</body>
</html>