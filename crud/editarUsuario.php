<?php
session_start();
@ini_set('display_errors','1');
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

$id_usuario = $_GET["id_usuario"];
settype($id_usuario, "integer");

$servername = "localhost";
$login = $_SESSION["login"];
$senha = $_SESSION["senha"];
$DB = "crud";
$conn = new mysqli ($servername,$login,$senha,$DB);

$resultado = mysqli_query($conn,"select * from usuario where id_usuario=$id_usuario");
$dados = mysqli_fetch_array($resultado);

//importante sempre fechar KKKKKKK
mysqli_close($conn);
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8"/>
    <title>Cadastro Editar</title>
    <style>
        #texto{
            text-align: center;
        }
    </style>
</head>
<body>
<h2 align="center"><strong>Editar PHP<strong></h2>
<form id="form1" name="form1" method="POST" action="atualizarUsuario.php">
    <!--<input type="text" name="id" id="id" value"<?php echo $id_usuario;?>" />-->
    <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $id_usuario;?>" />
    <table width="480" border="1" align="center">
        <tr>
            <td width="165">nome_usuario</td>
            <td width="380"><input name="nome_usuario" type="text" id="nome_usuario" value="<?php echo $dados["nome_usuario"];?>"/></td>
        </tr>
        <tr>
            <td>telefone_usuario</td>
            <td><input name="telefone_usuario" type="text" id="telefone_usuario" value="<?php echo $dados["telefone_usuario"];?>"/></td>
        </tr>
        <tr>
            <td>cpf</td>
            <td><input name="cpf" type="text" id="cpf" value="<?php echo $dados["cpf"];?>" /></td>
        </tr>
        <tr>
            <td>cnh</td>
            <td><input name="cnh" type="text" id="cnh" value="<?php echo $dados["cnh"];?>" /></td>
        </tr>
        <tr>
            <td>endereco_usuario</td>
            <td><input name="endereco_usuario" type="text" id="endereco_usuario" value="<?php echo $dados["endereco_usuario"];?>" /></td>
        </tr>
        <tr>
            <td>carro</td>
            <td><input name="carro" type="text" id="carro" value="<?php echo $dados["carro"];?>" /></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="Submit" value="Gravar" style="cursor:pointer"/></td>
        </tr>
    </table>
</form>
<div id="texto">
    <h3><a href="adm.php">Voltar Menu.</a></h3>
    <h3><a href="logout.php">Sair</a></h3>
</div>
</body>
</html>