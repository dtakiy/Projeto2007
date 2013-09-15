<?php 
$con = @mysql_connect("192.168.56.101","adm","123");
if (!$con)
	die ("Connection Error! -> ".mysql_error());
$db = @mysql_select_db("mydb",$con);
?>