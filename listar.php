<?php
include_once("conexao.php"); // conexão com o banco, pois listarei de lá (inclusão do arquivo)
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta name="charset" content="utf-8"/>
<title>CRUD - Listar</title>			
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
 	<h1>Listar Filmes</h1><br> 	
 	
       <table border = '2'>
       
       <tr>
       	  <th>ID</th>
       	  <th>Título</th>
       	  <th>Ano</th>
       	  <th>Gênero</th>
       	  <th>Diretor</th>
       	  </tr>	
       	  
       	  <?php 
		       if (isset($_SESSION ['msg'])){ 
		           echo $_SESSION ['msg'];
		           unset ($_SESSION ['msg']); 
		      }
		      
		      $result_filmes = "SELECT * FROM filmes"; // query para pesquisar no banco de dados (seleciono todas as colunas da tabela)
		      $resultado_filmes = mysqli_query ($conn, $result_filmes); // executar a query
		      
		      if(mysqli_num_rows ($resultado_filmes) > 0) {
		      
		      // percorrer array do banco
		      while ($row_filme = mysqli_fetch_assoc ($resultado_filmes)) { // ler o resultado e atribuindo a uma variável linha
		          echo '<tr>';
		          echo '<td>' . $row_filme['id'] . '</td>';
		          echo '<td>' . $row_filme['titulo'] . '</td>';
		          echo '<td>' . $row_filme['ano'] . '</td>';
		          echo '<td>' . $row_filme['genero'] . '</td>';
		          echo '<td>' . $row_filme['diretor'] . '</td>';
		      }   
}else{
    echo "<p style = 'color:red'>Não há filmes cadastrados!</p>";   
}
		      ?>
		      		      
     </table>	
  </body>
</html>
    	  
<?php
// Link de Voltar
     echo "<br>";
     echo "<a href='" . $_SERVER['HTTP_REFERER'] . "'>Voltar</a>";
     ?>
    	  
    	  