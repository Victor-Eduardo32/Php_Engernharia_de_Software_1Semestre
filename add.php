<?php

require 'config.php';

$nome = filter_input(INPUT_POST, 'nome');
$senha = filter_input(INPUT_POST, 'senha');

//echo "Nome digitado: ".$nome."<br>";
//echo "Senha digitada: ".$senha;

if ($nome && $senha) {
    //$sql = $pdo->query("INSERT INTO usuario (nome, senha) VALUES ('$nome', '$senha')");
    $sql = $pdo->prepare("INSERT INTO usuario (nome, senha) VALUES (:nome,:senha)");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':senha',md5($senha));
    $sql->execute();

    header("Location: principal.php");
}else{
    header("Location: adicionar.php");
}

?>