<?php
session_start();
@ini_set('display_errors','1');
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

$servername = "localhost";
$login = $_SESSION["login"];
$senha = $_SESSION["senha"];
$DB = "crud";
$conn = new mysqli ($servername,$login,$senha,$DB);
$query = ("SELECT empresa.id_empresa,empresa.nome_fantasia, empresa.cnpj, empresa.telefone, empresa.id_adm, usuario.nome_usuario FROM usuario JOIN empresa WHERE empresa.id_adm = usuario.id_usuario;");
$resultado = mysqli_query($conn,$query);
//importante sempre fechar KKKKKKK

if(!$_SESSION["login"]){
    header('Location: index.html');
    exit();
}

mysqli_close($conn);

?>
<!DOCTYPE html>
<head>
    <title>Listagem de Usuarios</title>
    <meta charset="utf-8"/>
    <style>
        body{
            background: #cccccc;
        }
        tr,td,th{
            border-radius: 5px;
            background-color: #eeeeee;
        }
        #listar{
            border-radius: 5px;

        }
        #texto{
            text-align: center;
        }
        #divisao{
            width: 300px;
            margin: 0 auto;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<?php if(mysqli_num_rows($resultado) < 1) { exit; } ?>
<table id="listar" width="600" align="center" border="0" cellspacing="5" >
    <div id="texto">
        <h1>Lista de Usuários</h1>
    </div>
    <div id="divisao">
        <hr>
    </div>
    <tr>
        <th>Id_Empresa</th>
        <th>Nome_Fantasia</th>
        <th>CNPJ</th>
        <th>Telefone_Empresa</th>
        <th>Id_adm</th>
        <th>Nome_adm</th>
    </tr>
    <?php while($linha = mysqli_fetch_array($resultado)){
        $id_empresa = $linha["id_empresa"];
        $nome_fantasia = $linha["nome_fantasia"];
        $cnpj = $linha["cnpj"];
        $telefone = $linha["telefone"];
        $id_adm = $linha["id_adm"];
        $nome_usuario = $linha["nome_usuario"];

        echo"
		<tr>
		    <td>$id_empresa</td>
			<td>$nome_fantasia</td>
			<td>$cnpj</td>
			<td>$telefone</td>
			<td>$id_adm</td>
            <td>$nome_usuario</td>

		</tr>\n";
    }?>
</table>
<div id="texto">
    <h3><a href="user.html">Voltar Menu.</a></h3>
    <h3><a href="logout.php">Sair</a></h3>
</div>

</body>
</html>