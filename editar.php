<?php 

require 'config.php';

$id = filter_input(INPUT_GET, 'id');
$info = [];

if ($id) {
    $sql = $pdo->prepare("SELECT * FROM usuario WHERE id = :id");
    $sql->bindValue(':id',$id);
    $sql->execute();

    if ($sql->rowCount() > 0) {
        $info = $sql->fetch(PDO::FETCH_ASSOC);
    }else{
        header("Location: principal.php");
    }
}else{
    header("Location: principal.php");
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="estilo.css">

	</style>
	<title>site</title>
</head>
<body>
<div class="formulario">
	
<form method="post" action="edit.php">
<input type="hidden" name="id" value="<?=$info['id'];?>">
<input type="text" name="nome" value="<?=$info['nome'];?>"><br><br>
<input type="password" name="senha" value="<?=$info['senha'];?>"><br><br>
<input type="submit" value="editar" name="logar">
<input type="reset" value="cancelar"><br><br>

</form>

</div>
</body>
</html>

