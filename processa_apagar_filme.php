<?php
session_start(); 
include_once("conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); // método GET = pela URL

//query deletar registro do banco
$result_filme = "DELETE FROM filmes WHERE id = '$id'";
$resultado_filme = mysqli_query($conn,$result_filme);

if(mysqli_affected_rows($conn)){
    $_SESSION ['msg'] = "<p style ='color:green'>Filme apagado com sucesso!</p>"; // tem que usar sessão para mostra mensagem
    header("Location: index.php");
}else{
    $_SESSION ['msg'] = "<p style = 'color:red'>Filme não deletado!</p>"; // tem que usar sessão para mostra mensagem
    header("Location: index.php");
}

?>
