<?php 
	session_start();
    $usuario = $_SESSION['usrlogin'];
    $tipo=$_SESSION['usrtipo'];
    $nome = $_SESSION['usrnome'];
	
	if($tipo==3){
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
</ul>
</div>				                          
            </ul>
        </div>
        <div class="esq-div">
        	<div class="destaques-div">
            <h5>Editar Usuário</h5>	
		
				
<?php
require_once("conf.php");
	
if ($_POST['action'] == 'apagarusr') {

$cod = "$_POST[elog]";

    if (empty($cod)) {
	echo "<h7><a href=admusr.php>  Por favor, selecione um usuario clique aqui para retornar</a></h7>";
}
	else{
$result = mysql_query("DELETE FROM USUARIOS WHERE idusuario=$cod");
echo "O Codigo Foi Apagado Com Sucesso";
echo $cod;
echo $result;
	}
}
  else if ($_POST['action'] == 'editarusr') {
  $id = "$_POST[elog]";
    if (empty($id)) {
	echo "<h7><a href=admusr.php>  Por favor, selecione um usuario clique aqui para retornar</a></h7>";
}
else{ 

  
  $result = mysql_query("SELECT * FROM usuarios where idusuario=$id");

  while ($row = mysql_fetch_assoc($result)) {

	$cod = $row['idusuario'];
	$log = $row['login'];
	$pass = $row['senha'];
	$tipo = $row['tipo'];
	$nome = $row['nome'];
	$status = $row['status'];
	
	$nomedecripto = base64_decode($nome);
	$email=$row['email'];
	$emaildecripto = base64_decode($email);
	$rg=$row['rg'];
	$rgdecripto = base64_decode($rg);
	$cpf=$row['cpf'];
	$cpfdecripto = base64_decode($cpf);
	$datanasc=$row['datanasc'];
	$datanascdecripto = base64_decode($datanasc);
	$endereco=$row['endereco'];
	$enderecodecripto = base64_decode($endereco);
	$cidade=$row['cidade'];
	$cidadedecripto = base64_decode($cidade);
	$cep=$row['cep'];
	$cepdecripto = base64_decode($cep);
	$estado=$row['estado'];
	$estadodecripto = base64_decode($estado);
	$tel=$row['tel'];
	$teldecripto = base64_decode($tel);
	$cel=$row['cel'];
	$celdecripto = base64_decode($cel);
	
	
}
// setando variaveis
   if($tipo==2){
   $cat_value="Consumidor";
   $cat=2;
   }
		else if($tipo==1){
		$cat_value="Administrador";
		$cat=1;
		}
		
				else{
				$cat_value="Sem Tipo";
				}
				
  // setando variaveis
   if($status==1){
   $status_value="Ativo";
   $status=1;
   }
		else if($status==2){
		$status_value="Inativo";
		$status=2;
		}
		
				else{
				$status_value="Sem Status";
				}
				
   // codigo HTML
   
echo "<table border=1>
<tr>
<form action='formeditusr.php' id='formedit' onsubmit='return validar(this)'; method='post' >
  <td width='69'> <h7>ID:</h7> </td>
  <td><input type='text' name='cid2' value='$cod'>
  <td width='69'> <h7>Login:</h7> </td>
  <td><input type='text' name='clog2' value='$log'>
  <td width='69'> <h7>Senha:</h7> </td>
  <td><input type='text' name='csenha2' value='$pass'>
</tr>
<tr>
  <td width='69'> <h7>Nome:</h7> </td>
  <td><input type='text' name='cnome2' value='$nomedecripto'>

  <td width='69'> <h7>Data Nasc:</h7> </td>
  <td><input type='text' name='cdata2' value='$datanascdecripto';>

   <td width='69'> <h7>Tipo: </h7> </td>;
   <td>
   <select name='ctipo2'>
   <option value='$cat' selected>$cat_value</option>
   <option value='1'>Administrador</option>
   <option value='2'>Consumidor</option>
   </select> </td>
</tr>
 <tr>
    <td width='69'> <h7>Status: </h7> </td>;
   <td>

   <select name='status2'>
   <option value='$status' selected>$status_value</option>
   <option value='1'>Ativo</option>
   <option value='2'>Inativo</option>
   </select> </td>
   
 
 

  <td width='69'> <h7>Email:</h7> </td>
  <td><input type='text' name='cemail2' value='$emaildecripto' onBlur='vemail(formedit.cemail2);'>


  <td width='69'> <h7>RG:</h7> </td>
  <td><input type='text' name='crg2' onkeypress='mascara(this,rg)' maxlength='12' value='$rgdecripto'>
</tr>
 <tr>
  <td width='69'> <h7>CPF:</h7> </td>
  <td><input type='text' name='ccpf2' value='$cpfdecripto' maxlength='14'  onkeypress='mascara(this,cpf)'>


  <td width='69'> <h7>Endereco:</h7> </td>
  <td><input type='text' name='cend2' value='$enderecodecripto'>

  <td width='69'> <h7>Número:</h7> </td>
  <td><input type='text' name='cnum2' value='$enderecodecripto'>
</tr>
 <tr>
  <td width='69'> <h7>Complemento:</h7> </td>
  <td><input type='text' name='ccomp2' value='$enderecodecripto'>


  <td width='69'> <h7>Cidade:</h7> </td>
  <td><input type='text' name='ccidade2' value='$cidadedecripto'>

  <td width='69'> <h7>Estado:</h7> </td>
  <td width='auto'>											 
	<select name='cestado2' id='cestado2'>
   <option value='' selected >$estadodecripto</option>
   		<option value='AC'>AC</option>
		<option value='AL'>AL</option>
		<option value='AM'>AM</option>
		<option value='AP'>AP</option>
		<option value='BA'>BA</option>
		<option value='CE'>CE</option>
		<option value='DF'>DF</option>
		<option value='ES'>ES</option>
		<option value='GO'>GO</option>
		<option value='MA'>MA</option>
		<option value='MG'>MG</option>
		<option value='MS'>MS</option>
		<option value='MT'>MT</option>
		<option value='PA'>PA</option>
		<option value='PB'>PB</option>
		<option value='PE'>PE</option>
		<option value='PI'>PI</option>
		<option value='PR'>PR</option>
		<option value='RJ'>RJ</option>
		<option value='RN'>RN</option>
		<option value='RO'>RO</option>
		<option value='RR'>RR</option>
		<option value='RS'>RS</option>
		<option value='SC'>SC</option>
		<option value='SE'>SE</option>
		<option value='SP'>SP</option>
		<option value='TO'>TO</option>
   </select>
		
</tr>
 <tr>
  <td width='69'> <h7>CEP:</h7> </td>
  <td><input type='text' name='cep2' onkeypress='mascara(this,cep)' maxlength='9' value='$cepdecripto'>

  <td width='69'> <h7>Tel:</h7> </td>
  <td><input type='text' name='ctel2' maxlength='14' onkeypress='mascara(this,telefone)' value='$teldecripto'>

  <td width='69'> <h7>Cel:</h7> </td>
  <td><input type='text' name='ccel2' maxlength='15' onkeypress='mascara(this,celular)' value='$celdecripto'>
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

/*      Mascaras           */

function cep(v){  
    v=v.replace(/\D/g,"")                    //Caso não for digito remover
    v=v.replace(/^(\d{5})(\d)/,"$1-$2")        
    return v  
}

function celular(v){  
    v=v.replace(/\D/g,"");            
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //expressao regular parênteses em volta dos dois primeiros dígitos  
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");    //expressao regular hífen entre o quarto e o quinto dígitos  
    return v;  
}   

function telefone(v){  
    v=v.replace(/\D/g,"");            //Caso não for digito remover
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); 
    v=v.replace(/(\d)(\d{4})$/,"$1-$2");
    return v;  
}

function rg(v){  
		v=v.replace(/\D/g,"");                               
        v=v.replace(/(\d)(\d{7})$/,"$1.$2");    //Coloca o . antes dos últimos 3 dígitos, e antes do verificador  
        v=v.replace(/(\d)(\d{4})$/,"$1.$2");    //Coloca o . antes dos últimos 3 dígitos, e antes do verificador  
        v=v.replace(/(\d)(\d)$/,"$1-$2");      //Coloca o - antes do último dígito  
    return v;  
}

function cpf(v){  
    v=v.replace(/\D/g,"")                      
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos  
    v=v.replace(/(\d{3})(\d)/,"$1.$2")        
                                             
    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2") //Coloca um hífen entre o terceiro e o quarto dígitos  
    return v  
}  

function vemail(email){	
    exp = /^([a-zA-Z0-9_.-])+@([a-zA-Z0-9_.-])+\.([a-zA-Z])+([a-zA-Z])+/;
	
    if(exp.test(email.value)){         
	  return true;
    }
	else{   
		alert("E-mail Inválido!"); 
		return false;
    }
}


/* 
Talvez use no futuro

function vcpf(Objcpf){
	var cpf = Objcpf.value;
	exp = /\.|\-/g
	cpf = cpf.toString().replace( exp, "" ); 
	var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
	var soma1=0, soma2=0;
	var vlr =11;
	
	//cpfs invalidos que são conhecidos
	if (cpf.length != 11 ||  cpf == "00000000000" ||  cpf == "11111111111" || 
        cpf == "22222222222" ||  cpf == "33333333333" ||  cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || 
        cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999"){
		alert('CPF Inválido!');		
		return false;
		}
	
	for(i=0;i<9;i++){
		soma1+=eval(cpf.charAt(i)*(vlr-1));
		soma2+=eval(cpf.charAt(i)*vlr);
		vlr--;
	}	
	soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
	soma2=(((soma2+(2*soma1))*10)%11);
	
	var digitoGerado=(soma1*10)+soma2;
	if(digitoGerado!=digitoDigitado){	

		alert('CPF Inválido!');
		
		return false;
		}
			
}

*/

function validar(formedit){

if(formedit.cnome2.value == ''){
formedit.cnome2.style.background="yellow";
}

	if(formedit.ccpf2.value == ''){
	formedit.ccpf2.style.background="yellow";
	}
		if(formedit.crg2.value == ''){
		formedit.crg2.style.background="yellow";
		}
			if(formedit.cend2.value == ''){
			formedit.cend2.style.background="yellow";
			}
					if(formedit.cep2.value == ''){
					formedit.cep2.style.background="yellow";
					}
						if(formedit.cnum2.value == ''){
						formedit.cnum2.style.background="yellow";
						}


return true;

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
