<?php
session_start();
echo "";
//echo session_id();
$usuario = $_SESSION['usrlogin']; 
$email = $_SESSION['email'];
$emailcripto = base64_decode($email);
?>
         <?php
         require_once("conf.php");
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
			<td><h6>Camisas Masculinas</h6></td>
			<?php
			echo "<td>";
			$sql = mysql_query("SELECT * FROM produtos where cat_produto=2 and status_prod=1 and qtd_produto >0 ORDER BY nome_produto LIMIT 0, 3",$con); 
			while ($row = mysql_fetch_assoc($sql)) {
			$nomefig = $row['imagem'];
			$nomelink = $row['nome_produto'];
			echo "<td><a href='$nomelink.php'><img src='$nomefig'height='130' width='130' name='cammasc'></td>	";
			echo "</td>";
			}
			echo "<td><a href='cammasc.php'><img src='plus.jpg'height='30' width='30' name='cammasc'></td>	";
			echo "</table>";
			?>
			<table border=0>
			<td><h6>Camisas Femininas</h6></td>
			<?php
			echo "<td>";
			$sql = mysql_query("SELECT * FROM produtos where cat_produto=3 and status_prod=1 and qtd_produto >0 ORDER BY nome_produto LIMIT 0, 3",$con); 
			while ($row = mysql_fetch_assoc($sql)) {
			$nomefig = $row['imagem'];
			$nomelink = $row['nome_produto'];
			echo "<td><a href='$nomelink.php'><img src='$nomefig'height='130' width='130' name='cammasc'></td>	";
			echo "</td>";
			}
			echo "<td><a href='camfem.php'><img src='plus.jpg'height='30' width='30' name='cammasc'></td>	";
			echo "</table>";
			?>

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