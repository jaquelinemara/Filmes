<?php
session_start(); 
include_once("conexao.php");

// recebendo o campo id do editar_filme.php
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

// receber os dados do formulário
// FILTER_SANITIZE_STRING = limpar a várivável dos dados que vem do formulário
$titulo= filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
$ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_NUMBER_INT);
$genero = filter_input(INPUT_POST, 'genero',FILTER_SANITIZE_STRING);
$diretor = filter_input(INPUT_POST, 'diretor',FILTER_SANITIZE_STRING);

//echo "Título: $titulo <br>";
//echo "Ano: $ano <br>";
//echo "Gênero: $genero <br>";
//echo "Diretor: $diretor <br>";

//query - editar filme já cadastrado
$result_filme = "UPDATE filmes SET titulo = '$titulo', ano = '$ano', genero = '$genero', diretor = '$diretor' WHERE id='$id'";
// executar a query
$resultado_filme = mysqli_query($conn, $result_filme);

// teste para saber se vai cadastrar com sucesso ou não
if (mysqli_affected_rows($conn)){
    $_SESSION ['msg'] = "<p style ='color:green'>Filme editado com sucesso!</p>"; // tem que usar sessão para mostra mensagem
    header("Location: listar.php");
}else{
    $_SESSION ['msg'] = "<p style = 'color:red'>Filme não editado!</p>"; // tem que usar sessão para mostra mensagem
    header("Location: editar.php?id=$id");
}

?>
