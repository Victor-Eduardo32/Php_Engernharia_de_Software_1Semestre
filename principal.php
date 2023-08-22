<?php 
require 'config.php';
require 'classLogin.php';

if(!isset($_SESSION['logado'])){
    header("Location: index.php");
}

$sql = $pdo->query("SELECT * FROM usuario");

if ($sql->rowCount() > 0) {
    $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <title>Document</title>
</head>
<body>
   <div class="principal">
    <br>
    <button><a href="adicionar.php">ADICIONAR</a></button>
    <button><a href="logout.php">SAIR</a></button>
        <table border="1px" width="100%">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>SENHA</th>
                <th>AÇÕES</th>
            </tr>
            <?php foreach($lista as $dados): ?>
            <tr>
                <td><?=$dados['id'];?></td>
                <td><?=$dados['nome'];?></td>
                <td><?=$dados['senha'];?></td>
                <td>
                    <button><a href="editar.php?id=<?=$dados['id'];?>">EDITAR</a></button>
                    <button><a href="excluir.php?id=<?=$dados['id'];?>" onclick="return confirm('Como é amigo?')">EXCLUIR</a></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
   </div> 
</body>
</html>