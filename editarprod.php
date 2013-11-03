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
require_once("conf.php");
require_once("conf2.php");
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
            <h5>Editar Produto</h5>
            
<br>
			
<?php

$cod = $_POST['rcod'];

if ($_POST['action'] == 'apagar') {

  if (empty($cod)) {
	echo "<h7><a href=admprod.php>  Por favor, selecione um produto clique aqui para retornar</a></h7>";
  }
  	else{
  $result1 = mysql_query("SELECT * FROM produtos where idprodutos=$cod",$con);

  while ($row = mysql_fetch_assoc($result1)) {

	$nome = $row['nome_produto'];
}

$rst5 = mysql_query("DELETE FROM recomendacao WHERE prod1='$nome' or prod2= '$nome'",$con2);
$result4 = mysql_query("DELETE FROM produtos WHERE idprodutos=$cod",$con);
$file = $nome.".php";
echo " <h7><a href=admprod.php> O arquivo ".$file." foi apagado,  clique aqui para retornar</a>";
unlink($file);
}
	}

  
  
  else if ($_POST['action'] == 'editar') {
  $cod = $_POST['rcod'];
  
  if (empty($cod)) {
	echo "<h7><a href=admprod.php>  Por favor, selecione um produto clique aqui para retornar</a></h7>".$cod;
  }
  	else{
  
  
  $result = mysql_query("SELECT * FROM produtos where idprodutos=$cod",$con);

  while ($row = mysql_fetch_assoc($result)) {

	$cod = $row['idprodutos'];
	$nome = $row['nome_produto'];
	$cat = $row['cat_produto'];
	$tam = $row['tam_prod'];
	$qtd= $row['qtd_produto'];
	$prc= $row['preco_produto'];
	$img= $row['imagem'];
	$dst = $row['destaque'];
	$desc = $row['descricao'];
	$statusprod = $row['status_prod'];
}
// trocando . por ,
$precoprod2 = str_replace(".",",",$prc);

// setando variaveis nos input box
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


// setando variaveis
   if($statusprod==1){
   $status_value="Ativo";
   $status=1;
   }
		else if($statusprod==2){
		$status_value="Inativo";
		$status=2;
		}
		
				else{
				$status_value="Sem Defenição";
				}


   // codigo HTML

echo "<table border=1>
<form action='formedit.php' method='post'>
<tr>
  <td width='69'> <h7>Nome:</h7> </td>
  <td><input type='text'  name='enome2' value='$nome'>
</tr>
<tr>
   <td width='69'> <h7>Tamanho: </h7> </td>
   <td>
   <select name='tamprod2'>
   <option value='$cat' selected>$tam_value</option>
   <option value='2'>P</option>
   <option value='3'>M</option>
   <option value='4'>G</option>
   <option value='5'>Único</option> 
   </select> </td>
 </tr>  
<tr>
   <td width='69'> <h7>Categoria: </h7> </td>
   <td>
   <select name='catprod2'>
   <option value='$cat' selected>$cat_value</option>
   <option value='2'>Camisas Masculinas</option>
   <option value='3'>Camisas Femininas</option>
   <option value='4'>Calcas Masculinas</option>
   <option value='5'>Calças Femininas</option>
   <option value='6'>Bermudas Masculinas</option>
   <option value='7'>Shorts Femininos</option>
   <option value='8'>Acessórios</option>   
   </select> </td>
 </tr>  
 <tr>
 
  <td width='69'> <h7>Quantidade:</h7> </td>
  <td><input type='text' style='text-align:right' size='5' onkeypress='mascara(this,numeros)' name='qtd2' value='$qtd' >
</tr>
 <tr>
  <td width='69'> <h7>Preco: R$</h7> </td>
  <td><input type='text' style='text-align:right' size='5' onkeypress='mascara(this,monetaria)' name='prc2' value='$precoprod2'>
</tr>
 <tr>
  <td width='69'> <h7>Imagem:</h7> </td>
  <td><img src='$img  'height='30' width='30'>&nbsp; &nbsp; &nbsp;
  <input type='file' style='text-align:right' name='editimg2' accept='image/x-png, image/gif, image/jpeg, image/jpg, image/bmp image/png' /></td>
</tr>
 <tr>
  <td width='69'><h7>Destaque:</h7></td>
  <td><select name='destaque2'>
  <option value='$dst' selected>$dest_value</option>
  <option value='2'>Sim</option>
  <option value='3'>Nao</option>
  </select></td>
</tr> 
 <tr>
  <td width='69'> <h7>Desc:</h7> </td>
  <td><input type='text' style='text-align:right' name='desc2' value='$desc'>
</tr> 

	<input type='text' style='display: none;' name='ecod2' value='$cod'>

<tr>
    <td width='69'> <h7>Status: </h7> </td>
   <td>

   <select name='statusprod'>
   <option value='$status' selected>$status_value</option>
   <option value='1'>Ativo</option>
   <option value='2'>Inativo</option>
   
   </select> </td>
</tr>
   
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

//mascara para aceitar apenas numeros
function numeros(v){  
    v=v.replace(/\D/g,"");                                      
    return v;  
}

function monetaria(v){ 
v=v.replace(/\D/g,"")

v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2") // coloca ponto nos dois ultimos digitos
return v; 
} 
</script>	      
        </div>
			

<div class="rodape-div"><p>Loja Cusko</p></div>		
</div>
         <div class="dir-div">								
		
		<?php
		require_once('menulado.php');
		?> 
		
</div>

</body>
</html>
