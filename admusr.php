<?php 
	session_start();
    $usuario = $_SESSION['usrlogin'];
    $tipo=$_SESSION['usrtipo'];
    $nome = $_SESSION['usrnome'];
	$nomedecripto = base64_decode($nome);
	
	if($tipo==1){
	echo "";
	}
	else 
	header("location:erro.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="estilo.css" />
<link rel='icon' rel='icon' href='favicon.ico' type='image/ico' />
<title>Cusko</title>
</head>
<body>
    <div class="global-div">
    	<div class="topo-div"></div>
        <div class="menu-div">
        	<ul>
        	<ul>
			  	<table>
			  	<td>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			  	&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
			  	&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
			  	&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
			  	&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
			  	&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
			  	&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
			    <img src='cusko_branco.jpg' 'height='100' width='200'> </td>  	
			  	</table>
			  	<br>
			  	<br>
<div id='cssmenu'>
<ul>
  <li><a href='adm.php'><span>Home Adm</span></a></li>
  <li><a href='produtos.php'><span>Produtos</span></a></li>
  <li><a href='admprod.php'><span>Administrar Produtos</span></a></li>
  <li><a href='admusr.php'><span>Administrar Usuários</span></a></li>
  <?php
include("valida.php");


echo "<form id=formlogout' name='formlogout' method='post'  action='logout.php'>";
echo "<font size='2.5' color='white'>" .$nomedecripto;
echo "</font>";
echo "<input name='btn_logout' class='button' type='submit' id='btn_logout' value='Logout' size='40'  />";
echo "</form>";
?>

</ul>

</div>				                          
            </ul>
        </div>
        
        <div class="esq-div">
		      
        	<div class="destaques-div">
            <h5>Administrar Usuário</h5>
            
<?php
require_once("conf.php");
echo "
<br/><br/>
<table border=0>
<tr>
<form name='myform' action='editarusr.php' method='POST'> <div align='center'><br>";

$result = mysql_query("SELECT * FROM usuarios");


while ($row = mysql_fetch_assoc($result)) {

$nome=$row['nome'];
$nomedecripto = base64_decode($nome);
$email=$row['email'];
$emaildecripto = base64_decode($email);
//$rg=$row['rg'];
//$rgdecripto = base64_decode($rg);
$cpf=$row['cpf'];
$cpfdecripto = base64_decode($cpf);
//$datanasc=$row['datanasc'];
//$datanascdecripto = base64_decode($datanasc);
$endereco=$row['endereco'];
$enderecodecripto = base64_decode($endereco);
$numero=$row['numero'];
$numerocripto = base64_decode($numero);
$complemento=$row['complemento'];
$complementocripto = base64_decode($complemento);
$cidade=$row['cidade'];
$cidadedecripto = base64_decode($cidade);
$cep=$row['cep'];
$cepdecripto = base64_decode($cep);
$estado=$row['estado'];
$estadodecripto = base64_decode($estado);
$tel=$row['tel'];
$teldecripto = base64_decode($tel);
$cel=$row['cel'];
$celdecripto = base64_decode($cel);
$status=$row['status'];
	
	echo "<th>Selecione</th><th>Login</th><th>Senha</th><th>Nome</th><th>E-Mail</th></tr>";
	echo "<tr>";
    echo "<td> <input type='radio' name='elog' value='".$row['idusuario']."'>".$row['idusuario']. "</td>" ;
    echo "<td> <input type='text' name='elog2'  disabled  size='auto' value='".$row['login']. "'></td>" ;
	echo "<td> <input type='text' name='esenha'  disabled  size='auto' value='".$row['senha']. "'></td>" ;
	echo "<td> <input type='text' name='enomeusr' disabled size='auto' value='".$nomedecripto."'></td>" ;
	echo "<td> <input type='text' name='eemail' disabled size='auto' value='".$emaildecripto."'></td>" ;
	echo "<tr><th>CPF</th><th>Tipo</th><th>End</th><th>Num</th><th>Cmp</th></tr>";
//	echo "<td> <input type='text' name='erg' disabled size='auto' value='".$rgdecripto."'></td>" ;
	echo "<td> <input type='text' name='ecpf' disabled size='auto' value='".$cpfdecripto. "'></td>" ;
	echo "<td> <input type='text' name='etipo' disabled size='auto' value='".$row['tipo']. "'></td>" ;
//	echo "<td> <input type='text' name='edatanasc' disabled size='auto' value='".$datanascdecripto. "'></td>" ;
	echo "<td> <input type='text' name='eend' disabled size='auto' value='".$enderecodecripto. "'></td>" ;
	echo "<td> <input type='text' name='enum' disabled size='auto' value='".$numerocripto. "'></td>" ;
	echo "<td> <input type='text' name='ecmp' disabled size='auto' value='".$complementocripto. "'></td>" ;

	echo "<tr><th>Cidade</th><th>CEP</th><th>Estado</th><th>Tel</th><th>Cel</th></tr>";
	echo "<td> <input type='text' name='ecidade' disabled size='auto' value='".$cidadedecripto. "'></td>" ;
	echo "<td> <input type='text' name='ecep' disabled size='auto' value='".$cepdecripto. "'></td>" ;
	echo "<td> <input type='text' name='eestado' disabled size='auto' value='".$estadodecripto. "'></td>" ;
	echo "<td> <input type='text' name='etel' disabled size='auto' value='".$teldecripto. "'></td>" ;
	echo "<td> <input type='text' name='ecel' disabled size='auto' value='".$celdecripto. "'></td>" ;
	echo "</tr>";
	echo "<tr><th>Status</th></tr>";
	echo "<tr>";
	echo "<td> <input type='text' name='status2' disabled size='auto' value='".$status."'></td>" ;
	echo "</tr>";
	echo "</tr>";
	
}

echo "</table>";
	echo "<td>  <a href='cadusr.php'  class='button adicionar'> Adicionar Usuario</a> </td>";
//	echo "<td> <button type='submit' name='action' value='apagarusr' class='button apagar'> Apagar Usuario</a> </td>";
	echo "<td> <button type='submit' name='action' value='editarusr' class='button editar'> Editar Usuario</a> </td>";
	echo "<td> <a href='buscausr.php'> <button  class='button pesquisar'> Pesquisar Usuario</a> </td>";
	echo "</form>";   
	?>	
     <br>
		 
        </div>
			

<div class="rodape-div"><p>TCC do JET</p></div>		
</div>
         <div class="dir-div">								
            <h4>Menu</h4>
            <br>
            <div id='menuvert'>
			<ul>

            <ul class="maisartigos escuro top8">
            
            <li><a href="#" title="Camisas Masculinas">Camisas Masculinas</a></li>
            <li><a href="#" title="Camisas Femininas">Camisas Femininas</a></li>
            <li><a href="#" title="Calcas Masculinas">Calcas Masculinas</a></li>
            <li><a href="#" title="Calcas Femininas">Calcas Femininas</a></li>
            <li><a href="#" title="Bermudas Masculinas">Bermudas Masculinas</a></li>
            <li><a href="#" title="Shorts Femininos">Shorts Femininos</a></li>
			<li><a href="#" title="Acessorios">Acessorios</a></li>
			<br>   
			     
            </ul>
            </div>
            <br>
            <h4>Busca De Produtos</h4>
            <br>      
        	<input name="login" type="text" id="login" placeholder="Nome ou Descrição" size="20" maxlength="60"/>
        	<input name="btnsearchprod" class="button" type="submit" size="2" id="btnsearchprod" value="Buscar" />
        	<br>
        	<br>
        	<!-- Like Button Facebook -->
        	<div id="fb-root"></div>        	
			<div class="fb-like" data-href="https://pt-br.facebook.com/usecusko" data-send="true" data-layout="button_count" 
			data-width="450" data-show-faces="true" data-font="arial"></div>
		</div>
		
</div>
				<!-- Script para se conectar ao Facebook -->
				<script>(function(d, s, id) {
  				var js, fjs = d.getElementsByTagName(s)[0];
  				if (d.getElementById(id)) return;
 					js = d.createElement(s); js.id = id;
  				js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  				fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>
