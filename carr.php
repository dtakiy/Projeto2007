<?php

session_start();
echo "";
//echo session_id();
$usuario = $_SESSION['usrlogin']; 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="estilo.css" />
<link rel='icon' rel='icon' href='favicon.ico' type='image/ico' />
<link rel='icon' rel='icon' href='favicon.ico' type='image/ico' />
<title>Cusko</title>
</head>
<body>
    <div class="global-div">
    	<div class="topo-div"></div>
        <div class="menu-div">
        	<ul>
        	<ul>
        	<?php
        	if($usuario=='')
        	{
        	echo "
        	    <table border=0>
        		<form name='input' action='auth.php'method='post'>  
        		<td><a  title='login'><h8>Login</h8> <input name='login' type='text' id='login' size='20' maxlength='40' /></td>
				<td><a  title='senha'><h8>Senha</h8><input name='senha' type='password' id='senha' size='20' maxlength='40' /></td>
				</a>
			    <td><input name='btn_logar' class='button entrar' type='submit' id='btn_logar' value='Logar' /> </td>
			    <td><a href='cadusr.php' class='button'>Cadastrar</a></td>
			    <td><a href='recsenha.php' class='button'>Esqueceu Senha?</a></td>
			    </td>
			    </table>	
			  	</form>        	
			  	<table>";
			  	}
        	?>
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

if ($usuario !='')
{
echo "<form id=formlogout' name='formlogout' method='post'  action='logout.php'>";
echo "<font size='2.5' color='white'>" .$nome;
echo "</font>";
echo "<input name='btn_logout' class='button' type='submit' id='btn_logout' value='Logout' size='40'  />";
echo "</form>";
}
else{
echo "";
}


?>
</ul>
</div>				                          
            </ul>
        </div>
        <div class="esq-div">
        	<div class="destaques-div">
            <h5>Carrinho</h5>
<?php
// Iniciamos nossa sessão que vai indicar o usuário pela session_id

require_once("conf.php");



// Recuperamos os valores passados por parametros
$acao   = $_GET['acao'];
$cod    = $_GET['cod'];
$cod2   = $_GET['cod2'];
$qtdpr = $_GET['carqtdprod'];
$preco  = 0;

$dataexp = time();
$dataexp = $dataexp + 1800;

if( $_SESSION['last_activity'] > $_SESSION['expire_time'] ) { //verifica se expirou
    //redirect to logout.php
    
	$result2 = mysql_query("SELECT * FROM carrinho where timestamps < $dataexp");			
	while ($row = mysql_fetch_assoc($result2)) {
		$id = $row['id'];
		$res = mysql_query("DELETE FROM carrinho where id=$id");
	}    
    
    echo "<meta HTTP-EQUIV='REFRESH' content='0; url=http://localhost/cusko/erro.php'>";
} 
    
    else{ //if we haven't expired:
    $_SESSION['last_activity'] = time(); //momento da ultima atividade
	}


if ($acao == "incluir")
{
	
	$data = time();
	$data = $data + 1800; //aprox 30 min para expirar do carrinho

	// Verificamos se o produto referente ao $cod já está no carrinho para o session id correnpondente
	$query_rs_carrinho = "SELECT * FROM carrinho WHERE carrinho.cod = '".$cod."'  AND carrinho.sessao = '".session_id()."'";
	$rs_carrinho = mysql_query($query_rs_carrinho);
	$row_rs_carrinho = mysql_fetch_assoc($rs_carrinho);
	$totalRows_rs_carrinho = mysql_num_rows($rs_carrinho);
		
	// Verificamos se cod do produto é diferente de vazio
	if ($cod != ''){
	$query_rs_carrinho = "SELECT * FROM carrinho WHERE carrinho.cod = '".$cod."'  AND carrinho.sessao = '".session_id()."'";
	$rs_carrinho = mysql_query($query_rs_carrinho);
	$row_rs_carrinho = mysql_fetch_assoc($rs_carrinho);
	$totalRows_rs_carrinho = mysql_num_rows($rs_carrinho);
	
	if ($totalRows_rs_carrinho == 0){
	$query_rs_produto = "select * from produtos where idprodutos = '".$cod."'";
	$rs_produto = mysql_query($query_rs_produto);
	$row_rs_produto = mysql_fetch_assoc($rs_produto);
	$totalRows_rs_produto = mysql_num_rows($rs_produto);
	
	// verifica a qtd do produto tem que ser maior que 0 para incluir
	
	$nqtd=$row_rs_produto['qtd_produto'];
	
	// Se total for maior que zero esse produto existe e esta disponivel então podemos incluir no carrinho
				if ($totalRows_rs_produto > 0 && $nqtd > 0)
				{
					$registro_produto = mysql_fetch_assoc($rs_produto);
					// Incluimos o produto selecionado no carrinho de compras
					$add_sql = "INSERT INTO carrinho (id, cod, nome, preco, qtd,peso,sessao,imgprod,timestamps)
					VALUES
					('','".$row_rs_produto['cod_produto']."','".$row_rs_produto['nome_produto']."','".$row_rs_produto['preco_produto']."','1','".$row_rs_produto['peso_prod']."','".session_id()."','".$row_rs_produto['imagem']."',$data)";		
					$rs_produto_add = mysql_query($add_sql);
				}
					else if ($nqtd == 0){
					
					echo "Desculpe-nos Mas Este Produto Está Indisponível No Momento";
					
				   }
	}
	
  }
}

