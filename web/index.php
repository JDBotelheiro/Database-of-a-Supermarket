
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
?>

<h1><font color="#669999">SUPERMERCADO </font><h1>
<h2><font color="#669999">Inserir Supermercado: </font><h2>
<form action="inserir_supermercado.php" method="post" style="margin-left: 15px">
		<th><input type="number" name="nif" placeholder="NIF"></th><br>
		<th><input type="text" name="nome" placeholder="NOME"></th><br>
		<th><input type="text" name="morada" placeholder="MORADA"></th><br>
		<input type="submit" value="Inserir">
</form>

<h4><font color="#669999">Lista de Supermercados: </font><h4>

<?php
$sql = "SELECT nif, nome, morada FROM supermercado;";
$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
echo("<table border=\"0\" cellspacing=\"5\">\n");
    while($row = pg_fetch_assoc($result))
    {
        echo("<tr>\n");
        echo("<td><strong>NIF:</strong></td><td>{$row['nif']}</td>\n");
        echo("<td><strong>Nome:</strong></td><td>{$row['nome']}</td>\n");
        echo("<td><strong>Morada:</strong></td><td>{$row['morada']}</td>\n");
        echo("</tr>\n");
    }
    echo("</table>\n");
?>


<h2><font color="#669999">Inserir Corredor: </font><h2>
<form action="inserir_corredor.php" method="post" style="margin-left: 15px;">
		<th><input type="number" name="nif" placeholder="NIF"></th><br>
		<th><input type="number" name="num" placeholder="CORREDOR"></th><br>
		<th><input type="number" name="largura" placeholder="LARGURA"></th><br>
		<input type="submit" value="Inserir">
</form>

<h4><font color="#669999">Lista de Corredores: </font><h4>
<?php
$sql = "SELECT nif, num, largura FROM corredor;";
    $result = pg_query($sql) or die('ERROR: ' . pg_last_error());
echo("<table border=\"0\" cellspacing=\"5\">\n");
    while($row = pg_fetch_assoc($result))
    {
        echo("<tr>\n");
        echo("<td><strong>NIF:</strong></td><td>{$row['nif']}</td>\n");
        echo("<td><strong>N_Corredor:</strong></td><td>{$row['num']}</td>\n");
        echo("<td><strong>Largura:</strong></td><td>{$row['largura']}</td>\n");
        echo("</tr>\n");
    }
    echo("</table>\n");
?>


<h2><font color="#669999">Inserir Prateleira: </font><h2>
<form action="inserir_prateleira.php" method="post" style="margin-left: 15px">
		<th><input type="number" name="nif" placeholder="NIF"></th><br>
		<th><input type="number" name="num" placeholder="NUMERO"></th><br>
		<th><input type="text" name="lado" placeholder="LADO"></th><br>
		<th><input type="number" name="altura" placeholder="ALTURA"></th><br>
		<input type="submit" value="Inserir">
</form>

<h4><font color="#669999">Lista de Prateleiras: </font><h4>
<?php
$sql = "SELECT nif, num, lado, altura FROM prateleira;";
$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
echo("<table border=\"0\" cellspacing=\"5\">\n");
    while($row = pg_fetch_assoc($result))
    {
        echo("<tr>\n");
        echo("<td><strong>NIF:</strong></td><td>{$row['nif']}</td>\n");
        echo("<td><strong>Num:</strong></td><td>{$row['num']}</td>\n");
        echo("<td><strong>Lado:</strong></td><td>{$row['lado']}</td>\n");
        echo("<td><strong>Altura:</strong></td><td>{$row['altura']}</td>\n");
        echo("</tr>\n");
    }
    echo("</table>\n");
?>


<h2><font color="#669999"> Inserir Produto:</h2>
	<form action="inserir_prod.php" method="post" style="margin-left: 15px">
		<th><input type="number" name="cod" placeholder="COD"><br></th>
		<th><input type="text" name="nome_marca" placeholder="NOME_MARCA"><br></th>
		<th><input type="text" name="designacao" placeholder="DESIGNACAO"><br></th>
		<input type="submit" value="Inserir">
	</form>

