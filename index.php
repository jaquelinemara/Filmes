<?php 
session_start(); //iniciar a sessão
?>

<!DOCTYPE html> <!-- HTML 5 -->
<html lang="pt-br"><!-- IDIOMA DO MEU SITE -->
	<head>
	<meta name="charset" content="utf-8"/> <!-- usar caracteres especiais -->
	<title>CRUD - Cadastrar</title><!-- nome da aba -->
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
	</head>   
	<body>
		<h1>Cadastro de Filmes</h1><br> <!-- Título principal da página -->
		       <?php 
		       if (isset($_SESSION ['msg'])){ // se existir a variável global  'msg'...
		           echo $_SESSION ['msg'];
		           unset ($_SESSION ['msg']); // destroi variável global para imprimir uma vez
		      }
		       ?>
		     
		<!-- formulário -->
		<!-- Método usado para enviar os dados e para qual página -->
		<form method="POST" action="processa.php">
			<label>Título do Filme: </label><!-- Ajuda o usuário saber o que deve preencher no formulário -->		
			<input type="text" name="titulo" id="titulo" required placeholder="Digite o nome do filme" size = 30><br><br>
				
			<label>Ano de lançamento: </label>
			<input type="text" name="ano" id="ano" required placeholder="Digite o ano de lançamento o filme"size = 40><br><br>
			
			<label>Gênero: </label>
			<input type="text" name="genero" id="genero" required placeholder="Digite o gênero" size = 20><br><br>
			
			<label>Diretor: </label>
			<input type="text" name="diretor" id="diretor" required placeholder="Digite o nome do diretor" size = 40><br><br>
			
			<input type="submit" value="Cadastrar"><br><br>
			
		</form>
		
		
		<!-- Link para a página da listagem -->
		<a href = "listar.php">Listar Filmes Cadastrados</a>
		
	</body> 
</html>   
