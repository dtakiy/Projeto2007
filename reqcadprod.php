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
            <h5>Cadastro Produto</h5>
			
			<?php
// Inserindo produtos na tabela
require_once("conf.php");

$cod = "$_POST[codprod]";
$nomeprod = "$_POST[nomeprod]";
$precoprod = "$_POST[precoprod]";
$qtdprod = "$_POST[qtdprod]";
$pesoprod = "$_POST[pesoprod]";
$catprod = "$_POST[catprod]";
$destaqueprod = "$_POST[nomeprod]";
$fotoprod = "$_POST[fotoprod]";
$descprod = "$_POST[descprod]";
//$notaprod = "$_POST[notaprod]";

$result = mysql_query("INSERT INTO produtos (cod_produto,nome_produto,cat_produto,preco_produto,qtd_produto,imagem,destaque,status_prod,descricao) VALUES($cod,'$nomeprod'
,'$catprod',$precoprod,$qtdprod,'$fotoprod',1,1,'$descprod')");

//echo  $result;
//echo "INSERT INTO produtos (cod_produto,nome_produto,cat_produto,preco_produto,qtd_produto,imagem,destaque,status_prod,descricao) VALUES($cod,'$nomeprod';
//,'$catprod',$precoprod,$qtdprod,'$fotoprod',1,1,'$descprod')";
file_put_contents($nomeprod.".php","  ");
file_put_contents($nomeprod.".php", "
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<link rel='icon' rel='icon' href='favicon.ico' type='image/ico' />
<link rel='stylesheet' type='text/css' href='estilo.css' />
<title>Cusko</title>
</head>


<body>
    <div class='global-div'>
    	<div class='topo-div'></div>
        <div class='menu-div'>
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

</ul>

</div>				                          
            </ul>
        </div>
        
        <div class='esq-div'>
		      
        	<div class='destaques2-div'>
            <h5>".$nomeprod."</h5>
			
			<table border=0>
<td>
<table border=0>
<BR>
<BR>
<td><img src='".$fotoprod."'height='150' width='150' name='prod'></td>
<td><table border=0>
<td>Dimensoes:(cm)</td><td>&nbsp;&nbsp;P&nbsp;&nbsp;</td><td>&nbsp;&nbsp;M&nbsp;&nbsp;</td><td>&nbsp;&nbsp;G&nbsp;&nbsp;</td>
<tr><td>Manga</td><td>&nbsp;17,5&nbsp;</td><td>&nbsp;17,5&nbsp;</td><td>&nbsp;18,5&nbsp;</td></tr>
<tr><td>Largura</td><td>46,5</td><td>49,5</td><td>50</td></tr>
<tr><td>Compr</td><td>66,5</td><td>69,5</td><td>71</td></tr>
</table></td>

</table>
</td>


<tr>
<tr><td>Descricao</td></tr>
<tr><td><textarea rows='10' cols='40' disabled>
".$descprod."
</textarea></tr></td>
<tr>  <td> <!--Tamanho
&nbsp&nbsp&nbsp<select name='tamprod2'>
<option value='1' selected>Selecione</option>
<option value='2' >P</option>
<option value='3' >M</option>
<option value='4' >G</option>
</select> -->
&nbsp&nbsp Preco &nbsp; &nbsp; R$ &nbsp;".$precoprod."
</td> 

</tr>
<td>Quantidade
<select name='tamprod2'>
<option value='0' selected>Selecione</option>
<option value='1' >1</option>
<option value='2' >2</option>
<option value='3' >3</option>
<option value='4' >4</option>
<option value='4' >5</option>
</select>
<button href='inserecar.php' class='button'>Comprar</button>
</td>
</tr>
</table>

<div class='fb-comments' data-href='127.0.0.1/cusko/".$nomeprod.".php' data-width='470' data-num-posts='10'></div>
     	
<BR>
<BR>
		
<div class='fb-like' data-href='https://pt-br.facebook.com/usecusko' data-send='true' data-layout='button_count' 
data-width='450' data-show-faces='true' data-font='arial'></div>
 </div>
        
        
			

<div class='rodape-div'><p>Loja Cusko</p></div>		
</div>
         <div class='dir-div'>								
            <h4>Menu</h4>
            <br>
            <div id='menuvert'>
			<ul>

            <ul class='maisartigos escuro top8'>
            
            <li><a href='#' title='Camisas Masculinas'>Camisas Masculinas</a></li>
            <li><a href='#' title='Camisas Femininas'>Camisas Femininas</a></li>
            <li><a href='#' title='Calcas Masculinas'>Calcas Masculinas</a></li>
            <li><a href='#' title='Calcas Femininas'>Calcas Femininas</a></li>
            <li><a href='#' title='Bermudas Masculinas'>Bermudas Masculinas</a></li>
            <li><a href='#' title='Shorts Femininos'>Shorts Femininos</a></li>
			<li><a href='#' title='Acessorios'>Acessorios</a></li>
			<br>   
			     
            </ul>
            </div>
            <br>
            <h4>Busca De Produtos</h4>
            <br>      
        	<input name='login' type='text' id='login' placeholder='Nome ou Descrição' size='20' maxlength='60'/>
        	<input name='btnsearchprod' class='button' type='submit' size='2' id='btnsearchprod' value='Buscar' />
        	<br>
        	<br>
        	<!-- Like Button Facebook -->
        	<div id='fb-root'></div>        	
			<div class='fb-like' data-href='https://pt-br.facebook.com/usecusko' data-send='true' data-layout='button_count' 
			data-width='450' data-show-faces='true' data-font='arial'></div>
		</div>
		
</div>
				<!-- Script para se conectar ao Facebook -->
				<script>(function(d, s, id) {
  				var js, fjs = d.getElementsByTagName(s)[0];
  				if (d.getElementById(id)) return;
 					js = d.createElement(s); js.id = id;
  				js.src = '//connect.facebook.net/en_US/all.js#xfbml=1';
  				fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>



", FILE_APPEND);

if($result>=1)
{
//header("refresh:5; url=cadprod.php");
echo "<h1> <a href=cadprod.php> Produto Cadastrado. Clique"; echo " aqui para Voltar</a>.</h1>";
}

//mysql_free_result($result);

//mysqli_close($con);
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
            <h4>Área dDo Usuário</h4>
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