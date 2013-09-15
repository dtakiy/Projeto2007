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
            <h5>Administrar Produtos</h5>
            
<?php
require_once("conf.php");
echo "
<br/><br/>
<table border=1>
<tr>
<form name='myform2' action='editarprod.php' method='POST'> <div align='center'><br>
<th>Selecione</th><th>Nome</th><th>Categoria</th><th>Quantidade</th><th>Preço</th><th>Imagem</th><th>Desatque</th><th>Descrição</th><th>Status</th>
";
$max=1;
$pagina=$_GET["pagina"]; 
if ($pagina == "")
$pagina=1;
 
$inicio = $pagina - 1;
$inicio = $max * $inicio;
 
$sql="select * from produtos";
$res=mysql_query($sql);
$total=mysql_num_rows($res);
 
if ($total == 0)
echo "Nenhum registro encontrado!";
else
{
echo "<BR>";
$sql="select * from produtos LIMIT $inicio,$max";
$res=mysql_query($sql);
while ($row = mysql_fetch_assoc($res)) {

	$cat = $row['cat_produto'];
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
//	echo "<td> <input type='text' style='text-align:right' name='ecod'  disabled  size='5' value='".$row['cod_produto']. "'></td>" ;
	echo "<td> <input type='text' style='text-align:right' name='enome2' disabled size='16' value='".$row['nome_produto']."'></td>" ;
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
<div class="rodape-div"><p>TCC do JET</p></div>		
</div>
         <div class="dir-div">								
            <h4>Menu</h4>
            <br>
            <div id='menuvert'>
			<ul>

            <ul class="maisartigos escuro top8">
            
            <li><a href="#" title="Camisas Masculinas">Camisas Masculinas</a></li>
            <li><a href="#" title="Camisas Femininas">Camisas Femininas</a></li>
            <li><a href="#" title="Calcas Masculinas">Calcas Masculinas</a></li>
            <li><a href="#" title="Calcas Femininas">Calcas Femininas</a></li>
            <li><a href="#" title="Bermudas Masculinas">Bermudas Masculinas</a></li>
            <li><a href="#" title="Shorts Femininos">Shorts Femininos</a></li>
			<li><a href="#" title="Acessorios">Acessorios</a></li>
			<br>   	     
            </ul>
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