// Verificamos se a acao é igual a excluir
if ($acao == "excluir")
{
	// Verificamos se cod do produto é diferente de vazio
	if ($cod2 != '')
	{			
			// Verificamos se o produto referente ao $cod  está no carrinho para o session id correnpondente
			$query_rs_car = "SELECT * FROM carrinho WHERE cod = '".$cod2."'  AND sessao = '".session_id()."'";
			$rs_car = mysql_query($query_rs_car);
			$row_rs_carrinho = mysql_fetch_assoc($rs_car);
			$totalRows_rs_car = mysql_num_rows($rs_car);
			
			// Se encontrarmos o registro, excluimos do carrinho
			if ($totalRows_rs_car > 0)
			{
				$sql_carrinho_excluir = "DELETE FROM carrinho WHERE cod = '".$cod2."' AND sessao = '".session_id()."'";	
				$exec_carrinho_excluir = mysql_query($sql_carrinho_excluir);
				
			}
		
	}
}

// Verificamos se a ação é de modificar a quantidade do produto
if ($acao == "modifica")
{

	$result2 = mysql_query("select * from produtos where cod_produto = '".$cod."'");
	while ($row = mysql_fetch_assoc($result2)) {
	$qtd_estoque = $row['qtd_produto'];
	}
		
	
	$qtdpr=$qtdpr+1;
	if($qtdpr <= $qtd_estoque){
		// Fazemos nosso update nas quantidades dos produtos
		$sql_modifica = "UPDATE carrinho SET qtd ='$qtdpr' WHERE  cod ='$cod' AND sessao = '".session_id()."'";
		$rs_modifica = mysql_query($sql_modifica);
	}
		else{
		echo "<BR>";
		echo "<BR>";
		echo "Está Quantidade Não Está Disponível Em Estoque";
		$qtdpr=$qtdpr-1;
		}
}


if ($acao == "modificamenos")
{
	echo "passo";
	
//	echo $qtdpr;
	$qtdpr=$qtdpr-1;
//	echo "resultado";
//	echo $qtdpr;

	if($qtdpr>=1){
		// Fazemos nosso update nas quantidades dos produtos
		$sql_modifica = "UPDATE carrinho SET qtd ='$qtdpr' WHERE  cod ='$cod' AND sessao = '".session_id()."'";
		$rs_modifica = mysql_query($sql_modifica);
	
		}
			// quantidade nao deve ser menor do que zero
			else{
			$qtdpr=0;
			}
			
}

?>

<?php

echo "
<table border=1>
<tr>
<form name='carfor' action='checkout.php' method='POST'> <div align='center'><br>
<th>Nome</th><th>Foto</th><th>Preço</th><th>Quantidade</th><th></th>
";

$result = mysql_query("SELECT * FROM carrinho WHERE carrinho.sessao = '".session_id()."'");


