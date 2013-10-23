<?php
session_start();
echo "";
//echo session_id();
$usuario = $_SESSION['usrlogin']; 
$email = $_SESSION['email'];
$emailcripto = base64_decode($email);
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
			    <td><a href='cadusradm.php' class='button'>Cadastrar</a></td>
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
echo "<font size='2.5' color='white'>" .$emailcripto;
echo "</font>";
echo "<input name='btn_logout' class='button' type='submit' id='btn_logout' value='Logout' size='40'  />";
echo "</form>";
echo "<a href='cadusrcmp.php' title='Editar Informações'><font color='white'>  Editar Usuário</font></a> ";
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
        <h5>Produtos em Destaque</h5>
			
		<?php
require_once("conf.php");
require_once("conf2.php");

$max=4; // numero maximo de produtos por pagina

$pagina=$_GET["pagina"]; 
if ($pagina == "")
$pagina=1;
 
$inicio = $pagina - 1;
$inicio = $max * $inicio;
 
  
$sql = mysql_query("SELECT * FROM produtos where destaque=1 and status_prod=1 and qtd_produto >0",$con); 
$total=mysql_num_rows($sql);
 
if ($total == 0)
echo "Nenhum registro encontrado!";
else
{
echo "<BR>";

$sql = mysql_query("SELECT * FROM produtos where destaque=1 and status_prod=1 and qtd_produto >0 LIMIT $inicio,$max",$con); 
while ($row = mysql_fetch_assoc($sql)) {
echo "<table border=0>";
echo "<tr>";
echo "<td>";

			echo "
			<table border=0>
			<tr>
			<form action='buscar.php' method='get'> <div align='center'><br>";
	$preco=$row['preco_produto'];
	// trocando . por ,
	$precoprod = str_replace(".",",",$preco);

	echo "<center>";
	echo "<tr>";
	echo "<td> <font size='2.5' color='black'>".$row['nome_produto'];
	echo "</td>";
	echo "</tr>";
	echo "<br>";
	echo "<tr><td><a href='".$row['nome_produto'].".php'><img src='".$row['imagem']."'height='130' width='130' name='eimg'></tr></td>";
	echo "<td> <font size='2.5' color='black'>Preço R$ ".$precoprod;
	echo "</tr>";

	echo "</td>";
	echo "</tr></td>";
	echo "<tr>";
	echo "<td><div align='center' style='font-size:10px;font-family:Verdana'><a href='carr.php?cod=".$row['idprodutos']."&acao=incluir' class='button'>Comprar</a></div><br></td>";
	echo "</tr>";
	echo "</center>";
	echo "</table>";
    echo "</form>"; 
    echo "<td>";
}
	
	for($i =1; $i <= $max; $i++){
	echo "</table>";
	}
 

 
}
// Calculando pagina anterior
$menos = $pagina - 1;
// Calculando pagina posterior
$mais = $pagina + 1;
$pgs = ceil($total / $max);
if($pgs > 1 ) 
{
if($menos>0) 
echo "<a href=\"?pagina=$menos\" class='texto_paginacao'>Anterior</a> "; 
 
if (($pagina-4) < 1 )
$anterior = 1;
else
$anterior = $pagina-4;
 
if (($pagina+4) > $pgs )
$posterior = $pgs;
else
$posterior = $pagina + 4;
 
for($i=$anterior;$i <= $posterior;$i++) 
if($i != $pagina) 
echo " <a href=\"?pagina=".($i)."\" class='texto_paginacao'>$i</a>";
else 
echo " <strong class='texto_paginacao_pgatual'>".$i."</strong>";
 
if($mais <= $pgs) 
echo " <a href=\"?pagina=$mais\" class='texto_paginacao'>Proxima</a>";
}
	?>	
	
	 <h5>Produtos Recomendados</h5>

<?php

require_once "nusoap.php";
$client = new nusoap_client("http://www.francojet.net/productlistia.php?wsdl", true);
// Aqui colocar a pesquisa do carrinho e produtos



$query = mysql_query("SELECT * FROM carrinho WHERE carrinho.sessao = '".session_id()."'",$con); 
$numr = mysql_num_rows($query);
$listadeprodutos = array(); // vetor para guardar a lista de produtos

$contador2 = 0;


while ($row = mysql_fetch_assoc($query)) {
$produtocar = $row['nome'];
$listadeprodutos[] = $produtocar;
}


