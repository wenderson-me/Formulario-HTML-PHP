<?php
$nome       = $_POST["nome"];
$mail      = $_POST["mail"];
$dddt       = $_POST["dddt"];
$telefone   = $_POST["telefone"];
$dddc       = $_POST["dddc"];
$celular    = $_POST["celular"];
$datanasc   = $_POST["datanasc"];
$endereco   = $_POST["endereco"];
$bairro     = $_POST["bairro"];
$uf         = $_POST["uf"];
$cidade     = $_POST["cidade"];
$cep        = $_POST["cep"];
$cep2       = $_POST["cep2"];
$funcao     = $_POST["funcao"];

//echo("$nome, $mail, $ddd, $fone, $endereco, $cidade, $uf, $funcao");

if($funcao == 'gravar'){
  try {
    $pdo = new PDO('mysql:host=localhost;dbname=loona', 'root', "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  
  
    $stmt = $pdo->prepare('INSERT INTO dados 
    VALUES(:id, :nome, :mail, :dddt, :telefone, :dddc, :celular, :datanasc, :endereco, :bairro, :uf, :cidade, :cep, :cep2)');
    $stmt->execute(array(
        ':id'             => NULL,
        ':nome'           => $nome,
        ':mail'            => $mail,
        ':dddt'           => $dddt,
        ':telefone'       => $telefone,
        ':dddc'           => $dddc,
        ':celular'        => $celular,
        ':datanasc'       => $datanasc,
        ':endereco'       => $endereco,
        ':bairro'         => $bairro,
        ':uf'             => $uf,
        ':cidade'         => $cidade,
        ':cep'            => $cep,
        ':cep2'           => $cep2
        
    ));
    echo ("<script>alert('Dados registrados com sucesso.');window.history.back();</script>"); 
  } catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}

if($funcao == 'editar'){
$id = $_POST["id"];
try {
  $pdo = new PDO('mysql:host=localhost;dbname=loona', 'root', null);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
  $stmt = $pdo->prepare('UPDATE dados SET nome = :nome, mail = :mail, dddt = :dddt, telefone = :telefone, datanasc = :datanasc, 
  endereco = :endereco, bairro = :bairro, uf = :uf, cidade = :cidade, cep = :cep, cep2 = :cep2 WHERE id = :id');
  $stmt->execute(array(
    ':id'             => $id,
    ':nome'           => $nome,
    ':mail'          => $mail,
    ':dddt'           => $dddt,
    ':telefone'       => $telefone,
    ':dddc'           => $dddc,
    ':celular'        => $celular,
    ':datanasc'       => $datanasc,
    ':endereco'       => $endereco,
    ':bairro'         => $bairro,
    ':uf'             => $uf,
    ':cidade'         => $cidade,
    ':cep'            => $cep,
    ':cep2'            => $cep2

  ));
     
  echo ("<script>alert('Dados atualizados com sucesso.');window.location.href='index.html';</script>"); 
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}

}
?>