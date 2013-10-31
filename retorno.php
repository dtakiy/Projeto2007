<?php
session_start();
echo "";
//echo session_id();
$usuario = $_SESSION['usrlogin']; 
$email = $_SESSION['email'];
$emailcripto = base64_decode($email);
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
	 <h5>Obrigado Pela Preferência</h5>
<?php
echo "<BR>";
echo "<BR>";
$idpagamento= $_GET['idpagamento'];
echo "<h1>";
echo "<font color='black'>";
echo "Obrigado por comprar conosco ";
echo "seu id de pedido:";
echo $idpagamento;
echo "</font>";
echo "</h1>";
?>
        </div>
		<div class="rodape-div"></div>		<!-- <p>Loja Cusko</p> caso queira colocar frase dentro do rodape -->
		</div>
         <div class="dir-div">								
         <?php
         require_once('menulado.php');	
         ?>
		</div>
</div>
</body>
</html>
