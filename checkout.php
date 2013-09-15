<?php
session_start();
$sessao=session_id();
$usuario = $_SESSION['usrlogin']; 
require_once("conf.php");

?>

<?php
//require_once 'PagSeguroLibrary/PagSeguroLibrary.php';
$url = 'https://ws.pagseguro.uol.com.br/v2/checkout';

$nameusr = "$_POST[nomeckt]";
$email  = "$_POST[emailckt]";
$numero  = "$_POST[numckt]";
$cmp  = "$_POST[cmpckt]";
$cidade  = "$_POST[cidadeckt]";
$cep  = "$_POST[cepckt]";
$estado  = "$_POST[estadockt]";

//procura produtos para fazer a distancia
$lista = array(); // lista que colocara os produtos
$rst = mysql_query("SELECT * FROM carrinho where sessao='$sessao'",$con);
while ($row = mysql_fetch_assoc($rst)) {
$nprd = $row['nome'];
$lista[] = $nprd;
}

$listatam=count($lista);
if($listatam > 1){
$z=0;
while ($z < $listatam){
	$x = $z+1;

	for($x;$x<$listatam;$x++){
		
	
	$cmp = $lista[$x];
	$cmp2 = $lista[$z];
			

	}
	
	$z=$z+1;
}
}

$result = mysql_query("SELECT * FROM carrinho where sessao='$sessao'",$con);

$nitens=0;

$data['email'] = 'tccdojet@gmail.com';
$data['token'] = '7ABF4DAA06A74269AF1A39D79FD91162';
$data['currency'] = 'BRL';


while ($row = mysql_fetch_assoc($result)) {

	$nitens=$nitens+1;
	$itemid = 'itemId'.$nitens;
	$itemDescription = 'itemDescription'.$nitens;
	$itemAmount = 'itemAmount'.$nitens;
	$itemQuantity = 'itemQuantity'.$nitens;
	$itemWeight = 'itemWeight'.$nitens;
	
	$cod = $row['cod'];
	$nome = $row['nome'];
	$preco = $row['preco'];
	$qtd = $row['qtd'];
	$peso= $row['peso'];
	$sessao = $row['sessao'];

	$data[$itemid] = $cod;
	$data[$itemDescription] = $nome;
	$data[$itemAmount] = $preco;
	$data[$itemQuantity] = $qtd;
	$data[$itemWeight] = $peso;
	
}
	$nitens=$nitens+1;
	$itemid = 'itemId'.$nitens;
	$itemDescription = 'itemDescription'.$nitens;
	$itemAmount = 'itemAmount'.$nitens;
	$itemQuantity = 'itemQuantity'.$nitens;
	$itemWeight = 'itemWeight'.$nitens;
	
	
	//adicionando o frete no checkout
	$cepreplace2 = str_replace("-", "", $cep);
	include("calcfrete.php");
	$vlrfrete = calcula_frete('40010','13901150',$cepreplace2,'0.5');
	$vlrfrete2 = str_replace(",",".",$vlrfrete);
	
	$data[$itemid] = '999';
	$data[$itemDescription] = 'Frete';
	$data[$itemAmount] = $vlrfrete2;
	$data[$itemQuantity ] = '1';
	$data[$itemWeight] = '0';


$data['senderName'] = $nameusr;

$data['senderAreaCode'] = '11';

$data['senderPhone'] = '56273440';

$data['senderCPF'] = '34237390888';

$data['senderEmail'] = $email;

$data['shippingType'] = '1';

$data['shippingAddressStreet'] = '';

$data['shippingAddressNumber'] = $numero;

$data['shippingAddressComplement'] = $cmp;

$data['shippingAddressDistrict'] = '';

$data['shippingAddressPostalCode'] = $cep;

$data['shippingAddressCity'] = $cidade;

$data['shippingAddressState'] = $estado;

$data['shippingAddressCountry'] = 'BRA';

$data['redirectURL'] = 'http://www.francojet.net/retorno.php';

 

$data = http_build_query($data);

 

$curl = curl_init($url);

 

curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

curl_setopt($curl, CURLOPT_POST, true);

curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

$xml= curl_exec($curl);

 

if($xml == 'Unauthorized'){

//Insira seu código de prevenção a erros

 

header('Location: erro.php?tipo=autenticacao');

exit;//Mantenha essa linha

}

curl_close($curl);

 

$xml= simplexml_load_string($xml);

if(count($xml -> error) > 0){

//Insira seu código de tratamento de erro, talvez seja útil enviar os códigos de erros.

header('Location: erro.php?tipo=dadosInvalidos');
exit;
}
$url0 = 'https://pagseguro.uol.com.br/v2/checkout/payment.html?code='.$xml -> code;

echo "<META HTTP-EQUIV='Refresh' Content='0; URL=$url0'>";
//header('Location: https://pagseguro.uol.com.br/v2/checkout/payment.html?code=' . $xml -> code);

?>
