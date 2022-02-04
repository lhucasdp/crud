<?php
@ini_set('display_errors','1');
error_reporting(E_ALL & ~E_NOTICE & ~ E_DEPRECATED);

    //Criação do D.A.O Data Acess Object = $connection
    $servername = "localhost";
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $DB = "crud";

    $conn = new mysqli($servername,"root","root",$DB) or die ("nao foi possivel conectar");

    $login = mysqli_real_escape_string($conn, $_POST["login"]);
    $senha = mysqli_real_escape_string($conn, $_POST["senha"]);

    $query = ("INSERT INTO usuarios (login,senha) VALUES ('$login','$senha')");
    mysqli_query($conn,$query);

    mysqli_close($conn);
    echo ("Cadastrado com sucesso !!!");
?>
<h3><a href="index.html">Voltar...</a></h3></br>