<h4><font color="#669999">Produtos: </font><h4>
<?php
$sql = "SELECT cod, nome_marca, designacao FROM produto;";
$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
echo("<table border=\"0\" cellspacing=\"5\">\n");
    while($row = pg_fetch_assoc($result))
    {
        echo("<tr>\n");
        echo("<td><strong>NIF:</strong></td><td>{$row['cod']}</td>\n");
        echo("<td><strong>Num:</strong></td><td>{$row['nome_marca']}</td>\n");
        echo("<td><strong>Lado:</strong></td><td>{$row['designacao']}</td>\n");
        echo("</tr>\n");
    }
    echo("</table>\n");
?>


<h2> <font color="#669999">Produtos: </font>Inserir Produto </h2>
	<form action="inserir_prod_prat.php" method="post" style="margin-left: 15px;">
		<input type="number" name="cod" placeholder="COD"><br>
		<input type="number" name="nif" placeholder="Nif"><br>
		<input type="number" name="num" placeholder="Número de Corredor"><br>
		<input type="text" name="lado" placeholder="Lado"><br>
		<input type="text" name="altura" placeholder="Altura"><br>
		<input type="number" name="slot" placeholder="Slot"><br>
		<input type="number" name="frentes" placeholder="Frentes"><br>
		<input type="number" name="max" placeholder="Max"><br>
		<input type="submit" value="inserir">
	</form>

<h4> <font color="#669999">Lista de Produtos: </font>Inserir Produto </h4>
<?php
$sql = "SELECT cod, nif, num, altura, slot, frentes, max FROM localizado;";
$result = pg_query($sql) or die('ERROR: ' . pg_last_error());
echo("<table border=\"0\" cellspacing=\"5\">\n");
    while($row = pg_fetch_assoc($result))
    {
        echo("<tr>\n");
        echo("<td><strong>Cod:</strong></td><td>{$row['cod']}</td>\n");
        echo("<td><strong>Nif:</strong></td><td>{$row['nif']}</td>\n");
        echo("<td><strong>Num:</strong></td><td>{$row['num']}</td>\n");
        echo("<td><strong>Lado:</strong></td><td>{$row['lado']}</td>\n");
        echo("<td><strong>Altura:</strong></td><td>{$row['altura']}</td>\n");
        echo("<td><strong>Slot:</strong></td><td>{$row['slot']}</td>\n");
        echo("<td><strong>Frentes:</strong></td><td>{$row['frentes']}</td>\n");
        echo("<td><strong>Max:</strong></td><td>{$row['max']}</td>\n");
        echo("</tr>\n");
    }
    echo("</table>\n");
?>



<h2><font color="#669999"> Listar Produtos por Supermercado: </h2>


<?php
$query = "select * from supermercado;";

$result = pg_query($query) or die('ERROR: ' . pg_last_error());
echo("<table border=\"0\" cellspacing=\"5\">\n"); 
    while($row = pg_fetch_assoc($result))
    {
        echo("<tr>\n");
        echo("<td><strong>Nif:</strong></td><td>{$row['nif']}</td>\n");
        echo("<td><strong>Nome_supermercado:</strong></td><td>{$row['nome']}</td>\n");
        echo("<td><a href=\"listar_produtos.php?nif={$row['nif']}\">Ver Produtos deste supermercado!</a></td>\n");
        echo("</tr>\n");
    }
    echo("</table>\n");


?>


<html>
<body>
<h2> Apagar Supermercado:  <h2>
	<form action="apagar_super.php" method="post" style="margin-left: 15px;">
		<input type="number" name="nif" placeholder="NIF DO SUPERMERCADO"><br>
		<input type="submit" value="Inserir">
	</form>

</body>
</html>


