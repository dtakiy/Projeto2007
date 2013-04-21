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
			    <input name="btn_logar" type="submit" id="btn_logar" value="Logar" /> 
			  	</form>
			  	<br>
			  	<br>
				<li><a href="index.php" title="Pagina Inicial">Home</a></li>
				<li><a href="cadusr.php" title="Cadastrar Novo Usuário">Cadastrar</a></li>>
				<li><a href="#" title="Seu Carrinho">Carrinho</a></li>
				<li><a href="#" title="Mapa do Site">Mapa Do Site</a></li> 				
				<li><a href="#" title="Quem Somos">Quem Somos</a></li>
				<li><a href="#" title="Fale Conosco">Contato</a></li>
				                                  
            </ul>
        </div>
        
        <div class="esq-div">
		      
        	<div class="destaques-div">
            <h5>Produtos em Destaque</h5>
			
			Aqui Colocamos os Produtos em Destaque
          
        </div>
			

<div class="rodape-div"><p>TCC do JET</p></div>		
</div>
         <div class="dir-div">								
            <h4>Menu</h4>
            <ul class="maisartigos escuro top8">
            <li><a href="#" title="Camisas Masculinas">Camisas Masculinas</a></li>
            <li><a href="#" title="Camisas Femininas">Camisas Femininast</a></li>
            <li><a href="#" title="Calcas Masculinas">Calcas Masculinas</a></li>
            <li><a href="#" title="Calcas Femininas">Calcas Femininas</a></li>
            <li><a href="#" title="Bermudas Masculinas">Bermudas Masculinas</a></li>
            <li><a href="#" title="Shorts Femininos">Shorts Femininos</a></li>
			<li><a href="#" title="Acessorios">Acessorios</a></li>
            </ul>
            
            <h4>Busca De Produtos</h4>
            <br>      
        	<input name="login" type="text" id="login" size="20" maxlength="60"/>
        	<input name="btnsearchprod" type="submit" id="btnsearchprod" value="Buscar" /> 
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
