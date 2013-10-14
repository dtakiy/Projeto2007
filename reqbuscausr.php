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
  <li><a href='adm.php'><span>Home Adm</span></a></li>
  <li><a href='produtos.php'><span>Produtos</span></a></li>
  <li><a href='admprod.php'><span>Administrar Produtos</span></a></li>
  <li><a href='admusr.php'><span>Administrar Usuários</span></a></li>
  <?php
include("valida.php");


echo "<form id=formlogout' name='formlogout' method='post'  action='logout.php'>";
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
            <h5>Resultados Busca Usuários</h5>
   <?php
$buscar=$_POST["buscarusr"];
$buscarcripto=base64_encode($buscar);   
require_once("conf.php");
$max=3; // numero maximo de produtos por pagina
$pagina=$_GET["pagina"]; 
if ($pagina == "")
$pagina=1;
 
$inicio = $pagina - 1;
$inicio = $max * $inicio;
 
$sql="select * from usuarios where nome LIKE '%$buscarcripto%' OR email='$buscarcripto' or cpf='$buscarcripto' ";
$res=mysql_query($sql);
$total=mysql_num_rows($res);
 
if ($total == 0)
echo "Nenhum registro encontrado!";
else
{
echo "<BR>";
echo "Quantidade de produtos encontrados: ".$total.'<br><br>';
$sql="select * from usuarios where nome LIKE '%$buscarcripto%' OR email='$buscarcripto' or cpf='$buscarcripto' LIMIT $inicio,$max";
$res=mysql_query($sql);
while ($row=mysql_fetch_array($res)){

	$nome=$row['nome'];
$nomedecripto = base64_decode($nome);
$email=$row['email'];
$emaildecripto = base64_decode($email);
$rg=$row['rg'];
$rgdecripto = base64_decode($rg);
$cpf=$row['cpf'];
$cpfdecripto = base64_decode($cpf);
$datanasc=$row['datanasc'];
$datanascdecripto = base64_decode($datanasc);
$endereco=$row['endereco'];
$enderecodecripto = base64_decode($endereco);
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
    
	echo "
	<br /><br />
	<table border=1>
	<tr>
	<form name='myform' action='editarusr.php' method='POST'> <div align='center'><br>
	<th>Selecione</th><th>Login</th><th>Senha</th><th>Nome</th><th>E-Mail</th></tr>
	";
	echo "<tr>";
    echo "<td> <input type='radio' name='elog' value='".$row['idusuario']."'>".$row['idusuario']. "</td>" ;
    echo "<td> <input type='text' name='elog2'  disabled  size='auto' value='".$row['login']. "'></td>" ;
	echo "<td> <input type='text' name='esenha'  disabled  size='auto' value='".$row['senha']. "'></td>" ;
	echo "<td> <input type='text' name='enomeusr' disabled size='auto' value='".$nomedecripto."'></td>" ;
	echo "<td> <input type='text' name='eemail' disabled size='15' value='".$emaildecripto."'></td>" ;
	echo "<tr><th>RG</th><th>CPF</th><th>Tipo</th><th>Data Nasc</th><th>End</th></tr>";
	echo "<td> <input type='text' name='erg' disabled size='auto' value='".$rgdecripto."'></td>" ;
	echo "<td> <input type='text' name='ecpf' disabled size='auto' value='".$cpfdecripto. "'></td>" ;
	echo "<td> <input type='text' name='etipo' disabled size='auto' value='".$row['tipo']. "'></td>" ;
	echo "<td> <input type='text' name='edatanasc' disabled size='auto' value='".$datanascdecripto. "'></td>" ;
	echo "<td> <input type='text' name='eend' disabled size='15' value='".$enderecodecripto. "'></td>" ;
	echo "<tr><th>Cidade</th><th>CEP</th><th>Estado</th><th>Tel</th><th>Cel</th></tr>";
	echo "<td> <input type='text' name='ecidade' disabled size='auto' value='".$cidadedecripto. "'></td>" ;
	echo "<td> <input type='text' name='ecep' disabled size='auto' value='".$cepdecripto. "'></td>" ;
	echo "<td> <input type='text' name='eestado' disabled size='auto' value='".$estadodecripto. "'></td>" ;
	echo "<td> <input type='text' name='etel' disabled size='auto' value='".$teldecripto. "'></td>" ;
	echo "<td> <input type='text' name='ecel' disabled size='15' value='".$celdecripto. "'></td>" ;
	echo "</tr>";
	echo "</table>";
	echo "</form>";  
	echo "</table>";
	echo "<td>  <a href='cadusr.php'  class='button adicionar'> Adicionar Usuario</a> </td>";
	echo "<td> <button type='submit' name='action' value='apagarusr' class='button apagar'> Apagar Usuario</a> </td>";
	echo "<td> <button type='submit' name='action' value='editarusr' class='button editar'> Editar Usuario</a> </td>";
	echo "<td> <a href='buscausr.php'> <button  class='button pesquisar'> Pesquisar Usuario</a></button> </td>";
	echo "</form>";   
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
     <br>
        </div>
	
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
            <h4>Área dDo Usuário</h4>
            <br>
            <div id='menuvert'>
            <br> 
            <li><a href="cadusrcmp.php" title="Editar Informações">Editar Informações</a></li>   
            </div>  
            <br>
            <h4>Busca De Produtos</h4>
            <br>      
        	<input name="login" type="text" id="login" placeholder="Nome ou Descrição" size="20" maxlength="60"/>
        	<input name="btnsearchprod" class="button" type="submit" size="2" id="btnsearchprod" value="Buscar" />
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
