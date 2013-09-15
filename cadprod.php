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

      <h5>Cadastrar Produtos</h5>
      <form id="formulario" name="formulario" method="post" onsubmit="return validar(this);" action="reqcadprod.php">
      <br>
      <br>
      <table border=0  width=300 height=200>   
      <td width="69"><h7>Nome:</h7></td>
      <td width="100"><input name="nomeprod" type="text" text-align:"right" id="nomeprod" size="50" maxlength="60" />
      </tr>
      <tr>
      <td width="69"><h7>Preço: R$</h7></td>
      <td width="100"><input name="precoprod" text-align:"right" type="text" id="precoprod" onkeypress="mascara(this,monetaria)" size="8" maxlength="60" />
      </tr>
      <tr>
      <td width="69"><h7>Quantidade:</h7></td>
      <td width="100"><input name="qtdprod" type="text" text-align:"right" onkeypress="mascara(this,numeros)" id="qtdprod" size="8" maxlength="60" min="0"/>
      </tr>
	  <tr>
      <td width="69"><h7>Peso: (g)</h7></td>
      <td width="100"><input name="pesoprod" type="text" text-align:"right" onkeypress="mascara(this,numeros)" id="pesoprod" size="8" maxlength="60" min="0" />
      </tr>
	  <tr>
      <td width="69"><h7>Categoria:</h7></td>
      <td width="100">
	  <select name="catprod">
		<option value="1" selected>Selecione</option>
		<option value="2">Camisas Masculinas</option>
		<option value="3">Camisas Femininas</option>
		<option value="4">Calças Masculinas</option>
		<option value="5">Calças Femininas</option>
		<option value="4">Bermudas Masculinas</option>
		<option value="5">Shorts Femininos</option>
		<option value="5">Acessórios</option>
	  </select>
      </tr>
	  <tr>
      <td width="69"><h7>Destaque:</h7></td>
      <td width="100">
	  <select name="destaqueprod">
		<option value="1" selected>Selecione</option>
		<option value="2">Sim</option>
		<option value="3">Não</option>
	  </select>
      </tr>
      <tr>
      <td width="69"><h7>Foto Produto:</h7></td>
      <td width="100"><input type="file" name="fotoprod" accept="image/x-png, image/gif, image/jpeg, image/jpg, image/bmp" />
      </tr>
      <tr>
      <td width="69"><h7>Descrição:</h7></td>
	  <td width="100"><textarea name="descprod" cols="50" rows="5"></textarea>
      </tr>
       
	  </table>
	  <br>
	  <br>
	  	   
	  <input name="btn_cadprod" class="button" type="submit" id="btn_cadprod" value="Cadastrar" size="40" />
      <input name="limpar" class="button" type="reset" id="limpar" value="Clean" size="40"/> 
	 
	  </form>     
        </div>
			
			
<script>
	 function validar(formulario){
	 
	 // Cor Padrao do formulario
	 
	 formulario.nomeprod.style.background="white";
	 formulario.precoprod.style.background="white";
	 formulario.qtdprod.style.background="white";
	 formulario.pesoprod.style.background="white";
	 formulario.catprod.style.background="white";
	 formulario.destaqueprod.style.background="white";
	 formulario.fotoprod.style.background="white";
	 formulario.descprod.style.background="white";
	 
	 	//caso campo nao esteja preenchido destacar campo se necessario
	 	
			if(formulario.nomeprod.value == ''){
			formulario.nomeprod.style.background="yellow";
			}
				if(formulario.precoprod.value == ''){
				formulario.precoprod.style.background="yellow";
				}
					if(formulario.qtdprod.value == ''){
					formulario.qtdprod.style.background="yellow";
					}
						if(formulario.pesoprod.value == ''){
						formulario.pesoprod.style.background="yellow";
						}
							if(formulario.catprod.value == '1'){
							formulario.catprod.style.background="yellow";
							}
								if(formulario.destaqueprod.value == '1'){
								formulario.destaqueprod.style.background="yellow";
								}
									if(formulario.fotoprod.value == ''){
									formulario.fotoprod.style.background="yellow";
									}
										if(formulario.descprod.value == ''){
										formulario.descprod.style.background="yellow";
										}
											//campos obrigatorios nao preenchidos emitir alerta
											if(formulario.nomeprod.value == '' || formulario.precoprod.value == '' ||
											formulario.pesoprod.value == '' || formulario.catprod.value == '1' || 
											formulario.destaqueprod.value == '1' || formulario.fotoprod.value == '' ||
											formulario.descprod.value == ''){
											
											alert("Existem Campos não preenchidos");
											return false;
											}
											
		//se preenchimento estiver correto							
		else
		return true;		
			}

			
//função para executar mascara
function mascara(objeto,funcao){  
    v_obj=objeto  
    v_fun=funcao  
    setTimeout("execmascara()",1)  
}  
function execmascara(){  
    v_obj.value=v_fun(v_obj.value)  
}

// mascara para valores monetarios
function monetaria(v){ 
v=v.replace(/\D/g,"")

v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2") // coloca ponto nos dois ultimos digitos
return v; 
} 

//mascara para aceitar apenas numeros
function numeros(v){  
    v=v.replace(/\D/g,"");                                      
    return v;  
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
