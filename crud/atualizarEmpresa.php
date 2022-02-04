<?php
    session_start();
    @ini_set('display_errors','1');
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

    $id_empresa = (int) $_POST['id_empresa'];
    $nome_empresa = $_POST["nome_empresa"];
    $nome_fantasia = $_POST["nome_fantasia"];
    $cnpj = $_POST["cnpj"];
    $endereco_empresa = $_POST["endereco_empresa"];
    $telefone = $_POST["telefone"];
    $id_adm = $_POST["id_adm"];

    $servername = "localhost";
    $login = $_SESSION["login"];
    $senha = $_SESSION["senha"];
    $DB = "crud";
    $conn = new mysqli ($servername,$login,$senha,$DB) or die ("Erro na conexao");

    $query = ("UPDATE empresa SET nome_empresa='$nome_empresa', nome_fantasia='$nome_fantasia', cnpj='$cnpj', endereco_empresa='$endereco_empresa', telefone='$telefone', id_adm='$id_adm' WHERE id_empresa='$id_empresa'");
    mysqli_query($conn, $query) or die (mysqli_error($conn));

    if(!$_SESSION["login"]){
        header('Location: index.html');
        exit();
    }

    //importante sempre fechar KKKKKKK
    mysqli_close($conn);
    header("location:Empresa.php");
?>