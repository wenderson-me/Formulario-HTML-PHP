
<?php

$nome = isset( $_GET[ 'nome' ] ) ? $_GET[ 'nome' ] : null ;
echo("
<!DOCTYPE html>
<html>
<head>
<title>PESQUISAR</title>		
</head>
<style>


#customers {
  font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

.hero-image {
  background-image: url('kimlimp.gif');
  background-color: #cccccc;
  height: 1000px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
}

.btn:hover {
  background-color: RoyalBlue;
}
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  cursor: pointer;
}
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
<body>
<div class='hero-image'>		
<h1 style='background-color:DodgerBlue;'>Consulta de Dados</h1>
<table id='customers'>
<tr>
<td width= '40'><center>ID</center></td>
<td width='200'><center>Nome</center></td>
<td width='200'><center>Email</center></td>
<td width='100'><center>Telefone</center></td> 
<td width='100'><center>Celular</center></td>
<td width='100'><center>Data de Nascimento</center></td> 
<td width='200'><center>Endereco</center></td>
<td width='100'><center>Bairro</center></td>
<td width='20'><center>UF</center></td>
<td width='92'><center>Cidade</center></td>
<td width='100'><center>CEP</center></td> 
<td width='80'><center>Excluir</center></td>
<td width='80'><center></center>Editar</td>
</tr>
</table>
");

$pdo = new PDO('mysql:host=localhost;dbname=loona', 'root', null);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$consulta = $pdo->query("SELECT * FROM dados WHERE nome LIKE '%$nome%'");
echo("<table id='customers'>"); 
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
	echo "
<tr>
<td width='40'>{$linha['id']}</td>
<td width='200'>{$linha['nome']}</td>
<td width='200'>{$linha['mail']}</td>
<td width='100'>({$linha['dddt']}){$linha['telefone']}</td>
<td width='100'>({$linha['dddc']}){$linha['celular']}</td>
<td width='100'>{$linha['datanasc']}</td>
<td width='200'>{$linha['endereco']}</td>
<td width='100'>{$linha['bairro']}</td>
<td width='20'>{$linha['uf']}</td>
<td width='92'>{$linha['cidade']}</td>
<td width='100'>{$linha['cep']}-{$linha['cep2']}</td>
<td width='43'><center>
<a href=delete.php?id={$linha['id']} onclick=return confirm('Tem certeza que deseja excluir esse cadastro?'); return false;><button class='btn'><i class='fa fa-trash'></i>Excluir</button>
</a>
</center></td>
<td width='43'><center>
<a href=editar.php?id={$linha['id']}><center><button class='btn'><i class='fa fa-trash'></i>Editar</button>
</center></td>
</tr>
	";
}

echo("</table>");
echo("<center><br><a href='relatorio.php'><img src='imgs/xls.png'></a><img src='imgs/print.png' onClick='window.print();'></center>");
echo("<a href='index.html'><button class='button4 button'>Novo Cadastro</button></a>");
echo("</center>");

?>