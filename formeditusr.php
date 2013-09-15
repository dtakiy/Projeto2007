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
            <h5>Editar Usuário</h5>
			
<?php
require_once("conf.php");

  $cod ="$_POST[cid2]";
  $log="$_POST[clog2]";
  $nome ="$_POST[cnome2]";
 // $datanasc="$_POST[cdata2]";
  $senha ="$_POST[csenha2]";
  $email ="$_POST[cemail2]";
  $tipo ="$_POST[ctipo2]";
  $rg = "$_POST[crg2]";
  $cpf = "$_POST[ccpf2]";
  $end = "$_POST[cend2]";
  $num = "$_POST[cnum2]";
  $compl = "$_POST[ccomp2]";
  $cep = "$_POST[cep2]";
  $cidade = "$_POST[ccidade2]";
  $estado = "$_POST[cestado2]";
  $tel = "$_POST[ctel2]";
  $cel = "$_POST[ccel2]";
  $status = "$_POST[status2]";
  
  
  $nomecripto = base64_encode($nome);
  $datanasccripto = base64_encode($datanasc);
  $emailcripto = base64_encode($email);
 // $rgcripto = base64_encode($rg);
  $cpfcripto = base64_encode($cpf);
  $endcripto = base64_encode($end);
  $numcripto = base64_encode($num);
  $compcripto = base64_encode($compl);
  $cmpusrcripto = base64_encode($cmpusr);
  $cidadecripto = base64_encode($cidade);
  $estdcripto = base64_encode($estado);
  $cepcripto = base64_encode($cep);
  $telcripto = base64_encode($tel);
  $celcripto = base64_encode($cel);
  $cepcripto = base64_encode($cep);
  
if($log==$usuario && $status==2) {
echo "Voce Nao Pode Mudar Status de seu proprio usuario";
}
else{
$result = mysql_query("UPDATE usuarios SET nome='$nomecripto', email='$emailcripto', cpf='$cpfcripto', cep='$cepcripto', tel='$telcripto' ,cel='$celcripto', endereco='$endcripto',
numero='$numcripto', complemento='$compcripto', estado='$estdcripto',cidade='$cidadecripto', tipo=$tipo, status=$status
WHERE idusuario=$cod");


echo "Mudança Efetuada com Sucesso, clique <a href=admusr.php>"; echo "aqui Para Voltar</a>.";
}
?>
			
        </div>
<div class="rodape-div"><p>Loja Cusko</p></div>		
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