while ($row = mysql_fetch_assoc($result)) {
	$precop=$row['preco'];
	$precoprod = str_replace(".",",",$precop);
	$preco=$preco+$row['preco']*$row['qtd'];


	echo "<tr>";
//	echo "<td> <input type='radio' id='carradio' name='carradio' value='".$row['cod_produto']."'></td>" ;
//	echo "<td> <input type='text'  name='carcodprod'  disabled  size='8' value='".$row['cod']. "'></td>" ;
	echo "<td> <input type='text'  name='carnomeprod' disabled size='15' value='".$row['nome']."'></td>" ;
	echo "<td> <img src='".$row['imgprod']." 'height='60' width='60'  name='prod'></td>" ;
	echo "<td> <input type='text'  name='carprecopro' disabled size='15' value='".$precoprod. "'></td>" ;
	echo "<td> <input type='text'  name='carqtdprod' id='carqtdprod'  size='5' value='".$row['qtd']. "'>" ;
	echo "<div align='auto' style='font-size:7px;font-family:Verdana'><a href='carr.php?&acao=modifica&cod=".$row['cod']."&carqtdprod=".$row['qtd']."' class='button'>+</a></div><br>";
	echo "<div align='auto'style='font-size:7px;font-family:Verdana'><a href='carr.php?&acao=modificamenos&cod=".$row['cod']."&carqtdprod=".$row['qtd']."' class='button'>-</a></div><br></td>";
//	echo "<td><select name='carqtdprod' size='auto'>
//		<option value='1'>1</option>
//		<option value='2'>2</option>
//		<option value='3'>3</option>
//		<option value='4'>4</option>
//		<option value='5'>5</option>
//	  </select></td>";
	echo"<td><div align='center' style='font-size:10px;font-family:Verdana'><a href='carr.php?&acao=excluir&cod2=".$row['cod']."' class='button'>Excluir</a></div><br></td>";
	echo "</tr>";
	
	$peso_produto=$peso_produto+$row['peso_prod']*$row['qtd'];
		
}
echo "</table>";
//echo "<a href='checkout.php' class='button' size=9  id='btn_checkout'/>Fechar Conta</a>";

	
		  	if($usuario!=''){
		  	$resultqry = mysql_query("select * from usuarios where login='$usuario'");
	
		  		while ($row = mysql_fetch_assoc($resultqry)) {
		  
		  		$cep    = $row['cep'];
		  		$end    = $row['endereco'];
		  		$num    = $row['numero'];
		  		$cmp    = $row['complemento'];
		  		$cidade = $row['cidade'];
		  		$estado = $row['estado'];
		  		$cpf    = $row['cpf'];
		  		$tel    = $row['tel'];
		  		$cel    = $row['cel'];
		  	    $nome   = $row['nome'];
		  		$email  = $row['email'];
		  		
		  		$cepdecripto = base64_decode($cep);
		  		$enddecripto = base64_decode($end);
		  		$numdecripto = base64_decode($num);
		  		$cmpdecripto = base64_decode($cmp);
		  		$cidadedecripto = base64_decode($cidade);
		  		$estadodecripto = base64_decode($estado);
		  		$cpfdecripto = base64_decode($cpf);
		  		$teldecripto = base64_decode($tel);
		  		$celdecripto = base64_decode($cel);
		  		$nomedecripto = base64_decode($nome);
		  		$emaildecripto = base64_decode($email);
		  		
		  		
		  		}
		  		
	//	  echo "<input name='btn_chekout' class='button' type='submit' id='btn_chekout' value='Fechar Conta' size='9'/>";
	//	  echo "</form>";
		  
		  echo"
		  <table border=0>
		  <td>Nome:</td>
		  <td><input name='nomeckt' type='text' id='nomeckt' value='".$nomedecripto."'   size='15' maxlength='9' min='0' ' /></td>
		  <td>Email:</td>
		  <td><input name='emailckt' type='text' id='emailckt' value='".$emaildecripto."'   size='15'  ' /></td>
		  <tr></tr>
		  <td>Endereço:</td>
		  <td><input name='endckt' type='text' id='endckt' value='".$emaildecripto."'   size='15'  ' /></td>
		  <td>Numero:</td>
		  <td><input name='numckt' type='text' id='numckt' value='".$numdecripto."' ' /></td>
		  <td>Complemento:</td>
		  <td><input name='cmpckt' type='text' id='cmpckt' value='".$cmpdecripto."' ' /></td>
		  <tr></tr>
		  <td>CEP:</td>
		  <td><input name='cepckt' type='text' id='cepckt' value='".$cepdecripto."' onkeypress='mascara(this,cep)' size='15' maxlength='9' min='0' ' /></td>
		  <td>Cidade:</td>
		  <td><input name='cidadeckt' type='text' id='cidadeckt' value='".$cidadedecripto."'   size='15' maxlength='9' min='0' ' /></td>
		  <tr></tr>
		  <td>Estado:</td>
		  <td><input name='cidadeckt' type='text' id='estadockt' value='".$estadodecripto."'   size='15' maxlength='9' min='0' ' /></td>
		  <td><a href='cadusrcmp.php' class='button'>Atualizar Cadastro</a></td>
		  </table>";
		  echo "<input name='btn_chekout' class='button' type='submit' id='btn_chekout' value='Fechar Conta' size='9'/>";
		  echo "</form>";
		//  echo "<input name='btn_chekout' class='button' type='submit' id='btn_atualiza' value='Atualizar Frete' size='9'/>";
		 // echo "</form>";
		
		  
		  
		 // tirando o - do cep
		 $cepreplace = str_replace("-", "", $cepdecripto);
	   	 include("calcfrete.php");
	     $valorfrete = calcula_frete('40010','13901150',$cepreplace,'0.5');
	     
	     // troca , por .
	     $valorfrete2 = str_replace(",",".",$valorfrete);
	     
	     echo "<BR>";
	     echo "<td><h7>Valor Frete: R$".$valorfrete."</td></h7>";
	     
		  }
		  else{
		  echo "<BR>";
		  echo "Usuário não Registrado, Faça o Login ou Registre-se para continuar comprando";
		  }
		  
	
		//<tr><a href='calcfrete2.php'  class='button' size=9  id='btn_frete'/>Calcular Frete</a> </tr>
		  
		// Calcula Preco final que eh igual ao preco dos prod junto com o frete
	
		$precofinal = $valorfrete2 + $preco;
		
		//setando o formato monetario
		$precofinal2= number_format($precofinal,2);
		$precofinal2 = str_replace(".",",",$precofinal2);
		
		echo "<table border =0>
		<th><h7>Preço Total</h7></th>
		<tr>
		<td><h7>Valor: R$:</td>
		<td><h7>$precofinal2</h7></td>
		</tr>";
		?>
<br>
<br>
</table>
	  <br>
	  <br>
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
				</script>
</body>
</html>