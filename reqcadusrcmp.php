<?php 
	session_start();
    $usuario = $_SESSION['usrlogin'];
    $tipo=$_SESSION['usrtipo'];
    $nome = $_SESSION['usrnome'];
    
	$nomedecripto = base64_decode($nome);
	
	if($tipo==2){
	echo "";
	}
	else 
//	 header("location:erro.php");
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
  <li><a href='index.php'><span>Home</span></a></li>
  <li><a href='#'><span>Produtos</span></a></li>
  <li><a href='#'><span>Quem Somos</span></a></li>
  <li><a href='#'><span>Contato</span></a></li>
  <li><a href='#'><span>Carrinho</span></a></li>
  <?php
echo "<form id=formlogout' name='formlogout' method='post'  action='logout.php'>";
echo "<font size='2.5' color='white'>".$nomedecripto;
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
            <h5>Cadastro Usuário</h5>
			
			<?php
session_start();
?>
<?php 
require_once("conf.php");
$usuario = $_SESSION['usrlogin'];

//echo $usuario;
// atributos
$nome= $_POST["nomeusr"];
//$datanasc= $_POST["nascusr"];
//$rg=$_POST["rgusr"];
$cpf=$_POST["cpfusr"];
$end=$_POST["endusr"];
$num=$_POST["nend"];
$cmpusr=$_POST["compend"];
$cidade=$_POST["cidadeusr"];
$estd=$_POST["estadosusr"];
$cep=$_POST["cepusr"];
$tel=$_POST["telusr"];
$cel=$_POST["celusr"];
$senha=$_POST["senusr"];

// criptografando dados base 64

$nomecripto = base64_encode($nome);
//$datanasccripto = base64_encode($datanasc);
//$rgcripto = base64_encode($rg);
$cpfcripto = base64_encode($cpf);
$endcripto = base64_encode($end);
$numcripto = base64_encode($num);
$cmpusrcripto = base64_encode($cmpusr);
$cidadecripto = base64_encode($cidade);
$estdcripto = base64_encode($estd);
$cepcripto = base64_encode($cep);
$telcripto = base64_encode($tel);
$celcripto = base64_encode($cel);

// criptografando dados MD5

$senhacripto = hash('md5', $senha);

$query = mysql_query("select * from usuarios where login='$usuario' and senha='$senha'");
$num = mysql_num_rows($query);
echo "numero";
echo $num;
if($num >=1){
$result = mysql_query("UPDATE usuarios
SET nome='$nomecripto', cpf='$cpfcripto',
endereco='$endcripto', cidade='$cidadecripto', tel='$telcripto', cel='$celcripto',
estado='$estdcripto', cep='$cepcripto', numero='$numcripto', complemento='$cmpusrcripto', senha='$senha'
WHERE login='$usuario'");
echo "entro aqui";
echo "<h1>Cadastro Realizado com Sucesso</h1>";
}
else{
$result = mysql_query("UPDATE usuarios
SET nome='$nomecripto', cpf='$cpfcripto',
endereco='$endcripto', cidade='$cidadecripto', tel='$telcripto', cel='$celcripto',
estado='$estdcripto', cep='$cepcripto', numero='$numcripto', complemento='$cmpusrcripto', senha='$senhacripto'
WHERE login='$usuario'");
echo "else";
echo "<h1>Cadastro Realizado com Sucesso</h1>";
}
//echo $result;
// Free the resources associated with the result set
// This is done automatically at the end of the script
//mysql_free_result($result);
?>

          
        </div>
<div class="rodape-div"><p>Loja Cusko</p></div>		
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
            <h4>área Do Usuário</h4>
            <br>
            <div id='menuvert'>
            <br> 
            <li><a href="cadusrcmp.php" title="Editar Informações">Editar Informações</a></li>   
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