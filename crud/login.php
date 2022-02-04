<?php
    session_start();
    @ini_set('display_errors','1');
    error_reporting(E_ALL & ~E_NOTICE & ~ E_DEPRECATED);

    //Criação do D.A.O Data Acess Object = $connection
    $servername = "localhost";
    $login = $_SESSION["login"];
    $senha = $_SESSION["senha"];
    $DB = "crud";

    include 'conexao.php';
    $conn = new mysqli($servername, $login, $senha, $DB) or die ('Não foi possível conectar');

    if(empty($_POST['login']) || empty($_POST['senha'])){
        header('Location: index.html');
        exit();
    }

    $login = mysqli_real_escape_string($conn, $_POST['login']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);

    $query = "SELECT * from usuarios where login = '$login' and senha = '$senha'";

    $result = mysqli_query($conn, $query);

    $row = mysqli_num_rows($result);

    if ($login == "root" and $senha == "root"){
        $_SESSION['senha'] = $senha;
        $_SESSION['login'] = $login;
        header('Location: adm.php');
        exit();
    }else if($row == 1){
        $_SESSION['senha'] = $senha;
        $_SESSION['login'] = $login;
        header('Location: user.html');
        exit();
    }else{
        $_SESSION['nao_autenticado'] = true;
        header('Location: index.html');
        exit();
    }

    $login = mysqli_real_escape_string($_POST['conn'], $_POST['login']);

    echo "<h1> Usuario e senha erradas !!!</h1>";

    mysqli_close($conn);
?>