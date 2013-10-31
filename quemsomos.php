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
            <h5>Quem Somos</h5>
			<h6>Um conceito novo que chegou para quebrar os padrões. 
			É desse modo que a Cusko veio trazer para você a sua primeira coleção “Break the edge”. 
			Usando como inspiração a cultura peruana, a Cusko veio para dominar seu armário e sua mala de viagem, com muito estilo e bom humor. 
			Liberdade, música, amigos, viagens e muita lhama é o que desejamos para todos vocês! Seja Cusko você também!	
			<BR>
			Use Cusko!</h6>
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