<?php

$_SG['conectaServidor'] = true;    
$_SG['abreSessao'] = true;         

$_SG['servidor'] = 'localhost';   
$_SG['usuario'] = 'root';         
$_SG['senha'] = '';               
$_SG['banco'] = 'mydb';            

$_SG['paginaLogin'] = 'index.php'; 

$_SG['tabela'] = 'usuarios';       // Nome da tabela onde os usuários são salvos


if ($_SG['conectaServidor'] == true) {
$_SG['link'] = mysql_connect($_SG['servidor'], $_SG['usuario'], $_SG['senha']) or die("MySQL: Não foi possível conectar-se ao servidor [".$_SG['servidor']."].");
mysql_select_db($_SG['banco'], $_SG['link']) or die("MySQL: Não foi possível conectar-se ao banco de dados [".$_SG['banco']."].");
}

// Verifica se precisa iniciar a sessão
if ($_SG['abreSessao'] == true) {
session_start();
}


function valida($usuario, $senha) {
global $_SG;


$criptusr=hash('md5', $usuario);
$criptsen=hash('md5', $senha);

// funcao para tirar as aspas

$nusuario = addslashes($criptusr);
$nsenha = addslashes($criptsen);


$result = mysql_query("select login,tipo from usuarios where login='$nusuario' and senha='$nsenha'");
$row = mysql_fetch_assoc($result);



if ($row <= 0) {

return false;

} else {

$result2 = mysql_query("select login,tipo,nome,status from usuarios where login='$nusuario' and senha='$nsenha'");
  while ($row = mysql_fetch_assoc($result2)) {
	$log = $row['login'];
	$tipo = $row['tipo'];
	$nome= $row['nome'];
	$status= $row['status'];
}

$_SESSION['usrlogin']=$log; 
$_SESSION['usrtipo'] = $tipo;
$_SESSION['usrnome'] = $nome;
$_SESSION['status'] = $status;

return true;
}


}


function protegePagina() {
global $_SG;

if (!isset($_SESSION['usuarioID']) OR !isset($_SESSION['usuarioNome'])) {
expulsaVisitante();
} 

}


/**
* Função para expulsar um visitante
*/
function expulsaVisitante() {
global $_SG;

// Remove as variáveis da sessão (caso elas existam)
unset($_SESSION['usrlogin'], $_SESSION['usrtipo'], $_SESSION['usrnome']);

header("location:index.php");
}

?>