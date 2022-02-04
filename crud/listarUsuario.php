<?php
session_start();
@ini_set('display_errors','1');
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

$servername = "localhost";
$DB = "crud";
$login = $_SESSION["login"];
$senha = $_SESSION["senha"];
$conn = new mysqli ($servername,$login,$senha,$DB);
$query = ("select * from usuario order by id_usuario");
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
        <th>Id_Usuario</th>
        <th>Nome_Usuario</th>
        <th>Telefone_Usuario</th>
        <th>CPF</th>
        <th>CNH</th>
        <th>Endereco_Usuario</th>
        <th>Carro</th>
    </tr>
    <?php while($linha = mysqli_fetch_array($resultado)){
        $id_usuario = $linha["id_usuario"];
        $nome_usuario = $linha["nome_usuario"];
        $telefone_usuario = $linha["telefone_usuario"];
        $cpf = $linha["cpf"];
        $cnh = $linha["cnh"];
        $endereco_usuario = $linha["endereco_usuario"];
        $carro = $linha["carro"];

        echo"
		<tr>
			<td>$id_usuario</td>
			<td>$nome_usuario</td>
			<td>$telefone_usuario</td>
			<td>$cpf</td>
			<td>$cnh</td>
			<td>$endereco_usuario</td>
			<td>$carro</td>
		</tr>\n";
    }?>
</table>
<div id="texto">
    <h3><a href="user.html">Voltar Menu.</a></h3>
    <h3><a href="logout.php">Sair</a></h3>
</div>

</body>
</html>