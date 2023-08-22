<?php 

session_start();

$db_name = 'php';
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';

global $pdo;

try {
    
$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host,$db_user,$db_pass);

} catch (Exception $e) {
    die("Erro: ".$e->getMessage());
}

/*$sql = $pdo->query("SELECT * FROM usuario");
$lista = $sql->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($lista);*/

?>