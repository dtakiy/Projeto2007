<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="estilo.css" />
<title>Loja Do Jet</title>
</head>

<body>
    <div class="global-div">
    	<div class="topo-div"></div>
        <div class="menu-div">
        	<ul>
        	<ul>
        		<form name="input" action="auth.php" method="post">  
        		<a  title="login"><h8>Login</h8> <input name="login" type="text" id="login" size="20" maxlength="40" />
				<a  title="senha"><h8>Senha</h8><input name="senha" type="text" id="senha" size="20" maxlength="40" />
				</a>
			    <input name="btn_logar" class="button entrar" type="submit" id="btn_logar" value="Logar" /> 
			    <a href="cadusr.php" class="button">Cadastrar</a>
			    	
			  	</form>
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
        
        <div class="esq-div">
		      
        	<div class="destaques-div">
            <h5>Administrar Produtos</h5>
            
<?php
require_once("conf.php");
echo "
<br /><br />
<table border=1>
<tr>
<form name='myform' action='apagarprod.php' method='POST'> <div align='center'><br>
<th></th><th>Nome</th><th>Categoria</th><th>Quantidade</th><th>Preco</th><th>Imagem</th><th>Codprod</th><th></th><th></th>
";

$result = mysql_query("SELECT * FROM produtos");


while ($row = mysql_fetch_assoc($result)) {

	echo "<tr>";
	echo "<td> <input type='radio' name='nome' value='".$row['codigo_prod']."'></td>" ;
	echo "<td>" .$row['nome']. "</td>";
	echo "<td>" .$row['categoria']. "</td>";
	echo "<td>" .$row['quantidade']. "</td>";
	echo "<td>" .$row['preco']. "</td>";
	echo "<td><img src='".$row['imagem']."'height='30' width='30'></td>";
	echo "<td>" .$row['codigo_prod']. "</td>";	


	echo "</tr>";

}
echo "</table>";
	echo "<td> <button type='submit' name='action' value='apagar' class='button apagar'> Apagar Produto</a> </td>";
	echo "<td> <button type='submit' name='action' value='editar' class='button editar'> Editar Produto</a> </td>";
	echo "</form>";   
	?>	
     <br>
         <button  class='button adicionar'> Adicionar Produto</a>
		 <button  class='button'> Pesquisar Produto</a>    
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
