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
  <li><a href='quemsomos.php'><span>Quem Somos</span></a></li>
  <li><a href='#'><span>Contato</span></a></li>
  <li><a href='#'><span>Carrinho</span></a></li>
    <?php
echo "<form id=formlogout' name='formlogout' method='post' action='logout.php'>";
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
     <h5>Informações Pessoais</h5>
     <?php
     require_once("conf.php");
     echo "
		<form id='formulariousr' name='cadusr' method='post' onsubmit='return validar(this);' action='reqcadusrcmp.php'>
      	<br>
      	<br>
      	<table border=0  width=auto height=auto>
      	<tr>   
		";
		// colocar o session correta
		$result = mysql_query("SELECT * FROM usuarios where login='$usuario'");
		
		
		
		while ($row = mysql_fetch_assoc($result)) {
		
		$nome=$row['nome'];
		$datanasc=$row['datanasc'];
		$rg=$row['rg'];
		$cpf=$row['cpf'];		
		$end=$row['endereco'];
		$num=$row['numero'];
		$cmp=$row['complemento'];
		$cidade=$row['cidade'];
		$estado=$row['estado'];
		$cep=$row['cep'];
		$tel=$row['tel'];
		$cel=$row['cel'];
		$senha=$row['senha'];

		}
		$denome = base64_decode($nome);
		$derg = base64_decode($rg);
		$decpf = base64_decode($cpf);
		$dedatanasc = base64_decode($datanasc);
		$deend = base64_decode($end);
		$denum = base64_decode($num);
		$decmp = base64_decode($cmp);
		$decidade = base64_decode($cidade);
		$deestado = base64_decode($estado);
		$decep = base64_decode($cep);
		$detel = base64_decode($tel);
		$decel = base64_decode($cel);
		

		echo "<tr> ";
		echo "<td width='auto'><h7>Nome:</h7></td>";
		echo "<td> <input type='text' name='nomeusr'  size='auto' maxlength='60' value='".$denome."'></td>" ;
		echo "<td width='auto'><h7>CPF:</h7></td>";
		echo " <td width='auto'><input name='cpfusr' type='text' id='cpfusr' size='auto' maxlength='14' onkeypress='mascara(this,cpf)' onBlur='vcpf(formulariousr.cpfusr)' value='".$decpf."';/>" ;
	//	echo "<td width='auto'><h7>Data Nascimento:</h7></td>";
	//	echo "<td width='auto'> <input name='nascusr' type='text' id='nascusr' size='auto' maxlength='10' onkeypress='mascara(this,datamasc)' onBlur='vdata(formulariousr.nascusr)'; value='".$dedatanasc."'></td>";
		echo "</tr> ";
	//	echo "<tr> ";
	//	echo "<td width='auto'><h7>RG:</h7></td>";
	//	echo "<td width='auto'><input name='rgusr' type='text' onkeypress='mascara(this,rg)' id='rgusr' size='auto' maxlength='12' value='".$derg."' />";
		
	//	echo "</tr> ";
		echo "	  <tr>
	  <td width='auto'><h7>Endereço:</h7></td>
      <td width='auto'><input name='endusr' type='text'  id='endusr' size='auto' maxlength='60' min='0'value='".$deend."'/>
	  <td width='auto'><h7>Número:</h7></td>
      <td width='auto'><input name='nend' type='text'  id='nend' size='auto' maxlength='60' min='0'value='".$denum."'/>
      </tr>
      

      <tr>
      <td width='auto'><h7>Complemento:</h7></td>
      <td width='auto'><input name='compend' type='text' id='compend' size='auto' maxlength='58' min='0' value='".$decmp."'/>
	  <td width='auto'><h7>Cidade:</h7></td>
      <td width='auto'><input name='cidadeusr' type='text' id='cidadeusr' size='auto' maxlength='58' min='0'value='".$decidade."'/>
      </tr>
      
	  <tr>
	<td width='auto'><h7>Estado:</h7></td>
	<td width='auto'>											 
	<select name='estadosusr' id='estadosusr'>";
	switch ( $deestado ){
	case "AC":
		echo "<option value='AC' selected>AC</option>";
		break;
	case  "AL":
		echo "<option value='AL' selected>AL</option>";
		break;
	case  "AM":
		echo "<option value='AM' selected>AM</option>";
		break;
	case  "AP":
		echo "<option value='AP' selected>AP</option>";
		break;
	case  "BA":
		echo "<option value='BA' selected>BA</option>";
		break;
	case  "CE":
		echo "<option value='CE' selected>CE</option>";
		break;
	case "DF":
		echo "<option value='DF' selected>DF</option>";
		break;
	case  "ES":
		echo "<option value='ES' selected>ES</option>";
		break;
	case  "GO":
		echo "<option value='GO' selected>GO</option>";
		break;
	case  "MA":
		echo "<option value='MA' selected>MA</option>";
		break;
	case  "MG":
		echo "<option value='MG' selected>MG</option>";
		break;
		
	case "MS":
		echo "<option value='MS' selected>MS</option>";
		break;
	case  "MT":
		echo "<option value='MT' selected>MT</option>";
		break;
	case  "PA":
		echo "<option value='PA' selected>PA</option>";
		break;
	case  "PB":
		echo "<option value='PB' selected>PB</option>";
		break;
	case  "PE":
		echo "<option value='PE' selected>PE</option>";
		break;
	case "PI":
		echo "<option value='PI' selected>PI</option>";
		break;
	case  "PR":
		echo "<option value='PR' selected>PR</option>";
		break;
	case  "RJ":
		echo "<option value='RJ' selected>RJ</option>";
		break;
	case  "RN":
		echo "<option value='RN' selected>RN</option>";
		break;
	case  "RO":
		echo "<option value='RO' selected>RO</option>";
		break;
	case "RR":
		echo "<option value='RR' selected>RR</option>";
		break;
	case  "RS":
		echo "<option value='RS' selected>RS</option>";
		break;
	case  "SC":
		echo "<option value='SC' selected>SC</option>";
		break;
	case  "SE":
		echo "<option value='SE' selected>SE</option>";
		break;
	case  "SP":
		echo "<option value='SP' selected>SP</option>";
		break;
	case  "TO":
		echo "<option value='TO' selected>TO</option>";
		break;	
	
	default:
		echo "<option value='' selected >Selecione</option>";
}

