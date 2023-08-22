<?php 

require 'config.php';

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$senha = filter_input(INPUT_POST, 'senha');


if ($id && $nome && $senha) {
    $sql = $pdo->prepare("UPDATE usuario SET nome = :nome, senha = :senha WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':senha', $senha);
    $sql->execute();

    header("Location: principal.php");
}else{
    header("Location: principal.php");
}

?>