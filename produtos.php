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
			<?php
			$sql = mysql_query("SELECT * FROM produtos where cat_produto=2 and status_prod=1 and qtd_produto >0 ORDER BY nome_produto LIMIT 0, 3",$con); 
			$numr = mysql_num_rows($sql);
			if($numr > 0){
				echo "			<table border=0>
				<td><h6>Camisa Masculina</h6></td>";
				echo "<td>";
				while ($row = mysql_fetch_assoc($sql)) {
				$nomefig = $row['imagem'];
				$nomelink = $row['nome_produto'];
				echo "<td><a href='$nomelink.php'><img src='$nomefig'height='130' width='130' name='cammasc'></td>	";
				echo "</td>";
				}
				echo "<td><a href='cammasc.php'><img src='plus.jpg'height='30' width='30' name='cammasc'></td>	";
				echo "</table>";
			}
			else{
			echo "";
			}
			?>
			
			<?php
			$sql = mysql_query("SELECT * FROM produtos where cat_produto=3 and status_prod=1 and qtd_produto >0 ORDER BY nome_produto LIMIT 0, 3",$con); 
			$numr = mysql_num_rows($sql);
			if($numr > 0){
				echo "			<table border=0>
				<td><h6>Camisa Feminina</h6></td>";
				echo "<td>";
				while ($row = mysql_fetch_assoc($sql)) {
				$nomefig = $row['imagem'];
				$nomelink = $row['nome_produto'];
				echo "<td><a href='$nomelink.php'><img src='$nomefig'height='130' width='130' name='cammasc'></td>	";
				echo "</td>";
				}
				echo "<td><a href='camfem.php'><img src='plus.jpg'height='30' width='30' name='cammasc'></td>	";
				echo "</table>";
			}
			else{
			echo "";
			}
			?>
			
			<?php
			$sql = mysql_query("SELECT * FROM produtos where cat_produto=4 and status_prod=1 and qtd_produto >0 ORDER BY nome_produto LIMIT 0, 3",$con); 
			$numr = mysql_num_rows($sql);
			if($numr > 0){
				echo "			<table border=0>
				<td><h6>Calças Masculinas</h6></td>";
				echo "<td>";
				while ($row = mysql_fetch_assoc($sql)) {
				$nomefig = $row['imagem'];
				$nomelink = $row['nome_produto'];
				echo "<td><a href='$nomelink.php'><img src='$nomefig'height='130' width='130' name='cammasc'></td>	";
				echo "</td>";
				}
				echo "<td><a href='calcmas.php'><img src='plus.jpg'height='30' width='30' name='cammasc'></td>	";
				echo "</table>";
			}
			else{
			echo "";
			}
			?>
			
			<?php
			$sql = mysql_query("SELECT * FROM produtos where cat_produto=5 and status_prod=1 and qtd_produto >0 ORDER BY nome_produto LIMIT 0, 3",$con); 
			$numr = mysql_num_rows($sql);
			if($numr > 0){
				echo "			<table border=0>
				<td><h6>Calças Femininas</h6></td>";
				echo "<td>";
				while ($row = mysql_fetch_assoc($sql)) {
				$nomefig = $row['imagem'];
				$nomelink = $row['nome_produto'];
				echo "<td><a href='$nomelink.php'><img src='$nomefig'height='130' width='130' name='cammasc'></td>	";
				echo "</td>";
				}
				echo "<td><a href='calcafem.php'><img src='plus.jpg'height='30' width='30' name='cammasc'></td>	";
				echo "</table>";
			}
			else{
			echo "";
			}
			?>
			
			
			<?php
			$sql = mysql_query("SELECT * FROM produtos where cat_produto=6 and status_prod=1 and qtd_produto >0 ORDER BY nome_produto LIMIT 0, 3",$con); 
			$numr = mysql_num_rows($sql);
			if($numr > 0){
				echo "			<table border=0>
				<td><h6>Bermudas Masculinas</h6></td>";
				echo "<td>";
				while ($row = mysql_fetch_assoc($sql)) {
				$nomefig = $row['imagem'];
				$nomelink = $row['nome_produto'];
				echo "<td><a href='$nomelink.php'><img src='$nomefig'height='130' width='130' name='cammasc'></td>	";
				echo "</td>";
				}
				echo "<td><a href='bermasc.php'><img src='plus.jpg'height='30' width='30' name='cammasc'></td>	";
				echo "</table>";
			}
			else{
			echo "";
			}
			?>
			
			<?php
			$sql = mysql_query("SELECT * FROM produtos where cat_produto=7 and status_prod=1 and qtd_produto >0 ORDER BY nome_produto LIMIT 0, 3",$con); 
			$numr = mysql_num_rows($sql);
			if($numr > 0){
				echo "			<table border=0>
				<td><h6>Shorts Femininos</h6></td>";
				echo "<td>";
				while ($row = mysql_fetch_assoc($sql)) {
				$nomefig = $row['imagem'];
				$nomelink = $row['nome_produto'];
				echo "<td><a href='$nomelink.php'><img src='$nomefig'height='130' width='130' name='cammasc'></td>	";
				echo "</td>";
				}
				echo "<td><a href='shortfem.php'><img src='plus.jpg'height='30' width='30' name='cammasc'></td>	";
				echo "</table>";
			}
			else{
			echo "";
			}
			?>
			
			<?php
			$sql = mysql_query("SELECT * FROM produtos where cat_produto=8 and status_prod=1 and qtd_produto >0 ORDER BY nome_produto LIMIT 0, 3",$con); 
			$numr = mysql_num_rows($sql);
			if($numr > 0){
				echo "			<table border=0>
				<td><h6>Acessórios</h6></td>";
				echo "<td>";
				while ($row = mysql_fetch_assoc($sql)) {
				$nomefig = $row['imagem'];
				$nomelink = $row['nome_produto'];
				echo "<td><a href='$nomelink.php'><img src='$nomefig'height='130' width='130' name='cammasc'></td>	";
				echo "</td>";
				}
				echo "<td><a href='acessorios.php'><img src='plus.jpg'height='30' width='30' name='cammasc'></td>	";
				echo "</table>";
			}
			else{
			echo "";
			}
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