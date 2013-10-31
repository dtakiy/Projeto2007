<?php
session_start();
echo "";
//echo session_id();
$usuario = $_SESSION['usrlogin']; 
$email = $_SESSION['email'];
$emailcripto = base64_decode($email);
?>
<?php
require_once('reader.php');
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

else if ($numr == 1) {

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
$n=5;
$result6 = $client->call("getProd2", array("category" => "".$codp."","n" => "".$n.""));
$n=6;
$result7 = $client->call("getProd2", array("category" => "".$codp."","n" => "".$n.""));
$n=7;
$result8 = $client->call("getProd2", array("category" => "".$codp."","n" => "".$n.""));
$n=8;
$result9 = $client->call("getProd2", array("category" => "".$codp."","n" => "".$n.""));

	//colocando produtos em uma lista que será usada para eliminar a recomendacao de produtos que já estão no carrinho.
	
	$listaresultado = array();
	$listaresultado[] = $result;
	$listaresultado[] = $result2;
	$listaresultado[] = $result3;
	$listaresultado[] = $result4;
	$listaresultado[] = $result5;
	$listaresultado[] = $result6;
	$listaresultado[] = $result7;
	$listaresultado[] = $result8;
	$listaresultado[] = $result9;
	
    $arraylimpo = array_diff($listaresultado,$listadeprodutos);
 	rsort ($arraylimpo);
    
    $nelemarray = sizeof($arraylimpo2); // numero de elementos do array
    
   $result  =  $arraylimpo[0];
   $result2 =  $arraylimpo[1];
   $result3 =  $arraylimpo[2];
   $result4 =  $arraylimpo[3];
    
 
    
    

	// Fim da eliminação e ordenação de elementos iguais e dos produtos que serao recomendados


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


while ($row = mysql_fetch_assoc($res4)) {
		
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


}

}

else{


// caso tenha mais de um produto

$vendasprod = array();

$numprodcar = count($listadeprodutos);

	for($npc=0; $npc < $numprodcar; $npc++ ){
	
	$pesq = $listadeprodutos[$npc];
	
	
	$result = $client->call("getProd3", array("category" => "".$pesq."","n" => "".$npc.""));
	
	
	$vendasprod[] = $result;
	
	}

	$maiorprod = array_search(max($vendasprod), $vendasprod);
	$codp = $listadeprodutos[$maiorprod];	
	
	$contador = 0;


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
$n=5;
$result6 = $client->call("getProd2", array("category" => "".$codp."","n" => "".$n.""));
$n=6;
$result7 = $client->call("getProd2", array("category" => "".$codp."","n" => "".$n.""));
$n=7;
$result8 = $client->call("getProd2", array("category" => "".$codp."","n" => "".$n.""));
$n=8;
$result9 = $client->call("getProd2", array("category" => "".$codp."","n" => "".$n.""));
$n=9;
$result10 = $client->call("getProd2", array("category" => "".$codp."","n" => "".$n.""));
$n=10;
$result11 = $client->call("getProd2", array("category" => "".$codp."","n" => "".$n.""));

	//colocando produtos em uma lista que será usada para eliminar a recomendacao de produtos que já estão no carrinho.
	
	$listaresultado = array();
	$listaresultado[] = $result;
	$listaresultado[] = $result2;
	$listaresultado[] = $result3;
	$listaresultado[] = $result4;
	$listaresultado[] = $result5;
	$listaresultado[] = $result6;
	$listaresultado[] = $result7;
	$listaresultado[] = $result8;
	$listaresultado[] = $result9;
	$listaresultado[] = $result10;
	$listaresultado[] = $result11;
	
    $arraylimpo = array_diff($listaresultado,$listadeprodutos);
 	
 	
 	rsort ($arraylimpo);
    
    $nelemarray = sizeof($arraylimpo2); // numero de elementos do array
    
   $result  =  $arraylimpo[0];
   $result2 =  $arraylimpo[1];
   $result3 =  $arraylimpo[2];
   $result4 =  $arraylimpo[3];
    
 
    
    

	// Fim da eliminação e ordenação de elementos iguais e dos produtos que serao recomendados


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


while ($row = mysql_fetch_assoc($res4)) {
		
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
    
    	<?php					

       require_once('menulado.php');

	    ?>
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