if($numr == 0){

while ($contador2 <=5){
$codp2 = $listadeprodutos[$contador2];
$error = $client->getError();
if ($error) {
    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
}
$n=0;
$result = $client->call("getProd", array("category" => "".$codp."","n" => "".$n.""));
$n=1;
$result2 = $client->call("getProd", array("category" => "".$codp."","n" => "".$n.""));
$n=2;
$result3 = $client->call("getProd", array("category" => "".$codp."","n" => "".$n.""));
$n=3;
$result4 = $client->call("getProd", array("category" => "".$codp."","n" => "".$n.""));
$n=4;
$result5 = $client->call("getProd", array("category" => "".$codp."","n" => "".$n.""));

if ($client->fault) {
    echo "<h2>Fault</h2><pre>";
    print_r($result);
    echo "</pre>";
}
else {
    $error = $client->getError();
    if ($error) {
        echo "<h2>Error</h2><pre>" . $error . "</pre>";
    }
    else {
	if($contador2 == 0){
	$res = mysql_query("SELECT * FROM produtos where nome_produto = '$result' ", $con);
	}
	if($contador2 == 1){
	$res = mysql_query("SELECT * FROM produtos where nome_produto = '$result2' ", $con);
	}
	if($contador2 == 2){
	$res = mysql_query("SELECT * FROM produtos where nome_produto = '$result3' ", $con);
	}
	if($contador2 == 3){
	$res = mysql_query("SELECT * FROM produtos where nome_produto = '$result4' ", $con);
	}
	if($contador2 == 4){
	$res = mysql_query("SELECT * FROM produtos where nome_produto = '$result5' ", $con);
	}
	
	
	while ($row = mysql_fetch_assoc($res)) {
	echo "<table border=0>";
	echo "<tr>";
	echo "<td>";

			echo "
			<table border=0>
			<tr>
			<form action='buscar.php' method='get'> <div align='center'><br>";
	$preco=$row['preco_produto'];
	// trocando . por ,
	$precoprod = str_replace(".",",",$preco);

	echo "<center>";
	echo "<tr>";
	echo "<td> <font size='2.5' color='black'>".$row['nome_produto'];
	echo "</td>";
	echo "</tr>";
	echo "<br>";
	echo "<tr><td><a href='".$row['nome_produto'].".php'><img src='".$row['imagem']."'height='130' width='130' name='eimg'></tr></td>";
	echo "<td> <font size='2.5' color='black'>Preço R$ ".$precoprod;
	echo "</tr>";

	echo "</td>";
	echo "</tr></td>";
	echo "<tr>";
	echo "<td><div align='center' style='font-size:10px;font-family:Verdana'><a href='carr.php?cod=".$row['idprodutos']."&acao=incluir' class='button'>Comprar</a></div><br></td>";
	echo "</tr>";
	echo "</center>";
	echo "</table>";
    echo "</form>"; 
    echo "<td>";
}



        echo "</pre>";
    }
}


$contador2 = $contador2 + 1;
}

echo "</table>";
echo "</table>";
echo "</table>";
echo "</table>";
echo "</table>";
     			
}

