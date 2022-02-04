<?php
    @ini_set('display_errors', '1');
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

    $nome_usuario = $_POST["nome_usuario"];
    $telefone_usuario = $_POST["telefone_usuario"];
    $cpf = $_POST["cpf"];
    $cnh = $_POST["cnh"];
    $endereco_usuario = $_POST["endereco_usuario"];
    $carro = $_POST["carro"];

    //Criação do D.A.O Data Acess Object = $connection
    $servername = "localhost";
    $DB = "crud";

    $conn = new mysqli($servername, "root", "root", $DB) or die ("Erro na conexao");

    $query = ("INSERT INTO usuario (nome_usuario,telefone_usuario,cpf,cnh,endereco_usuario,carro) VALUES ('$nome_usuario','$telefone_usuario','$cpf','$cnh','$endereco_usuario','$carro')");
    mysqli_query($conn,$query);

    //fechando a conexao
    mysqli_close($conn);

    echo "Sucesso no cadastro !!!<br/>";
?>
<h3><a href="adm.php">Voltar...</a></h3></br>

