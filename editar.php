<?php

$id = isset( $_GET[ 'id' ] ) ? $_GET[ 'id' ] : null ;
$pdo = new PDO('mysql:host=localhost;dbname=loona', 'root', null);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
$consulta = $pdo->query("SELECT * FROM dados WHERE id = '$id'");
  
while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
echo("

<!DOCTYPE html>
<html>
<head>
<title>Prova do daniel</title>
<meta charset='UTF-8'>
</head>



<style>
input:focus {
  background-color: rgb(239, 219, 243); 
}
    .button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 1px solid rgb(90, 211, 126);
}

.button1:hover {
  background-color: rgb(90, 211, 126);
  color: white;
}

.button2 {
  background-color: white; 
  color: black; 
  border: 1px solid rgb(250, 64, 80);
}

.button2:hover {
  background-color: rgb(250, 64, 80);
  color: white;
}

.button3 {
    background-color: white;
    color: black;
    border: 1px solid rgb(52, 227, 250);    
}

.button3:hover {
  background-color: rgb(52, 227, 250);  
  color: white;
}


.hero-image {
  background-image: url('olivia.GIF');
  background-color: #cccccc;
  height: 1000px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}
</style>



<body
<div class='hero-image'>
<h3 style='text-align:left;'>CRIAR CADASTRO</h3>

<form action='salvar.php' method='POST'>

 <fieldset>
  <legend>Dados Pessoais</legend>
  <table cellspacing='10'>
  <tr>
  <td>
  <label for='nome'>Nome: </label>
  </td>
  <td align='left'>
   <input type='text' name='nome' size='40' value='".$linha['nome']."'>
   </td>
  </tr>
  <tr>
  <td>
  <label for='email'>E-mail: </label>
  </td>
  <td align='left'>
   <input type='text' name='mail' size='40' value='".$linha['mail']."'>
  </td>
  </tr>
  <tr>
  <td>
  <label for='telefone'>Telefone:</label>
  </td>
   <td align='left'>
   <input type='text' name='dddt' size='2' maxlength='2' value='".$linha['dddt']."'>
  <input type='text' name='telefone' size='9' maxlength='9'value='".$linha['telefone']."'>
  </td>
  </tr>
  <tr>
  <td>
  <label for='celular'>Celular:</label>
  </td>
  <td align='left'>
  <input type='text' name='dddc' size='2' maxlength='2' value='".$linha['dddc']."'> 
  <input type='text' name='celular' size='9' maxlength='9' value='".$linha['celular']."'>
  </td>
  </tr>
  <tr>
  <td>
  <label>Nascimento: </label>
  </td>
  <td align='left'>
  <input name='datanasc' type='date' value='".$linha['datanasc']."'>
  </td>
  </tr>
  </table>
  </fieldset>
<br />
  <fieldset>
  <legend>Dados de Endereço</legend>
  <table cellspacing='10'>
  
  <tr>
  <td>
  <label for='endereco'>Endereço:</label>
  </td>
  <td align='left'>
  <input type='text' name='endereco' size='30' value='".$linha['endereco']."'>
  </td>
  </tr>                                    
  <td>
  <label for='bairro'>Bairro: </label>
  </td>
  <td align='left'>
  <input type='text' name='bairro' size='30' value='".$linha['bairro']."'>
  </td>
  </tr>
  <tr>
  <td>
  <label for='uf'>UF:</label>
  </td>
  <td align='left'>
  <select name='uf'>
  <option value='".$linha['uf']."' selected>".$linha['uf']."</option>
  <option>AL</option>
  <option>AM</option>
  <option>AP</option>
  <option>BA</option>
  <option>CE</option>
  <option>DF</option>
  <option>ES</option>
  <option>GO</option>
  <option>MA</option>
  <option>MT</option>
  <option>MS</option>
  <option>MG</option>
  <option>PA</option>
  <option>PB</option>
  <option>PR</option>
  <option>PE</option>
  <option>PI</option>
  <option>RJ</option>
  <option>RN</option>
  <option>RO</option>
  <option>RS</option>
  <option>RR</option>
  <option>SC</option>
  <option>SE</option>
  <option>SP</option>
  <option>TO</option>
</select>
  </td>
  </tr>
  <tr>
  <td>
  <label for='cidade'>Cidade: </label>
  </td>
  <td align='left'>
  <input type='text' name='cidade' value='".$linha['cidade']."'>
  </td>
  </tr>
  <tr>
  <td>
  <label for='cep'>CEP: </label>
  </td>
  <td align='left'>
  <input type='text' name='cep' size='5' maxlength='5'  value='".$linha['cep']."'> 
  <input type='text' name='cep2' size='3' maxlength='3' value='".$linha['cep2']."'> 
  <input type='hidden' name='id' value='".$linha['id']."'>
  <input type='hidden' name='funcao' value='editar'>
</td>
</tr>
</table>
</fieldset>
<br>
<table cellspacing='0'>
<tr'>
<td width='300'><center><a href='index.html'><button type='button' class='button button3' value='Cadastro'>Novo Cadastro</a></center></td>
<td width='300'><center><button type='Submit' class='button button1' value='Atualizar'>Atualizar</center></td>
</tr>
</table>
</form>
</body>
</html>
");
}
?>