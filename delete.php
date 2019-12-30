<?php
$id = $_GET["id"];
echo("
<style>
.button4 {
  background-color: white; 
  color: black; 
  border: 1px solid rgb(90, 211, 126);
}
.button4:hover {
  background-color: rgb(90, 211, 126);
  color: white;
}
</style>
");

try {
  $pdo = new PDO('mysql:host=localhost;dbname=loona', 'root', '');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
  $stmt = $pdo->prepare('DELETE FROM dados WHERE id = :id');
  $stmt->bindParam(':id', $id); 
  $stmt->execute();
     
  echo ("<center><font size='17'>Cadastro\"s\" ".$stmt->rowCount()." registro\"s\"</font></center>");  
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}

echo("<center><br><br><a href='http://localhost/loona/consulta.php'><button class='button4 button'>Voltar para tela de Consulta</button></a></center>");
?>