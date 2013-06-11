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
            <h5>Administrar Produtos</h5>
            
<?php
require_once("conf.php");
echo "

<br /><br />
<table border=1>
<tr>
<form name='myform2' action='editarprod.php' method='POST'> <div align='center'><br>
<th>Selecione</th><th>Codigo Prod</th><th>Nome</th><th>Categoria</th><th>Quantidade</th><th>Preco</th><th>Imagem</th><th>Desatque</th><th>Descricao</th><th>Status</th>
";

$result = mysql_query("SELECT * FROM produtos");

				
while ($row = mysql_fetch_assoc($result)) {

	$cat = $row['cat_produto'];
	$dst = $row['destaque'];


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
	
	echo "<tr>";
	echo "<td> <input type='radio' name='rcod' value='".$row['cod_produto']."'></td>" ;
	echo "<td> <input type='text'  name='ecod'  disabled  size='8' value='".$row['cod_produto']. "'></td>" ;
	echo "<td> <input type='text'  name='enome2' disabled size='15' value='".$row['nome_produto']."'></td>" ;
	echo "<td> <input type='text'  name='ecat' disabled size='15' value='".$cat_value. "'></td>" ;
	echo "<td> <input type='text'  name='eqtd' disabled size='5' value='".$row['qtd_produto']. "'></td>" ;
	echo "<td> <input type='text'  name='eprc' disabled size='5' value='".$row['preco_produto']. "'></td>" ;
	echo "<td><img src='".$row['imagem']."'height='30' width='30' name='eimg'></td>";
	echo "<td> <input type='text' name='edst' disabled size='5' value='".$dest_value."'></td>" ;
	echo "<td> <input type='text' name='edesc' disabled size='5' value='".$row['descricao']."'></td>" ;
	echo "<td> <input type='text' name='edesc' disabled size='5' value='".$row['status_prod']."'></td>" ;
	
	echo "</tr>";

}

echo "</table>";
    
	echo "<td>  <a href='cadprod.php'  class='button adicionar'> Adicionar Produto</a> </td>";
?>
<button type='submit' name='action' value='apagar' onclick="return confirm('Are you sure you want to submit?')" class='button apagar'> Apagar Produto</a>
<?php
	echo "<td> <button type='submit' name='action' value='editar' class='button editar'> Editar Produto</a> </td>";
//	echo "<td> <a href='buscaprod.php'> <button  class='button pesquisar'> Pesquisar Produto</a> </td>";
	echo "</form>";   
	?>	
     <br>
		
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
