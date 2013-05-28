<?php
require_once("conf.php");

if ($_POST['action'] == 'apagar') {
 
$cod = "$_POST[nome]";
echo "O Codigo Foi Apagado Com Sucesso";
echo $cod;

$result = mysql_query("DELETE FROM PRODUTOS WHERE codigo_prod=$cod");


echo $result;
}


  else if ($_POST['action'] == 'editar') {
   
   echo "<input type='text name='editcod'/>";
   echo "<BR>";
   echo "<input type='text name='editcod'/>";
   echo "<BR>";
   echo "<input type='text name='editcod'/>";
   echo "<BR>";
   echo "<input type='text name='editcod'/>";
   echo "<BR>";
   echo "<input type='text name='editcod'/>";
   
      }

else{

echo "ERRO";

}

?>

