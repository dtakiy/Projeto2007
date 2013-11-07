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
//	                          
            </ul>
        </div>      
        
        <div class="esq-div">
        <div class="destaques-div">
        <h5>Produtos em Destaque</h5>
			
		<?php
require_once("conf.php");
require_once("conf2.php");

$max=4; // numero maximo de produtos por pagina
//
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

//


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

$arrayrec = array(); //array usado para as recomendacoes auxiliar;
$arrayrecomend = array(); //array usado para as recomendacoes;
$produtosdisp = array();
$arrayfianal = array(); //array final para rec

$numprodcar = count($listadeprodutos);
$m=0;
$queryprod = mysql_query("SELECT * FROM produtos WHERE status_prod=1",$con); 
while ($row = mysql_fetch_assoc($queryprod)) {
$produtonome = $row['nome_produto'];
$produtosdisp[$m] = $produtonome;
$m = $m +1;
}

//tirando os produtos que estao dentro do carrinho da comparacao
//$arraylimpo2 = array_diff($produtosdisp,$listadeprodutos);
//rsort ($arraylimpo2);

// verificando o numero de produtos que vao ser comparados na pesquisa
$numprodcarexistente = count($produtosdisp);

// criando array
$matrix = array ();


for($conts = 0; $conts < $numprodcar ; $conts++){

	for($npc=0; $npc < $numprodcarexistente; $npc++ ){

	
	$pesq = $listadeprodutos[$conts];
	
	$result = $client->call("getProd2", array("category" => "".$pesq."","n" => "".$produtosdisp[$npc]."")); // pega UV
	$result2 = $client->call("getProd3", array("category" => "".$pesq."","n" => "".$pesq."")); // pega V
	
	/*
	echo "=================================";
	echo "<BR>";
	echo "PESQUISA COM OS PRODUTOS";
	echo "<BR>";
	echo $pesq;
	echo "<BR>";
	echo $produtosdisp[$npc];
	echo "<BR>";
	echo "=================================";
	*/
	
	//SIM = UV/V
	if($result2 !=0){
	$sim = $result/$result2;
	}
	
	if($sim!=0){
	$matrix[$npc] = array('prod2' => $produtosdisp[$npc],'similaridade' => $sim);
	}
}

}	

 function orderBy($matrix, $field)
  {
    $code = "return strnatcmp(\$a['$field'], \$b['$field']);";
    usort($matrix, create_function('$a,$b', $code));
    return $matrix;
  }

  $data = orderBy($matrix, 'similaridade');


}

$tamarryprod = count($data);

//echo $tamarryprod;
//echo "        ";
//print_r($data);

/*
echo "===>>>>>>>>";
echo "<BR>";
echo "<BR>";
echo $data[0]['prod2'];
echo "<BR>";
echo "<BR>";
echo "===>>>>>>>>";
*/


//separando os nomes dos produtos em um array

for($incr = 0 ;$incr < $tamarryprod;$incr++ ){

$arrayrec[] = $data[$incr]['prod2'];

}

$tamarryprod2 = count($arrayrec);

$tamaux = $tamarryprod2;
for($conta = 0; $conta <= $tamarryprod2; $conta++ ){
	$arrayrecomend[] = $arrayrec[$tamaux];
	
	$tamaux = $tamaux - 1;
}


//tirando os produtos que estao dentro do carrinho da comparacao
$arraylimpo2 = array_diff($arrayrec,$listadeprodutos);

$numrecis = 4 + $numprodcar;

for($conty=0;$conty <=$numrecis;$conty++){

	if($arraylimpo2[$conty] !=''){
	$arrayfinal[] = $arraylimpo2[$conty];
	}
}

$resultado = $arrayfinal[0];
$resultado2 = $arrayfinal[1];
$resultado3 = $arrayfinal[2];
$resultado4 = $arrayfinal[3];

	$res = mysql_query("SELECT * FROM produtos where nome_produto = '$resultado' ", $con);
	$res2 = mysql_query("SELECT * FROM produtos where nome_produto = '$resultado2' ", $con);
	$res3 = mysql_query("SELECT * FROM produtos where nome_produto = '$resultado3' ", $con);
	$res4 = mysql_query("SELECT * FROM produtos where nome_produto = '$resultado4' ", $con);

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
	
</body>
</html>
