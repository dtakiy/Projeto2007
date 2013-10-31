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
            <h5>Contato</h5>
			<h7>
			<br>
			<br>
			<b>
			<center>Horário de Atendimento<br></center>
			<center>Segunda à Sexta 8:00 - 18:00<br></center>
			<center>Sábados 8:00 - 12:00<br></center>
			<br>
			<center>Endereço:<br></center>
			<center>Rua A nº 123<br></center>
			<center>Bairro Alfa - Campinas - SP<br></center>
			<br>
			<center>Telefone<br></center>
			<center>(19) 1234 - 5678<br></center>
			<br>
			<center>Email<br></center>
			<center>cusko@cusko.com.br<br></center>
			<br>			
			<br>
			<center><table>
			<tr>
			<td><center><a href="http://www.facebook.com/usecusko"><img src="facebook.png" HEIGHT="40" WIDTH="40" border="0"></td><td></a>facebook.com/usecusko</center></td>
			</tr>
			<tr>
			<td><center><a href="http://www.twitter.com/usecusko"><img src="twitter.png" HEIGHT="40" WIDTH="40" border="0"></td><td></a>twitter.com/usecusko</center></td>
			</tr>
			<tr>
			<td><center><a href="http://www.instagram.com/usecusko"><img src="instagram.png" HEIGHT="40" WIDTH="40" border="0"></td><td>instagram.com/usecusko </a></center></td>
			</tr>
			</table></center>
			</h7>
			</b>
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