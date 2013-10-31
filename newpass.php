<?php 
	session_start();
    $usuario = $_SESSION['usrlogin'];
    $tipo=$_SESSION['usrtipo'];
    $nome = $_SESSION['usrnome'];
    
	$nomedecripto = base64_decode($nome);
	

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
            <h5>Recuperar Senha</h5>
<?php
require_once("conf.php");

$senha = "$_POST[senusr]";
$email = $_GET['acao'];
$senhacripto= hash('md5', $senha);


$result = mysql_query("UPDATE usuarios SET senha='$senhacripto' WHERE email='$email'");
if($result>=1)
{
echo "<h1><font color='black'>Senha mudada com sucesso </font> </h1>";
//echo "<h1><a href=index.php> Para Logar Retorne a página inicial, clicando aqui</a></h1>";
}
else
echo "ERRO";

?>
          
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



