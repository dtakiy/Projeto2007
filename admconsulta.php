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
            <h5>Consultar Pedidos</h5>
			<form id="formconsult" name="formconsult" method="post" action="consulta.php">
      		<table border=0  width=auto height=150>   
      		<td width="auto"> <h7>Código Compra: </h7> </td>
      		<td width="auto"><input type="text" name="codcompra" id="codcompra" size="45" placeholder="Código da Compra" /> </td>
      		<td><input name="btn_codcompra" class="button" type="submit" id="btn_codcompra" value="Pesquisar" size="40"  /></td>
      		</table>
      		</form>         
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