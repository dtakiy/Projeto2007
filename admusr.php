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
            <h5>Administrar Usuário</h5>
<?php
require_once("conf.php");
$max=1; // numero maximo de produtos por pagina
$pagina=$_GET["pagina"]; 
if ($pagina == "")
$pagina=1;
$inicio = $pagina - 1;
$inicio = $max * $inicio;
echo "
<br/><br/>
<table border=1>
<tr>
<form name='myform' action='editarusr.php' method='POST'> <div align='center'><br>";
 
$sql="SELECT * FROM usuarios";
$res=mysql_query($sql);
$total=mysql_num_rows($res);
 
if ($total == 0)
echo "Nenhum registro encontrado!";
else
{
echo "<BR>";

$sql="SELECT * FROM usuarios LIMIT $inicio,$max";
$res=mysql_query($sql);
while ($row=mysql_fetch_array($res)){

$nome=$row['nome'];
$nomedecripto = base64_decode($nome);
$email=$row['email'];
$emaildecripto = base64_decode($email);
//$rg=$row['rg'];
//$rgdecripto = base64_decode($rg);
$cpf=$row['cpf'];
$cpfdecripto = base64_decode($cpf);
//$datanasc=$row['datanasc'];
//$datanascdecripto = base64_decode($datanasc);
$endereco=$row['endereco'];
$enderecodecripto = base64_decode($endereco);
$numero=$row['numero'];
$numerocripto = base64_decode($numero);
$complemento=$row['complemento'];
$complementocripto = base64_decode($complemento);
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
$status=$row['status'];
	
if($status == 1){
$statusn = "Ativo";
}
else{
$statusn = "Inativo";
}	
	
	echo "<th><font size='4' color='black'>Selecione</font></th><th><font size='4' color='black'>Nome</font></th><th><font size='4' color='black'>E-Mail</font></th>
	<th><font size='3' color='black'>Status</font></th>";
	echo "<tr>";
    echo "<td><font size='3' color='white'> <input type='radio' name='elog' value='".$row['idusuario']."'>".$row['idusuario']. "</font></td>";
    echo "<td><font size='2' color='black'> <input type='text' name='enomeusr' disabled size='auto' value='".$nomedecripto."'></font></td>";
	echo "<td><font size='2' color='black'> <input type='text' name='eemail' disabled size='auto' value='".$emaildecripto."'></font></td>";
	echo "<td><font size='2' color='black'>  <input type='text' name='status2' disabled size='10' value='".$statusn."'></font></td>";


/*
	echo "<tr><th>CPF</th><th>Tipo</th><th>End</th><th>Num</th><th>Cmp</th></tr>";
//	echo "<td> <input type='text' name='erg' disabled size='auto' value='".$rgdecripto."'></td>" ;
	echo "<td> <input type='text' name='ecpf' disabled size='auto' value='".$cpfdecripto. "'></td>" ;
	echo "<td> <input type='text' name='etipo' disabled size='auto' value='".$row['tipo']. "'></td>" ;
//	echo "<td> <input type='text' name='edatanasc' disabled size='auto' value='".$datanascdecripto. "'></td>" ;
	echo "<td> <input type='text' name='eend' disabled size='auto' value='".$enderecodecripto. "'></td>" ;
	echo "<td> <input type='text' name='enum' disabled size='auto' value='".$numerocripto. "'></td>" ;
	echo "<td> <input type='text' name='ecmp' disabled size='auto' value='".$complementocripto. "'></td>" ;

	echo "<tr><th>Cidade</th><th>CEP</th><th>Estado</th><th>Tel</th><th>Cel</th></tr>";
	echo "<td> <input type='text' name='ecidade' disabled size='auto' value='".$cidadedecripto. "'></td>" ;
	echo "<td> <input type='text' name='ecep' disabled size='auto' value='".$cepdecripto. "'></td>" ;
	echo "<td> <input type='text' name='eestado' disabled size='auto' value='".$estadodecripto. "'></td>" ;
	echo "<td> <input type='text' name='etel' disabled size='auto' value='".$teldecripto. "'></td>" ;
	echo "<td> <input type='text' name='ecel' disabled size='auto' value='".$celdecripto. "'></td>" ;
	echo "</tr>";
	echo "<tr><th>Status</th></tr>";
	echo "<tr>";
	echo "<td> <input type='text' name='status2' disabled size='auto' value='".$status."'></td>" ;
	echo "</tr>";
	echo "</tr>";
	*/
}
 echo "</table>";
	echo "<td>  <a href='cadusradm.php'  class='button adicionar'> Adicionar Usuario</a> </td>";
//	echo "<td> <button type='submit' name='action' value='apagarusr' class='button apagar'> Apagar Usuario</a> </td>";
	echo "<td> <button type='submit' name='action' value='editarusr' class='button editar'> Editar/Visualizar Usuário</a> </td>";
	echo "<td> <a href='buscausr.php'> <button  class='button pesquisar'> Pesquisar Usuário</a> </td> </button>";
	echo "</form>";
	echo "<BR>"; 
 
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