echo"

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
";
    echo "<td width='auto'><h7>CEP:</h7></td>
    <td width='auto'><input name='cepusr' type='text' id='cepusr' onkeypress='mascara(this,cep)' size='auto' maxlength='9' min='0' value='".$decep."' />
	  </tr>
	  <tr>
      <td width='auto'><h7>Telefone:</h7></td>
      <td width='auto'><input name='telusr' type='text' onkeypress='mascara(this,telefone)' id='telusr'  size='auto' maxlength='14' value='".$detel."'  />
     <td width='auto'><h7>Celular:</h7></td>
      <td width='auto'><input name='celusr' type='text' onkeypress='mascara(this,celular)' id='celusr' size='auto' maxlength='15' min='0' value='".$decel."'/>
      </tr>
	  <tr>
      <td width='auto'><h7>Senha:</h7></td>
      <td width='auto'><input name='senusr' type='password' id='senusr'  size='auto' maxlength='14' value='".$senha."'  />
     <td width='auto'><h7>Confirmar Senha:</h7></td>
      <td width='auto'><input name='consenhusr' type='password'  id='consenhusr' size='auto' maxlength='15' min='0' value='".$senha."'/>
      </tr>
	  </table>
	  <br>
	  <br> 	   
	  <input name='btn_cadusrcmp' type='submit' class='button' id='btn_cadusr' value='Salvar' size='auto'  />
      <input name='limpar' type='reset' class='button' id='limpar' value='Clean' size='auto'/> 
	  </form>     
        </div>";
     ?>
      

		
