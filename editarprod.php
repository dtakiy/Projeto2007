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
<body>
<?php
require_once("conf.php");
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
            <h5>Editar Produto</h5>
            
<br>
			
<?php
$cod = $_POST['rcod'];
if ($_POST['action'] == 'apagar') {

  if (empty($cod)) {
	echo "<h7><a href=admprod.php>  Por favor, selecione um produto clique aqui para retornar</a></h7>";
  }
  	else{
  $result1 = mysql_query("SELECT * FROM produtos where idprodutos=$cod");

  while ($row = mysql_fetch_assoc($result1)) {

	$nome = $row['nome_produto'];
}


$result4 = mysql_query("DELETE FROM PRODUTOS WHERE idprodutos=$cod");
$file = $nome.".php";
echo " <h7><a href=admprod.php> O arquivo ".$file." foi apagado,  clique aqui para retornar</a>";

unlink($file);
	
}
	}

  
  
  else if ($_POST['action'] == 'editar') {
  $cod = $_POST['rcod'];
  
  if (empty($cod)) {
	echo "<h7><a href=admprod.php>  Por favor, selecione um produto clique aqui para retornar</a></h7>".$cod;
  }
  	else{
  
  
  $result = mysql_query("SELECT * FROM produtos where idprodutos=$cod");

  while ($row = mysql_fetch_assoc($result)) {

	$cod = $row['idprodutos'];
	$nome = $row['nome_produto'];
	$cat = $row['cat_produto'];
	$qtd= $row['qtd_produto'];
	$prc= $row['preco_produto'];
	$img= $row['imagem'];
	$dst = $row['destaque'];
	$desc = $row['descricao'];
	$statusprod = $row['status_prod'];
}
// trocando . por ,
$precoprod2 = str_replace(".",",",$prc);

// setando variaveis nos input box
   if($cat==2){
   $cat_value="Camisas Masculinas";
   }
		else if($cat==3){
		
		$cat_value="Camisas Femininas";
		}
			else if($cat==4){
			$cat_value="Calcas Masculinas";
			}
				else{
				$cat_value="Sem Categoria";
				}
				
	if($dst==1){
	
	$dest_value="Sim";
	}
	 else if($dst==2){
	 $dest_value="Nao";
	 }
		else
		$dest_value="Nao Selecionado";


// setando variaveis
   if($statusprod==1){
   $status_value="Ativo";
   $status=2;
   }
		else if($statusprod==2){
		$status_value="Inativo";
		$status=1;
		}
		
				else{
				$status_value="Sem Defenição";
				}


   // codigo HTML

echo "<table border=1>
<form action='formedit.php' method='post'>
<tr>
  <td width='69'> <h7>Nome:</h7> </td>
  <td><input type='text'  name='enome2' value='$nome'>
</tr>
<tr>
   <td width='69'> <h7>Categoria: </h7> </td>
   <td>
   <select name='catprod2'>
   <option value='$cat' selected>$cat_value</option>
   <option value='2'>Camisas Masculinas</option>
   <option value='3'>Camisas Femininas</option>
   <option value='4'>Calcas Masculinas</option> 
   </select> </td>
 </tr>  
 <tr>
 
  <td width='69'> <h7>Quantidade:</h7> </td>
  <td><input type='text' style='text-align:right' size='5' onkeypress='mascara(this,numeros)' name='qtd2' value='$qtd' >
</tr>
 <tr>
  <td width='69'> <h7>Preco: R$</h7> </td>
  <td><input type='text' style='text-align:right' size='5' onkeypress='mascara(this,monetaria)' name='prc2' value='$precoprod2'>
</tr>
 <tr>
  <td width='69'> <h7>Imagem:</h7> </td>
  <td><img src='$img  'height='30' width='30'>&nbsp; &nbsp; &nbsp;
  <input type='file' style='text-align:right' name='editimg2' accept='image/x-png, image/gif, image/jpeg, image/jpg, image/bmp image/png' /></td>
</tr>
 <tr>
  <td width='69'><h7>Destaque:</h7></td>
  <td><select name='dest2'>
  <option value='$dest' selected>$dest_value</option>
  <option value='2'>Sim</option>
  <option value='3'>Nao</option>
  </select></td>
</tr> 
 <tr>
  <td width='69'> <h7>Desc:</h7> </td>
  <td><input type='text' style='text-align:right' name='desc2' value='$desc'>
</tr> 
<tr>
    <td width='69'> <h7>Status: </h7> </td>
   <td>

   <select name='statusprod'>
   <option value='$status' selected>$status_value</option>
   <option value='1'>Ativo</option>
   <option value='2'>Inativo</option>
   
   </select> </td>
</tr>
   
</tr>  
 <td> <input class='button' type='submit' name='submit' value='Salvar'></td>
</table>  
</form>";
   
   }
 
		}
		
?>

<script>
		//função para executar mascara
function mascara(objeto,funcao){  
    v_obj=objeto  
    v_fun=funcao  
    setTimeout("execmascara()",1)  
}  
function execmascara(){  
    v_obj.value=v_fun(v_obj.value)  
}

//mascara para aceitar apenas numeros
function numeros(v){  
    v=v.replace(/\D/g,"");                                      
    return v;  
}

function monetaria(v){ 
v=v.replace(/\D/g,"")

v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2") // coloca ponto nos dois ultimos digitos
return v; 
} 
</script>	      
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
            <li><a href="#" title="Calcas Masculinas">Calças Masculinas</a></li>
            <li><a href="#" title="Calcas Femininas">Calças Femininas</a></li>
            <li><a href="#" title="Bermudas Masculinas">Bermudas Masculinas</a></li>
            <li><a href="#" title="Shorts Femininos">Shorts Femininos</a></li>
			<li><a href="#" title="Acessorios">Acessórios</a></li>
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
