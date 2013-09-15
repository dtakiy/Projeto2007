<?php 
require_once("conf.php");
// email do consumidor
$codigo= $_POST["codpass"];
$email= $_POST["emailpass"];
$emailcript = base64_encode($email);

$result = mysql_query("SELECT * FROM USUARIOS where senha='$codigo' and email='$emailcript'");

$numero = mysql_num_rows($result);

if($result){

	while ($row = mysql_fetch_assoc($result)) {
	
	$login=$row['login'];
	
	echo "
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
		      
        	<div class='destaques-div'>
			
      <h5>Digite Nova Senha</h5>
	  <form id='formnewpass' name='formnewpass' method='post' onsubmit='return validar(this);' action='newpass.php?acao=$emailcript'>
	  <table border=0  width=auto height=auto>
	  <td width='auto'><h7>Senha:</h7></td>
      <td width='auto'><input name='senusr' type='password' id='senusr'  size='auto' maxlength='14'   />
      <td width='auto'><h7>Confirmar Senha:</h7></td>
      <td width='auto'><input name='consenhusr' type='password'  id='consenhusr' size='auto' maxlength='15' min='0' />
      </tr>
	  </table>
	  <br>
	  <br> 	   
	  <input name='btn_recopass' type='submit' class='button' id='btn_recopass' value='Confirmar' size='auto'  />
      <input name='limpar' type='reset' class='button' id='limpar' value='Clean' size='auto'/> 
	  </form>     
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
     
            <h4>Area Do Usu‡rio</h4>
            <br>
            <div id='menuvert'>
            <br> 
            <li><a href='cadusrcmp.php' title='Editar Informações'>Editar Informações</a></li>   
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
	";
	}
	
	
	
if($numero < 1){
	echo "
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
		      
        	<div class='destaques-div'>
			
      <h5>Dados Incorretos</h5>
   <h1><font color='black'> E-mail E / OU Codigo Incorreto </font></h1>
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
     
            <h4>Area Do Usu‡rio</h4>
            <br>
            <div id='menuvert'>
            <br> 
            <li><a href='cadusrcmp.php' title='Editar Informações'>Editar Informações</a></li>   
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
	";
}

}
?>

    <script>
	 function validar(formnewpass){
	 
	 formnewpass.senusr.style.background="white";
	 formnewpass.consenhusr.style.background="white";
	 
	 
	 if(formnewpass.senusr.value == ''){
		formnewpass.senusr.style.background="yellow";
		}
			if(formnewpass.consenhusr.value == ''){
			formnewpass.consenhusr.style.background="yellow";
			}
			
			
			if(formnewpass.senusr.value == '' || formnewpass.consenhusr.value == '' ){															
				
                                    alert("Existem Campos nˆo preenchidos");
                                    return false;
                                    }
	 
	 
	 	senha = formnewpass.senusr.value
	 	senhaconf = formnewpass.consenhusr.value
	 	 if (senha != senhaconf){
			formnewpass.senusr.value='';
			formnewpass.consenhusr.value='';				
        	alert("Senhas divergentes por favor insira senha novamente")
		 	return false;		
        }
        else
        return true;
	 }
    </script>  

</body>
</html>
