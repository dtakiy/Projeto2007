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
            <h5>Resultados Busca Produtos</h5>
   <?php
$buscarprod=$_POST["buscarprod"];
require_once("conf.php");
$max=3; // numero maximo de produtos por pagina
$pagina=$_GET["pagina"]; 
if ($pagina == "")
$pagina=1;
 
$inicio = $pagina - 1;
$inicio = $max * $inicio;
 
$sql="select * from produtos where nome_produto LIKE '%$buscarprod%' ";
$res=mysql_query($sql);
$total=mysql_num_rows($res);
 
if ($total == 0)
echo "Nenhum registro encontrado!";
else
{
echo "<BR>";
echo "Quantidade de produtos encontrados: ".$total.'<br><br>';
$sql="select * from produtos where nome_produto LIKE '%$buscarprod%' LIMIT $inicio,$max";
$res=mysql_query($sql);
while ($row=mysql_fetch_array($res)){

	$valorprod=$row['preco_produto']; //usado pra transformar . em ,
    $precoprod2 = str_replace(".",",",$valorprod);
    
	echo "
	<br /><br />
	<table border=1>
	<tr>
	<form name='myform2' action='buscarprod.php' method='POST'> <div align='center'><br>
	<th>Nome Produto</th><th>Preço</th><th>Descrição</th><th>Imagem</th><th><Comprar></th></tr>
	";
	echo "<tr>";
    echo "<td> <input type='text' name='nprod' style='text-align:right' disabled  size='auto' value='".$row['nome_produto']. "'></td>" ;
    echo "<td> <input type='text' name='preprod' style='text-align:right'  disabled  size='auto' value='R$".$precoprod2."'></td>" ;
	echo "<td> <input type='text' name='desc'  disabled  style='text-align:right' size='auto' value='".$row['descricao']. "'></td>" ;
	echo "<td><img src='".$row['imagem']."'height='80' style='text-align:right' width='80' style='text-align:right' name='eimg'></td>";
	echo "<td><div align='center'  style='font-size:10px;font-family:Verdana'><a href='carr.php?cod=".$row['idprodutos']."&acao=incluir' class='button'>Comprar</a></div><br></td>";
	echo "</table>";
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
