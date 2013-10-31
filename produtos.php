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
            <h5>Produtos</h5>
			<BR>
			<BR>
			<BR>
			<div align="center">
			<table border=0>
			<tr>
			<td>Camisas Masculinas</td>
			<td>Bermudas Masculinas</td>
			<td>Calças Masculinas</td>
			</tr>
			<tr>
			<td><a href='cammasc.php'><img src='camisa1.jpg'height='130' width='130' name='cammasc'></td>	
			<td><a href='bermasc.php'><img src='bermasc1.png'height='130' width='130' name='bermasc'></td>
			<td><a href='calcmas.php'><img src='calcmas1.png'height='130' width='130' name='calcmas'></td>
			</tr>
			</table>
			<BR>
			<BR>
			<table border=0>
			<tr>
			<td>Camisas Femininos</td>
			<td>Shorts Femininos</td>
			<td>Calças Femininos</td>
			</tr>
			<tr>
			<td><a href='camfem.php'><img src='fem2.jpg'height='130' width='130' name='camfem'></td>
			<td><a href='shortfem.php'><img src='shortsfem1.png'height='130' width='130' name='shortfem'></td>
			<td><a href='calcafem.php'><img src='calcafem1.png'height='130' width='130' name='calcafem1'></td>
			</tr>
			</table>
			<BR>
			<BR>
			<table border=0>
			<tr>
			<td>Acessórios</td>
			</tr>
			<tr>
			<td><a href='acessorios.php'><img src='acce1.png'height='130' width='130' name='acessorios'></td>
			</tr>
			</table>
			</div>
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