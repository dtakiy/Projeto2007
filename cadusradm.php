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
        		<form name="input" action="auth.php" method="post">  
        		<a  title="login"><h8>Login</h8> <input name="login" type="text" id="login" size="20" maxlength="40" />
				<a  title="senha"><h8>Senha</h8><input name="senha" type="text" id="senha" size="20" maxlength="40" />
				</a>
			    <input name="btn_logar" class="button entrar" type="submit" id="btn_logar" value="Logar" /> 
			    <a href="cadusr.php" class="button">Cadastrar</a>
			    	
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

      <h5>Cadastrar Usuário</h5>
     
      <form id="formulariousr" name="cadusr" method="post" onsubmit="return validar(this);" action="reqcadusradm.php">
      <br>
      <br>
      <table border=0  width=auto height=150>   
      <td width="auto"> <h7>Login: </h7> </td>
      <td width="auto"><input type="text" name="username" id="username" size="20" placeholder="Escolha um Login" onblur="checkUserName(this.value)" /> 
	  <span id="usercheck" style="padding-left:10px; ; vertical-align: middle;"></span>
      <tr>
      <td width="auto"><h7>Senha:</h7></td>
      <td width="auto"><input type="password" name="passusr" placeholder="Escolha uma Senha" type="text" id="passusr" size="20" maxlength="20" />
      </tr>
      <tr>
      <td width="auto"><h7>Confirma Senha:</h7></td>
      <td width="auto"><input type="password" name="conpassusr" placeholder="Confirme a Senha" type="text" id="conpassusr" size="20" maxlength="20" />    
      </tr>    
      <tr>
      <td width="auto"><h7>E-mail:</h7></td>
      <td width="auto"><input type="email" name="emailusr" placeholder="Insira seu E-Mail" type="text" id="emailusr" size="20" maxlength="60" onBlur="vemail(formulariousr.emailusr);" />
      </tr>
      <tr>
      <td width="auto"><h7>Digite o Código</h7></td>
      <td><img src="codigo_captcha.php"></td>
      </tr>
      <tr>
      <td></td>
      <td><input name="codigo" placeholder="Código da Figura" type="text" id="codigo2" size="20"></td>
      </tr>
	  </table>
	  <br>
	  <br> 	   
	  <input name="btn_cadusr" class="button" type="submit" id="btn_cadusr" value="Cadastrar" size="40"  />
      <input name="limpar" class="button" type="reset" id="limpar" value="Clean" size="40"/>
      <input name="atualizar" class="button" type="reset" value="Gerar Outra Imagem" size="15" onClick="window.location.href='JavaScript:location.reload(true);'">
	  </form>     
      </div>
<script>
	 function validar(formulariousr){
	 
	 // Cor Padrao do formulario para os campos
	 formulariousr.username.style.background="white";
	 formulariousr.passusr.style.background="white";
	 formulariousr.conpassusr.style.background="white";
     formulariousr.emailusr.style.background="white";
     formulariousr.codigo.style.background="white";

	 	//caso campo nao esteja preenchido destacar campo se necessario
	 	if(formulariousr.username.value == ''){
		formulariousr.username.style.background="yellow";
		}
			if(formulariousr.passusr.value == ''){
			formulariousr.passusr.style.background="yellow";
			}
				if(formulariousr.conpassusr.value == ''){
				formulariousr.conpassusr.style.background="yellow";
				}
                                    if(formulariousr.emailusr.value == ''){
                                    formulariousr.emailusr.style.background="yellow";    
                                    }
                                          if(formulariousr.codigo.value == ''){
                                    	  formulariousr.codigo.style.background="yellow";    
                                    	}

															
                                    //campos obrigatorios nao preenchidos emitir alerta
                                    if(formulariousr.username.value == '' || formulariousr.passusr.value == '' ||
                                    formulariousr.conpassusr.value == '' || formulariousr.emailusr.value == '' || 
                                    formulariousr.codigo.value == '' ){															
				
                                    alert("Existem Campos não preenchidos");
                                    return false;
                                    }
				   //verificar se a senha e confirmacao de senha sao as mesmas
				   senha = formulariousr.passusr.value
				   senhaconf = formulariousr.conpassusr.value
				   if (senha != senhaconf){
				   					formulariousr.passusr.value='';
				   					formulariousr.conpassusr.value='';				
                                    alert("Senhas divergentes por favor insira senha novamente")
				    return false;		
                                   }
		//se preenchimento estiver correto true				
		else
		return true;	
	}


function vemail(email){	
    exp = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
	
    if(exp.test(email.value)){         
	  return true;
    }
	else{
		formulariousr.emailusr.value='';
		alert("E-mail Inválido!"); 
		return false;
    }
}

</script>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript">

function checkUserName(usercheck)
{
	$('#usercheck').html;
	$.post("checkuser.php", {user_name: usercheck} , function(data)
		{			
			   if (data != '' || data != undefined || data != null) 
			   {				   
				  $('#usercheck').html(data);	
			   }
          });
}
</script>
	
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