else{

$contador = 0;

//while($contador <= 5){
$codp = $listadeprodutos[$contador];

$error = $client->getError();
if ($error) {
    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
}

$n=0;
$result = $client->call("getProd2", array("category" => "".$codp."","n" => "".$n.""));
$n=1;
$result2 = $client->call("getProd2", array("category" => "".$codp."","n" => "".$n.""));
$n=2;
$result3 = $client->call("getProd2", array("category" => "".$codp."","n" => "".$n.""));
$n=3;
$result4 = $client->call("getProd2", array("category" => "".$codp."","n" => "".$n.""));
$n=4;
$result5 = $client->call("getProd2", array("category" => "".$codp."","n" => "".$n.""));




if ($client->fault) {
    echo "<h2>Fault</h2><pre>";
    print_r($result);
    echo "</pre>";
}
else {
    $error = $client->getError();
    if ($error) {
        echo "<h2>Error</h2><pre>" . $error . "</pre>";
    }
    else {
	if($contador == 0){
	$res = mysql_query("SELECT * FROM produtos where nome_produto = '$result' ", $con);
	$res2 = mysql_query("SELECT * FROM produtos where nome_produto = '$result2' ", $con);
	$res3 = mysql_query("SELECT * FROM produtos where nome_produto = '$result3' ", $con);
	$res4 = mysql_query("SELECT * FROM produtos where nome_produto = '$result4' ", $con);
	$res5 = mysql_query("SELECT * FROM produtos where nome_produto = '$result5' ", $con);
	}

	
	while ($row = mysql_fetch_assoc($res)) {
		
	echo "<table border=0>";
	echo "<tr>";
	echo "<td>";

			echo "
			<table border=0>
			<tr>
			<form action='buscar.php' method='get'> <div align='center'><br>";
	$preco=$row['preco_produto'];
	// trocando . por ,
	$precoprod = str_replace(".",",",$preco);

	echo "<center>";
	echo "<tr>";
	echo "<td> <font size='2.5' color='black'>".$row['nome_produto'];
	echo "</td>";
	echo "</tr>";
	echo "<br>";
	echo "<tr><td><a href='".$row['nome_produto'].".php'><img src='".$row['imagem']."'height='130' width='130' name='eimg'></tr></td>";
	echo "<td> <font size='2.5' color='black'>Preço R$ ".$precoprod;
	echo "</tr>";

	echo "</td>";
	echo "</tr></td>";
	echo "<tr>";
	echo "<td><div align='center' style='font-size:10px;font-family:Verdana'><a href='carr.php?cod=".$row['idprodutos']."&acao=incluir' class='button'>Comprar</a></div><br></td>";
	echo "</tr>";
	echo "</center>";
	echo "</table>";
    echo "</form>"; 
    echo "<td>";

}
	
	while ($row = mysql_fetch_assoc($res2)) {
		
	echo "<table border=0>";
	echo "<tr>";
	echo "<td>";

			echo "
			<table border=0>
			<tr>
			<form action='buscar.php' method='get'> <div align='center'><br>";
	$preco=$row['preco_produto'];
	// trocando . por ,
	$precoprod = str_replace(".",",",$preco);

	echo "<center>";
	echo "<tr>";
	echo "<td> <font size='2.5' color='black'>".$row['nome_produto'];
	echo "</td>";
	echo "</tr>";
	echo "<br>";
	echo "<tr><td><a href='".$row['nome_produto'].".php'><img src='".$row['imagem']."'height='130' width='130' name='eimg'></tr></td>";
	echo "<td> <font size='2.5' color='black'>Preço R$ ".$precoprod;
	echo "</tr>";

	echo "</td>";
	echo "</tr></td>";
	echo "<tr>";
	echo "<td><div align='center' style='font-size:10px;font-family:Verdana'><a href='carr.php?cod=".$row['idprodutos']."&acao=incluir' class='button'>Comprar</a></div><br></td>";
	echo "</tr>";
	echo "</center>";
	echo "</table>";
    echo "</form>"; 
    echo "<td>";

}

	while ($row = mysql_fetch_assoc($res3)) {
		
	echo "<table border=0>";
	echo "<tr>";
	echo "<td>";

			echo "
			<table border=0>
			<tr>
			<form action='buscar.php' method='get'> <div align='center'><br>";
	$preco=$row['preco_produto'];
	// trocando . por ,
	$precoprod = str_replace(".",",",$preco);

	echo "<center>";
	echo "<tr>";
	echo "<td> <font size='2.5' color='black'>".$row['nome_produto'];
	echo "</td>";
	echo "</tr>";
	echo "<br>";
	echo "<tr><td><a href='".$row['nome_produto'].".php'><img src='".$row['imagem']."'height='130' width='130' name='eimg'></tr></td>";
	echo "<td> <font size='2.5' color='black'>Preço R$ ".$precoprod;
	echo "</tr>";

	echo "</td>";
	echo "</tr></td>";
	echo "<tr>";
	echo "<td><div align='center' style='font-size:10px;font-family:Verdana'><a href='carr.php?cod=".$row['idprodutos']."&acao=incluir' class='button'>Comprar</a></div><br></td>";
	echo "</tr>";
	echo "</center>";
	echo "</table>";
    echo "</form>"; 
    echo "<td>";

}


while ($row = mysql_fetch_assoc($res5)) {
		
	echo "<table border=0>";
	echo "<tr>";
	echo "<td>";

			echo "
			<table border=0>
			<tr>
			<form action='buscar.php' method='get'> <div align='center'><br>";
	$preco=$row['preco_produto'];
	// trocando . por ,
	$precoprod = str_replace(".",",",$preco);

	echo "<center>";
	echo "<tr>";
	echo "<td> <font size='2.5' color='black'>".$row['nome_produto'];
	echo "</td>";
	echo "</tr>";
	echo "<br>";
	echo "<tr><td><a href='".$row['nome_produto'].".php'><img src='".$row['imagem']."'height='130' width='130' name='eimg'></tr></td>";
	echo "<td> <font size='2.5' color='black'>Preço R$ ".$precoprod;
	echo "</tr>";

	echo "</td>";
	echo "</tr></td>";
	echo "<tr>";
	echo "<td><div align='center' style='font-size:10px;font-family:Verdana'><a href='carr.php?cod=".$row['idprodutos']."&acao=incluir' class='button'>Comprar</a></div><br></td>";
	echo "</tr>";
	echo "</center>";
	echo "</table>";
    echo "</form>"; 
    echo "<td>";

}

        echo "</pre>";
    }
   
//}

//$contador = $contador + 1;

}

}




?>

	     </table>
         </table>
     	</table>
     	 </table>
     	</table>
     	
        </div>
		<div class="rodape-div"></div>		<!-- <p>Loja Cusko</p> caso queira colocar frase dentro do rodape -->
		</div>
         <div class="dir-div">		
                  						
            <h4>Menu</h4>
            <br>
            <div id='menuvert'>
			<ul>
            <ul class="maisartigos escuro top8">
            <li><a href="cammasc.php" title="Camisas Masculinas">Camisas Masculinas</a></li>
            <li><a href="camfem.php" title="Camisas Femininas">Camisas Femininas</a></li>
            <li><a href="calcmas.php" title="Calcas Masculinas">Calças Masculinas</a></li>
            <li><a href="calcafem.php" title="Calcas Femininas">Calças Femininas</a></li>
            <li><a href="bermasc.php" title="Bermudas Masculinas">Bermudas Masculinas</a></li>
            <li><a href="shortfem.php" title="Shorts Femininos">Shorts Femininos</a></li>
			<li><a href="acessorios.php" title="Acessorios">Acessórios</a></li>
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
