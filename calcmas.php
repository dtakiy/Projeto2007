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
            <h5>Calças Masculinas</h5>
			
		<?php
require_once("conf.php");

$max=5; // numero maximo de produtos por pagina

$pagina=$_GET["pagina"]; 
if ($pagina == "")
$pagina=1;
 
$inicio = $pagina - 1;
$inicio = $max * $inicio;
 
$sql="SELECT * FROM produtos where cat_produto=4 and status_prod=1 ";
$res=mysql_query($sql);
$total=mysql_num_rows($res);
 
if ($total == 0)
echo "Nenhum registro encontrado!";
else
{
echo "<BR>";

$sql="SELECT * FROM produtos where cat_produto=3 and status_prod=1 LIMIT $inicio,$max";
$res=mysql_query($sql);
while ($row = mysql_fetch_assoc($res)) {
echo "<table border=0>";
echo "<tr>";
echo "<td>";

			echo "
			<br/><br/>
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
