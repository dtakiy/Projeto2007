<?php 
$con2 = @mysql_connect("dbmy0106.whservidor.com","francojet","puccamp2007");
if (!$con2)
	die ("Connection Error! -> ".mysql_error());
$db2 = @mysql_select_db("francojet",$con2);
?>