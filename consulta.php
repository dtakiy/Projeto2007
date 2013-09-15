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
<title>Cusko</title>
</head>

<body>
    <div class="global-div">
    	<div class="topo-div"></div>
        <div class="menu-div">
        	<ul>
        	
        	<ul>
<?php
if ($usuario !='')
{
echo "";
}
else{
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
  <li><a href='produtos.php'><span>Produtos</span></a></li>
  <li><a href='quemsomos.php'><span>Quem Somos</span></a></li>
  <li><a href='contato.php'><span>Contato</span></a></li>
  <li><a href='carr.php'><span>Carrinho</span></a></li>
  
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
            <h5>Consultar Pedido</h5>
			
	<?php

$transaction = $_POST[codcompra];

$email = 'tccdojet@gmail.com';
$token = '7ABF4DAA06A74269AF1A39D79FD91162';
//$transaction = 'C2B7F135-FE5F-4744-AC67-659AAFA3BB86';
$url = 'https://ws.pagseguro.uol.com.br/v2/transactions/' . $transaction . '?email=' . $email . '&token=' . $token;

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$transaction= curl_exec($curl);
curl_close($curl);
 
if($transaction == 'Unauthorized') {
    //Insira seu código avisando que o sistema está com problemas, sugiro enviar um e-mail avisando para alguém fazer a manutenção
    echo 'You shall not pass';
    exit;//Mantenha essa linha para evitar que o código prossiga
}
 
$transaction = simplexml_load_string($transaction);
 
if(count($transaction -> error) > 0) {

    //Aviso que houve um problema no carregamento do site
    //var_dump($transaction); 
   
    echo "<h1>";
    echo "<font color='black'>";
    echo "<BR>";
    echo "Código Invalido por favor verique se o código está correto.";
    echo "<BR>";
    echo "Quaisquer dúvidas entre em contato conosco: adm@cusko.com.br";
    echo "</font>";
    echo " </h1>";
}
else{
$data  = $transaction -> lastEventDate;
$nomec = $transaction -> sender -> name;
$endc  = $transaction -> shipping -> address->street;
$numc  = $transaction -> shipping -> address->number;
$compc = $transaction -> shipping -> address->complement;
$cidadec = $transaction -> shipping -> address->city;
$estadoc = $transaction -> shipping -> address->state;
$cepc = $transaction -> shipping -> address->postalcode;
$emailc = $transaction -> sender -> email;
$valorc = $transaction -> grossAmount;
$valoruni = $transaction ->items->item->amount;
$statusc = $transaction -> status;
$decc= $transaction ->items->item->description;
$itemc= $transaction -> itemCount;
$itemc = $itemc-1;



if($statusc == 1){
$sts = "Aguardando pagamento";
}
	else if($statusc == 2){
	$sts = "Em análise";
	}
		else if($statusc == 3){
		$sts = "Paga";
		}
			else if($statusc == 4){
			$sts = "Disponível";
			}
				else if($statusc == 5){
				$sts = "Em Disputa";
				}
					else if($statusc == 6){
					$sts = "Devolvida";
					}
						else if($statusc == 7){
					$sts = "Cancelada";
					}
	


echo "<BR>";
echo "<table border=1 font size=2>
<th>Cod Compra</th><th>Status</th>
<tr>
<td>
<p>
<font size='1' color='black'>".$_POST[codcompra]."</td></font><font size='1'>".$sts."</td>
</tr>
</table>";

echo "<BR>";

echo "<table border=1 font size=2>
<th>Nome</th><th>Endereço</th><th>E_mail</th>
<tr>
<td>
<p>
<font size='1' color='black'>".$nomec."</td></font><td><font size='1'>".$endc." ".$numc. " " .$compc. " " .$cidadec. " " .$estadoc. "</td></font><td><font size='1'>".$emailc."</td></font>
</table>";

echo "<BR>";

echo "<table border=1 font size=2>
<th>Preço C / Frete</th>
<tr>
<td>
<p>
<font size='1' color='black'>".$valorc."</td>
</table>";

}

?>



        </div>
		<div class="rodape-div"></div>		<!-- <p>Loja Cusko</p> caso queira colocar frase dentro do rodape -->
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
            <BR>
         	<form id="buscaprod" name="buscaprod" method="post" action="reqbusprod.php"> <!-- productlistclient.php web -->
      	 	<table border=0  width=auto height=auto>   
      		<td width=auto><input type="text" name="buscarprod" placeholder="Nome do Produto" size=35 maxlength=auto />
      		<td> <input name="btn_cadusr" class="button" type="submit" id="btn_pesq_prod" value="Buscar" size=35  /> </td>
      		</table>
      		</form>
        	<br>
        	<br>
        	<h4>Consultar Pedido</h4>
            <BR>
			<form id="formconsult" name="formconsult" method="post" action="consulta.php">
      		<table border=0  width=auto height=auto> 
      		<td width="auto"><input type="text" name="codcompra" id="codcompra" size="35" placeholder="Código da Compra" /> </td>
      		<td><input name="btn_codcompra" class="button" type="submit" id="btn_codcompra" value="Pesquisar" size="35"  /></td>
      		</table>
      		</form>		  
		      
        	<!-- Like Button Facebook -->
        	<div id="fb-root"></div>        	
			<div class="fb-like" data-href="https://pt-br.facebook.com/usecusko" data-send="true" data-layout="button_count" 
			data-width="450" data-show-faces="true" data-font="arial"></div>
			<!-- Fallow Button Facebook -->
			<div class="fb-follow" data-href="https://www.facebook.com/usecusko" data-width="450" data-layout="button_count" data-show-faces="true"></div>

		
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
