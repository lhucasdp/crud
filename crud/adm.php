<?php
    session_start();
    if(!$_SESSION["login"]){
        header('Location: index.html');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Admnistrador</title>
    <link rel="stylesheet" href="estilo.css"/>
    <style>
        #listar {
            width: 330px;
            height: 180px;
            margin: 0 auto;
        }
        td{
            border-radius: 30px;
            background-color: #eeeeee;
        }
        #linha{
            width: 400px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <h1><strong>Admnistrador</strong></h1>

    <table id="listar">
        <div id="linha">
            <hr>
        </div>
        <br>
        <tr>
            <td><h3>
                <a href="cadUsuario.html">Cadastro Usuario</a>
            </h3></td>
            <td><h3>
                <a href="cadEmpresa.html">Cadastro Empresa</a>
            </h3></td>
        </tr>

        <tr>
            <td><h3>
                <a href="Usuario.php">Listar Usuario</a>
            </h3></td>
            <td><h3>
                <a href="Empresa.php">Listar Empresa</a>
            </h3></td>
        </tr>
    </table>
    <h3><a href="index.html">Voltar...</a></h3>
    <h3><a href="logout.php">Sair</a></h3>
</body>
</html>