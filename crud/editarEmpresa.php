<?php
session_start();
@ini_set('display_errors','1');
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

$id_empresa = $_GET["id_empresa"];
settype($id_empresa, "integer");

$servername = "localhost";
$login = $_SESSION["login"];
$senha = $_SESSION["senha"];
$DB = "crud";
$conn = new mysqli ($servername,$login,$senha,$DB);

$resultado = mysqli_query($conn,"select * from empresa where id_empresa=$id_empresa");
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
<form id="form1" name="form1" method="POST" action="atualizarEmpresa.php">
    <!--<input type="text" name="id" id="id" value"<?php echo $id_empresa;?>" />-->
    <input type="hidden" name="id_empresa" id="id_empresa" value="<?php echo $id_empresa;?>" />
    <table width="480" border="1" align="center">
        <tr>
            <td width="165">Nome_Empresa</td>
            <td width="380"><input name="nome_empresa" type="text" id="nome_empresa" value="<?php echo $dados["nome_empresa"];?>"/></td>
        </tr>
        <tr>
            <td>Nome_Fantasia</td>
            <td><input name="nome_fantasia" type="text" id="nome_fantasia" value="<?php echo $dados["nome_fantasia"];?>"/></td>
        </tr>
        <tr>
            <td>cnpj</td>
            <td><input name="cnpj" type="text" id="cnpj" value="<?php echo $dados["cnpj"];?>" /></td>
        </tr>
        <tr>
            <td>endereco_empresa</td>
            <td><input name="endereco_empresa" type="text" id="endereco_empresa" value="<?php echo $dados["endereco_empresa"];?>" /></td>
        </tr>
        <tr>
            <td>Telefone</td>
            <td><input name="telefone" type="text" id="telefone" value="<?php echo $dados["telefone"];?>" /></td>
        </tr>
        <tr>
            <td>id_adm</td>
            <td><input name="id_adm" type="integer" id="id_adm" value="<?php echo $dados["id_adm"];?>" /></td>
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