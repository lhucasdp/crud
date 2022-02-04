<?php
    @ini_set('display_errors', '1');
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

    $nome_empresa = $_POST["nome_empresa"];
    $nome_fantasia = $_POST["nome_fantasia"];
    $cnpj = $_POST["cnpj"];
    $endereco_empresa = $_POST["endereco_empresa"];
    $telefone = $_POST["telefone"];
    $id_adm = $_POST["id_adm"];

    //Criação do D.A.O Data Acess Object = $connection
    $servername = "localhost";
    $DB = "crud";

    $conn = new mysqli($servername, "root", "root", $DB) or die ("Erro na conexao");

    $id_adm = mysqli_real_escape_string($conn, $_POST["id_adm"]);

    $query_select = "SELECT 'id_adm' FROM usuario WHERE id_usuario = '$id_adm'";
    $result = mysqli_query($conn, $query_select);
    $array = mysqli_fetch_array($result);

    if (!($array == $id_adm)) {
        $query = ("INSERT INTO empresa (nome_empresa,nome_fantasia,cnpj,endereco_empresa,telefone,id_adm) VALUES ('$nome_empresa','$nome_fantasia','$cnpj','$endereco_empresa','$telefone','$id_adm')");
        mysqli_query($conn, $query);
        echo "Sucesso no cadastro !!!<br/>";
    }else{
        echo "O id_adm está incorreto !!!";
    }
    //fechando a conexao
    mysqli_close($conn);


?>
<h3><a href="adm.php">Voltar...</a></h3></br>

