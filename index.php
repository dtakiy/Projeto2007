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
        		<table border=0>
        		<form name="input" action="auth.php" method="post">  
        		<td><a  title="login"><h8>Login</h8> <input name="login" type="text" id="login" size="20" maxlength="40" /></td>
				<td><a  title="senha"><h8>Senha</h8><input name="senha" type="password" id="senha" size="20" maxlength="40" /></td>
				
				</a>
			    <td><input name="btn_logar" class="button entrar" type="submit" id="btn_logar" value="Logar" /> </td>
			    <td><a href="cadusr.php" class="button">Cadastrar</a></td>
			    <td><a href="recsenha.php" class="button">Esqueceu Senha?</a></td>
			    
			    </td>
			    </table>	
			  	</form>
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
  <li><a href='produtos.php'><span>Produtos</span></a></li>
  <li><a href='quemsomos.php'><span>Quem Somos</span></a></li>
  <li><a href='contato.php'><span>Contato</span></a></li>
  <li><a href='carr.php'><span>Carrinho</span></a></li>
</ul>
</div>				                          
            </ul>
        </div>
        
        <div class="esq-div">
		      
        	<div class="destaques-div">
            <h5>Produtos em Destaque</h5>
			
			<?php
			require_once("conf.php");
			echo "
			<br/><br/>
			<table border=0>
			<tr>
			<form name='myform' action='editarprod.php' method='POST'> <div align='center'><br>
			
";

$result = mysql_query("SELECT * FROM produtos where destaque=1");
while ($row = mysql_fetch_assoc($result)) {
	
	echo "<center>";
	echo "<tr>";
	echo "<td> <font size='2.5' color='white'>".$row['nome_produto'];
	echo "</td>";
	echo "</tr>";
	echo "<br>";
	echo "<tr><td><a href='".$row['nome_produto'].".php'><img src='".$row['imagem']."'height='130' width='130' name='eimg'></tr></td>";
	echo "<td> <font size='2.5' color='white'>Preço R$ ".$row['preco_produto'];
	echo "</tr>";
	echo "<td>";
	echo "<font size='2.5' color='white'> Tamanho";
    echo "<select name='tamprod'>";
	echo" <option value='1' selected>Selecione</option>";
	echo" <option value='2' >P</option>";
	echo" <option value='3' >M</option>";
	echo" <option value='4' >G</option>";
	echo" <option value='5' >GG</option>";
	echo "</select>";
	echo "</td>";
	echo "<tr><td>";
    echo "<font size='2.5' color='white'>QTD &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    echo "<select name='tamprod'>";
	echo" <option value='1' selected>Selecione</option>";
	echo" <option value='2' >1</option>";
	echo" <option value='3' >2</option>";
	echo" <option value='4' >3</option>";
	echo" <option value='5' >4</option>";
	echo" <option value='6' >5</option>";
	echo "</select>";
	echo "</td>";
	echo "</tr></td>";
	echo "<tr>";
	echo "<td><a href='inserecar.php' class='button'>Comprar</a></td>";
	echo "</tr>";
	echo "</center>";

}
echo "</table>";
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
