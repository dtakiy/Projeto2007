<?php 
	session_start();
    $usuario = $_SESSION['usrlogin'];
    $tipo=$_SESSION['usrtipo'];
    $nome = $_SESSION['usrnome'];
    $_SESSION['logged_in'] = true; //logado
	$_SESSION['last_activity'] = time(); //Ultima vez ativo
	$_SESSION['expire_time'] = time()+1800; // uma hora para expirar
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
            <h5>Área Administrativa</h5>
			 <a href='admprod.php'> <button  class='button pesquisar'> Administrar Produtos</a>
			 <a href='admusr.php'> <button  class='button pesquisar'> Administrar Usuários</a>
			 <a href='admconsulta.php'> <button  class='button pesquisar'>Consultar Pedidos</a>	     
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