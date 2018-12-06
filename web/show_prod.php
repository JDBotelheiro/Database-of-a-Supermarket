<html>
    <body>
    <h3>Produtos</h3>


<?php

 		echo("Nif escolhido: $_REQUEST['nif']");

 		$query = "select cod, nome_marca from produto natural join localizado where nif = $_REQUEST['nif'] and cod.supermercado = cod.localizado;";

		$result = pg_query($query) or die('ERROR: ' . pg_last_error());

		echo("<table border=\"0\" cellspacing=\"5\">\n"); 
    	while($row = pg_fetch_assoc($result))
    	{
        echo("<tr>\n");
        echo("<td><strong>Cod:</strong></td><td>{$row['nif']}</td>\n");
        echo("<td><strong>Nome_marca:</strong></td><td>{$row['nome_marca']}</td>\n");
        echo("<td><a href=\"mostrar_prod.php?nif={$row['nif']}\">Ver Produtos deste supermercado!</a></td>\n");
        echo("</tr>\n");
    	}
    	echo("</table>\n");
 		


 ?>
     </body>
</html>