<script>
	 function validar(formulariousr){
	 
	 // Cor Padrao do formulario para os campos

	 formulariousr.nomeusr.style.background="white";
	 formulariousr.nascusr.style.background="white";
	 formulariousr.rgusr.style.background="white";
	 formulariousr.cpfusr.style.background="white";
	 formulariousr.endusr.style.background="white";
	 formulariousr.cidadeusr.style.background="white"
	 formulariousr.estadosusr.style.background="white"
	 formulariousr.cepusr.style.background="white";
	 formulariousr.telusr.style.background="white";
	 formulariousr.celusr.style.background="white"
	 
	 	//caso campo nao esteja preenchido destacar campo se necessario

					if(formulariousr.nomeusr.value == ''){
					formulariousr.nomeusr.style.background="yellow";
					}
	
					//	if(formulariousr.nascusr.value == ''){
					//	formulariousr.nascusr.style.background="yellow";
					//	}
				
							//	if(formulariousr.rgusr.value == ''){
							//	formulariousr.rgusr.style.background="yellow";
							//	}
									if(formulariousr.cpfusr.value == ''){
									formulariousr.cpfusr.style.background="yellow";
									}
										if(formulariousr.endusr.value == ''){
										formulariousr.endusr.style.background="yellow";
										}
											if(formulariousr.cidadeusr.value == ''){
											formulariousr.cidadeusr.style.background="yellow";
											}
												if(formulariousr.estadosusr.value == ''){
												formulariousr.estadosusr.style.background="yellow";
												}
													if(formulariousr.cepusr.value == ''){
													formulariousr.cepusr.style.background="yellow";
													}
														if(formulariousr.telusr.value == ''){
														formulariousr.telusr.style.background="yellow";
														}
															if(formulariousr.celusr.value == ''){
															formulariousr.celusr.style.background="yellow";
															}
															
															   senha = formulariousr.senusr.value
															   senhaconf = formulariousr.consenhusr.value
															   if (senha != senhaconf){
																				formulariousr.senusr.value='';
																				formulariousr.consenhusr.value='';				
																				alert("Senhas divergentes por favor insira senha novamente")
																return false;		
																			   }
															
																//campos obrigatorios nao preenchidos emitir alerta
																if( formulariousr.nomeusr.value == '' || 
			 
																    formulariousr.endusr.value == '' || formulariousr.cpfusr.value == '' ||
																    formulariousr.estadosusr.value == '' || formulariousr.cidadeusr.value == '' ||
																    formulariousr.cepusr.value == '' || formulariousr.celusr.value == '' || 
																    formulariousr.telusr.value == ''){
																
																	alert("Existem Campos não preenchidos");
																	return false;
																}
																	
		//se preenchimento estiver correto true				
		else
		return true;	
	}

// caso data nao seja preenchida corretamente emitir alerta	
function vdata(data){
	exp = /\d{2}\/\d{2}\/\d{4}/
	if(!exp.test(data.value)){
	return 	alert('Data Invalida!');
	}		
}


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
	if(digitoGerado!=digitoDigitado)	
		alert('CPF Inválido!');		
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
//valida numero inteiro com mascara
function mascaraInteiro(){
	if (event.keyCode < 48 || event.keyCode > 57){
		event.returnValue = false;
		return false;
	}
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

function datamasc(v){  
    v=v.replace(/\D/g,"");                  
    v=v.replace(/(\d{2})(\d)/,"$1/$2");  
    v=v.replace(/(\d{2})(\d)/,"$1/$2");  
  
    v=v.replace(/(\d{2})(\d{2})$/,"$1$2");  
    return v;  
}
function cpf(v){  
    v=v.replace(/\D/g,"")                      
    v=v.replace(/(\d{3})(\d)/,"$1.$2")       //Coloca um ponto entre o terceiro e o quarto dígitos  
    v=v.replace(/(\d{3})(\d)/,"$1.$2")        
                                             
    v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2") //Coloca um hífen entre o terceiro e o quarto dígitos  
    return v  
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