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
 		<?php
		require_once('reader2.php');
		?> 		
</ul>
</div>				                          
            </ul>
        </div>
        
        <div class="esq-div">
		      
        	<div class="destaques-div">
            <h5>Administrar Produtos</h5>
            
<?php
require_once("conf.php");
$sql2="select * from produtos";
$res2=mysql_query($sql2);
$total2=mysql_num_rows($res2);

if($total2 !=0){
echo "
<br/><br/>
<table border=1>
<tr>
<form name='myform2' action='editarprod.php' method='POST'> <div align='center'><br>
<th>Selecione</th><th>Nome</th><th>Tamanho</th><th>Categoria</th><th>Quantidade</th><th>Preço</th><th>Imagem</th><th>Desatque</th><th>Descrição</th><th>Status</th>
";
}
else{
echo "";
}

$max=4;
$pagina=$_GET["pagina"]; 
if ($pagina == "")
$pagina=1;
 
$inicio = $pagina - 1;
$inicio = $max * $inicio;
 
$sql="select * from produtos";
$res=mysql_query($sql);
$total=mysql_num_rows($res);
 
if ($total == 0){
echo "Nenhum registro encontrado!";
echo "<BR>";
echo "<td>  <a href='cadprod.php'  class='button adicionar'> Adicionar Produto</a> </td>";
}
else
{
echo "<BR>";
$sql="select * from produtos LIMIT $inicio,$max";
$res=mysql_query($sql);
while ($row = mysql_fetch_assoc($res)) {

	$cat = $row['cat_produto'];
	$tam = $row['tam_prod'];
	$dst = $row['destaque'];
    $valorprod=$row['preco_produto']; //usado pra transformar . em ,
    $precoprod2 = str_replace(".",",",$valorprod);
    

   if($cat==2){
   $cat_value="Camisas Masculinas";
   }
		else if($cat==3){
		
		$cat_value="Camisas Femininas";
		}
			else if($cat==4){
			$cat_value="Calcas Masculinas";
			}
				else{
				$cat_value="Sem Categoria";
				}
				
if($tam==2){
   $tam_value="P";
   }
		else if($tam==3){
		
		$tam_value="M";
		}
			else if($tam==4){
			$tam_value="G";
			}
				else{
				$tam_value="Único";
				}
				
	if($dst==1){
	
	$dest_value="Sim";
	}
	 else if($dst==2){
	 $dest_value="Nao";
	 }
		else
		$dest_value="Nao Selecionado";
	
	echo "<tr>";
	echo "<td> <input type='radio' style='text-align:right' name='rcod' value='".$row['idprodutos']."'></td>" ;
	echo "<td> <input type='text' style='text-align:right' name='enome2' disabled size='16' value='".$row['nome_produto']."'></td>" ;
	echo "<td> <input type='text' style='text-align:right' name='etam' disabled size='5' value='".$tam_value."'></td>";
	echo "<td> <input type='text' style='text-align:right' name='ecat' disabled size='19' value='".$cat_value. "'></td>" ;
	echo "<td> <input type='text' style='text-align:right' name='eqtd' disabled size='5' value='".$row['qtd_produto']. "'></td>" ;
	echo "<td> <input type='text' style='text-align:right' name='eprc' disabled size='6' value='R$".$precoprod2."'></td>" ;
	echo "<td><img src='".$row['imagem']."'height='30' width='30' style='text-align:right' name='eimg'></td>";
	echo "<td> <input type='text' style='text-align:right' name='edst' disabled size='5' value='".$dest_value."'></td>" ;
	echo "<td> <input type='text' style='text-align:right' name='edesc' disabled size='5' value='".$row['descricao']."'></td>" ;
	echo "<td> <input type='text' style='text-align:right' name='edesc' disabled size='3' value='".$row['status_prod']."'></td>" ;
	echo "</tr>";

}

echo "</table>";
    
	echo "<td>  <a href='cadprod.php'  class='button adicionar'> Adicionar Produto</a> </td>";
	?>
	<button type='submit' name='action' value='apagar' onclick="return confirm('Tem Certeza de excluir o produto ?')" class='button apagar'> Apagar Produto</a>
<?php
        echo "<td> <button type='submit' name='action' value='editar' class='button editar'> Editar Produto</a></button> </td>";
//      echo "<td> <a href='buscaprod.php'> <button  class='button pesquisar'> Pesquisar Produto</a> </td>";
        echo "</form>";   
 	    echo "<BR>";
}
// Calculando pagina anterior
$menos = $pagina - 1;
// Calculando pagina posterior
$mais = $pagina + 1;
$pgs = ceil($total / $max); //aredonda numero
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
     <br>
        </div>
<div class="rodape-div"><p>Loja Cusko</p></div>		
</div>
         <div class="dir-div">								
 		<?php
		require_once('menulado.php');
		?> 		
		</div>	
</div>

</body>
</html>
