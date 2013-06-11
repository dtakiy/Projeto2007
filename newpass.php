<?php
require_once("conf.php");

$senha = "$_POST[senusr]";
$email = $_GET['acao'];
$senhacripto= hash('md5', $senha);


$result = mysql_query("UPDATE usuarios SET senha='$senhacripto' WHERE email='$email'");
if($result>=1)
{
echo "Senha mudada com sucesso";

}
else
echo "ERRO";

?>



