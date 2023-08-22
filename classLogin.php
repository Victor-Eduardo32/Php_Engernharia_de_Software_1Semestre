<?php 

class LogUser {

    public function logar($nome, $senha) {
        global $pdo;

        $sql = $pdo->prepare("SELECT * FROM usuario WHERE nome = :nome AND senha = :senha");
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':senha', md5($senha));
        $sql->execute();

        if ($sql->rowCount > 0) {
            $info = $sql->fetch(PDO::FETCH_ASSOC);
            $_SESSION['logado'] = $info['nome'];

            return true;
        } return false;
    }


    public function sair() {
        session_destroy();
        header("Location: index.php");
        exit;
    }
}



?>