<?php 

$username=$_POST['user_name'];

$crip=hash('sha512', $username);

$con = mysql_connect("localhost","root","");
if (!$con)
	die ("Connection Error! -> ".mysql_error());
$db = mysql_select_db("mydb",$con);

$result = mysql_query("SELECT login FROM usuarios where login = '$crip' ");

while ($row = mysql_fetch_assoc($result)) {
	if($row!='#0'){
	{echo '<script> alert("Login já escolido insira outro"); return false; </script>';return false;}
	}
		else if($row>='#1'){
		echo '<span class="success">login disponivel.</span>';
		}	
}

mysql_free_result($result);
//mysqli_close($con);
?>