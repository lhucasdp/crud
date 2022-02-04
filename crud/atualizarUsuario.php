<?php
session_start();
@ini_set('display_errors','1');
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

$id_usuario = (int)$_POST["id_usuario"];
$nome_usuario = $_POST["nome_usuario"];
$telefone_usuario = $_POST["telefone_usuario"];
$cpf = $_POST["cpf"];
$cnh = $_POST["cnh"];
$endereco_usuario = $_POST["endereco_usuario"];
$carro = $_POST["carro"];

$servername = "localhost";
$login = $_SESSION["login"];
$senha = $_SESSION["senha"];
$DB = "crud";
$conn = new mysqli ($servername,$login,$senha,$DB) or die ("Erro na conexao");

$query = ("UPDATE usuario SET nome_usuario='$nome_usuario', telefone_usuario='telefone_usuario', cpf='$cpf', cnh='$cnh', endereco_usuario='$endereco_usuario', carro='$carro' WHERE id_usuario='$id_usuario'");
mysqli_query($conn, $query) or die (mysqli_error($conn));

if(!$_SESSION["login"]){
    header('Location: index.html');
    exit();
}

//importante sempre fechar KKKKKKK
mysqli_close($conn);
header("location:Usuario.php");
?>