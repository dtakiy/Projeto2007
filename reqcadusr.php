<head>
<title>Cusko</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel='icon' rel='icon' href='favicon.ico' type='image/ico' />
</head>
<body>
<?php 
//cadastro de consumidores
// atributos
$login= $_POST["username"];
$senha= $_POST["passusr"];
$email= $_POST["emailusr"];
$criptolog  = hash('md5', $login);
$criptopass = hash('md5', $senha);
$emailcript = base64_encode($email);

?>
<?php

require_once("conf.php");

$query = mysql_query("select * from usuarios where login='$criptolog' or email='$emailcript'");
$num = mysql_num_rows($query);
echo "$num" ;

if($num<1){
$result = mysql_query("INSERT into usuarios (login,senha,email,tipo,status) values('$criptolog'
,'$criptopass','$emailcript',2,1);");
echo "Cadastrado com Sucesso, clique <a href=index2.php>"; echo "aqui Para Navegar</a>.";
}

else{
echo "<h1>Não foi possivel fazer o cadastro</h1>";

echo "Para retornar ao cadastro clique <a href=cadusr.php>"; echo "aqui</a>.";
}
?>



</body>
</html>
