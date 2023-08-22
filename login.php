<?php 

if (!empty($_POST['nome']) && !empty($_POST['senha'])) {
    require 'config.php';
    require 'classLogin.php';

    $nome = addslashes($_POST['nome']);
    $senha= addslashes($_POST['senha']);

    $user = new LogUser();

    if ($user->logar($nome, $senha) == true) {
        if(isset($_SESSION['logado'])) {
            header("Location: principal.php");
        }else{
            header("Location: index.php");
        }
    }else{
        header("Location: index.php");
    }
    
}else{
    header("Location: index.php");
}

?>