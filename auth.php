<?php
session_start();
include("valida.php");

    $usuario = (isset($_POST['login'])) ? $_POST['login'] : '';
    $senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
	$status = $_SESSION['status'];
	
  if (valida($usuario, $senha)==true && $status==1) {
  $tipo=$_SESSION['usrtipo'];
  	if($tipo==1){
      	header("location:adm.php");
    }
    	if($tipo==2){
         	  header("location:index2.php");
         }
       
    }
    		else{
    		expulsaVisitante();
    		}
    	
?>