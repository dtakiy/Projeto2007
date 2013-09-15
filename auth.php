<?php
session_start();
include("valida.php");
require_once("conf.php");

   
    $usuario = (isset($_POST['login'])) ? $_POST['login'] : '';
    $senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
    
    $criptusr=hash('md5', $usuario);
    $criptsen=hash('md5', $senha);
    
	$result = mysql_query("select status from usuarios where login='$criptusr' and senha='$criptsen'");
    while ($row = mysql_fetch_assoc($result)) {
	$status= $row['status'];
   }
   	
  if (valida($usuario, $senha)==true && $status==1) {
  $tipo=$_SESSION['usrtipo'];
  	if($tipo==1 && $status==1){
      	header("location:adm.php");
    }
    	if($tipo==2 && $status==1){
         	  header("location:index2.php");
         }
       
    }
    		else{
    		expulsaVisitante2();

    		}
    	
?>