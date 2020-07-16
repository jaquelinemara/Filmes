<?php 
session_start(); //iniciar a sessão
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); // método GET = pela URL
$result_filme = "SELECT * FROM filmes WHERE id = '$id'"; // trazer todas as colunas da tabela
$resultado_filme =mysqli_query($conn, $result_filme);
$row_filme = mysqli_fetch_assoc($resultado_filme);
?>

<!DOCTYPE html> <!-- HTML 5 -->
<html lang="pt-br"> <!-- IDIOMA DO MEU SITE -->
	<head>
		<meta name="charset" content="utf-8" /> <!-- usar caracteres especiais -->
		<title>CRUD - Editar</title> <!-- nome da aba -->
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		 	
	</head>	
	<body>
		<h1>Editar Filme</h1><br> <!-- Título principal da página -->
		<?php 
		if (isset($_SESSION ['msg'])){ // se existir a variável global 'msg'...
		    echo $_SESSION ['msg'];
		    unset ($_SESSION ['msg']); // destroi variável global para imprimir uma vez
		}
		?>
		
		<!-- formulário -->
		<!-- Método usado para enviar os dados e para qual página -->
		<form method="POST" action="processa_editar_filme.php">
			<input type="hidden" name="id" value = "<?php echo $row_filme['id']; ?>"> 
		
			<label>Título do Filme:</label> <!-- Ajuda o usuário saber o que deve preencher no formulário -->
			<input type="text" name="titulo" id="titulo" required placeholder="Digite o nome do filme" size = 30 value = "<?php echo $row_filme['titulo']; ?>"><br><br>
			
			<label>Ano de lançamento: </label>
			<input type="text" name="ano" id="ano" required placeholder="Digite o ano do lançamento do filme" size = 40 value = "<?php echo $row_filme['ano']; ?>"><br><br>
			
			<label>Gênero: </label>
			<input type="text" name="genero" id="genero" required placeholder="Digite o gênero" size = 20 value = "<?php echo $row_filme['genero']; ?>"><br><br>
			
			<label>Diretor: </label>
			<input type="text" name="diretor" id="diretor" required placeholder="Digite o nome do diretor" size = 40 value = "<?php echo $row_filme['diretor']; ?>"><br><br>			
			
			<input type="submit" value="Editar"><br><br>
        					
		</form>
		
		<!-- Link para a página da cadastro -->
        <a href="index.php">Cadastrar Filmes</a><br><br>
			
		<!-- Link para a página da listagem -->
        <a href="listar.php">Listar Filmes</a>  
        		
	</body>
</html>