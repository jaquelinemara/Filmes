<?php
session_start();
include_once("conexao.php");
// receber os dados do formulario
// FILTER_SANITIZE_STRING = limpar a variável dos dados que em do formulário
$título= filter_input(INPUT_POST, 'título', FILTER_SANITIZE_STRING);
$ano= filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_NUMBER_INT);
$genero= filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
$diretor= filter_input(INPUT_POST, 'diretor', FILTER_SANITIZE_STRING);

//echo "Título: $título <br>";
//echo "Ano: $ano <br>";
//echo "Gênero: $genero <br>";
//echo "Diretor: $diretor <br>";

//query
$result_filme = "INSERT INTO filmes (título, ano, genero, diretor) VALUES ('$título', '$ano', '$genero', '$diretor')";
//executar a query
$resultado_filme = mysqli_query($conn, $result_filme);

// teste para saber se vai cadastrar com sucesso ou não
if (mysqli_insert_id($conn)){
    $_SESSION ['msg'] = "<p style ='color:green'> Filme cadastrado com sucesso!</p>"; //tem que usar sessão para mostrar mensagem
    header("Location: index.php");    
}else {
    $_SESSION ['msg'] = "<p style ='color:red'> Filme não cadastrado!"; //tem que usar sessão para mostrar mensagem
    header("Location: index.php");
}


?>