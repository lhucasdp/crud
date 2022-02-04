<?php
session_start();
@ini_set('display_errors','1');
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

$servername = "localhost";
$login = $_SESSION["login"];
$senha = $_SESSION["senha"];
$DB = "crud";
$conn = new mysqli ($servername,$login,$senha,$DB) or die ("Erro na conexao");

$id_empresa = $_GET["id_empresa"];
settype($id,"integer");
//echo($id);
mysqli_query($conn, "delete from empresa where id_empresa = $id_empresa");


//importante sempre fechar KKKKKKK
mysqli_close($conn);
header("location: Empresa.php");
?>