<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "estacio";

//criar a conexao
$mysqli = new mysqli($servidor, $usuario, $senha, $dbname);

if ($mysqli -> connect_errno)

echo "Falha na conexão: (".$mysqli ->connect_errno.") ".$mysqli ->connect_error;

?>