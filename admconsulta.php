<?php 
	session_start();
    $usuario = $_SESSION['usrlogin'];
    $tipo=$_SESSION['usrtipo'];
    $nome = $_SESSION['usrnome'];
    $nomedecripto = base64_decode($nome);
	
	if($tipo==1){
	echo "";
	}
	else 
	header("location:erro.php");
?>
 		<?php
		require_once('reader2.php');
		require_once('conf2.php');
		?> 		
</ul>
</div>				                          
            </ul>
        </div>
        <div class="esq-div">
        	<div class="destaques-div">
            <h5>Consultar Vendas</h5>
    <?php
$teste = array();
require_once "nusoap.php";
$client = new nusoap_client("http://www.francojet.net/productlistia.php?wsdl", true);


$email = 'tccdojet@gmail.com';
$token = '7ABF4DAA06A74269AF1A39D79FD91162';

$n=0;
$result = $client->call("token", array("category" => "".$n."","n" => "".$n.""));

if($result!=""){

$url = 'https://ws.pagseguro.uol.com.br/v2/transactions/' . $result . '?email=' . $email . '&token=' . $token;


$curl = curl_init($url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$transaction= curl_exec($curl);
curl_close($curl);
 
if($transaction == 'Unauthorized') {
    //Insira seu código avisando que o sistema está com problemas, sugiro enviar um e-mail avisando para alguém fazer a manutenção
    echo 'You shall not pass';
    exit;//Mantenha essa linha para evitar que o código prossiga
}
 
$transaction = simplexml_load_string($transaction);
 
if(count($transaction -> error) > 0) {

    //Aviso que houve um problema no carregamento do site
    //var_dump($transaction); 
   
    echo "<h1>";
    echo "<font color='black'>";
    echo "<BR>";
    echo "Código Invalido por favor verique se o código está correto.";
    echo "<BR>";
    echo "Quaisquer dúvidas entre em contato conosco: adm@cusko.com.br";
    echo "</font>";
    echo " </h1>";
}
else{
$data  = $transaction -> lastEventDate;
$nomec = $transaction -> sender -> name;
$endc  = $transaction -> shipping -> address->street;
$numc  = $transaction -> shipping -> address->number;
$compc = $transaction -> shipping -> address->complement;
$cidadec = $transaction -> shipping -> address->city;
$estadoc = $transaction -> shipping -> address->state;
$cepc = $transaction -> shipping -> address->postalcode;
$emailc = $transaction -> sender -> email;
$valorc = $transaction -> grossAmount;
$valoruni = $transaction ->items->item->amount;
$statusc = $transaction -> status;
$decc= $transaction ->items->item->description;
$itemc= $transaction -> itemCount;
$itemc = $itemc-1;

	for($i=0; $i <= count($transaction ->items); $i++) { 
	 $teste[] = $transaction ->items->item[$i]->description; 
	 }


$tamteste = count($teste); //contar número de itens

if($statusc == 1){
$sts = "Aguardando pagamento";
}
	else if($statusc == 2){
	$sts = "Em análise";
	}
		else if($statusc == 3){
		$sts = "Paga";
		}
			else if($statusc == 4){
			$sts = "Disponível";
			}
				else if($statusc == 5){
				$sts = "Em Disputa";
				}
					else if($statusc == 6){
					$sts = "Devolvida";
					}
						else if($statusc == 7){
					$sts = "Cancelada";
					}
	


echo "<BR>";
echo "<table border=1 font size=4  width='40' height='40'>
<th>Cod Compra</th></font><th>Status</th><th>Itens</th>
<tr>
<td>
<p>
<font size='3' color='black'>".$result."</td></font><td><font size='3'>".$sts."</td><td><font size='3'>";

for($j=0 ; $j<=$tamteste; $j++){

echo $teste[$j];
echo " ";
}

echo "</td>
</tr>
</table>";

}

} // if vazio
unset($teste);
		?>
		
		
		<?php
		$n=1;
$result = $client->call("token", array("category" => "".$n."","n" => "".$n.""));

if($result!=""){

$url = 'https://ws.pagseguro.uol.com.br/v2/transactions/' . $result . '?email=' . $email . '&token=' . $token;


$curl = curl_init($url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$transaction= curl_exec($curl);
curl_close($curl);
 
if($transaction == 'Unauthorized') {
    //Insira seu código avisando que o sistema está com problemas, sugiro enviar um e-mail avisando para alguém fazer a manutenção
    echo 'You shall not pass';
    exit;//Mantenha essa linha para evitar que o código prossiga
}
 
$transaction = simplexml_load_string($transaction);
 
if(count($transaction -> error) > 0) {

    //Aviso que houve um problema no carregamento do site
    //var_dump($transaction); 
   
    echo "<h1>";
    echo "<font color='black'>";
    echo "<BR>";
    echo "Código Invalido por favor verique se o código está correto.";
    echo "<BR>";
    echo "Quaisquer dúvidas entre em contato conosco: adm@cusko.com.br";
    echo "</font>";
    echo " </h1>";
}
else{
$data  = $transaction -> lastEventDate;
$nomec = $transaction -> sender -> name;
$endc  = $transaction -> shipping -> address->street;
$numc  = $transaction -> shipping -> address->number;
$compc = $transaction -> shipping -> address->complement;
$cidadec = $transaction -> shipping -> address->city;
$estadoc = $transaction -> shipping -> address->state;
$cepc = $transaction -> shipping -> address->postalcode;
$emailc = $transaction -> sender -> email;
$valorc = $transaction -> grossAmount;
$valoruni = $transaction ->items->item->amount;
$statusc = $transaction -> status;
$decc= $transaction ->items->item->description;
$itemc= $transaction -> itemCount;
$itemc = $itemc-1;

	for($i=0; $i <= count($transaction ->items); $i++) { 
	 $teste[] = $transaction ->items->item[$i]->description; 
	 }


$tamteste = count($teste); //contar número de itens

if($statusc == 1){
$sts = "Aguardando pagamento";
}
	else if($statusc == 2){
	$sts = "Em análise";
	}
		else if($statusc == 3){
		$sts = "Paga";
		}
			else if($statusc == 4){
			$sts = "Disponível";
			}
				else if($statusc == 5){
				$sts = "Em Disputa";
				}
					else if($statusc == 6){
					$sts = "Devolvida";
					}
						else if($statusc == 7){
					$sts = "Cancelada";
					}
	


echo "<BR>";
echo "<table border=1 font size=4  width='40' height='40'>
<th>Cod Compra</th></font><th>Status</th><th>Itens</th>
<tr>
<td>
<p>
<font size='3' color='black'>".$result."</td></font><td><font size='3'>".$sts."</td><td><font size='3'>";

for($j=0 ; $j<=$tamteste; $j++){

echo $teste[$j];
echo " ";
}

echo "</td>
</tr>
</table>";

}

} // if vazio
unset($teste);
		?>
		
				<?php
		$n=2;
$result = $client->call("token", array("category" => "".$n."","n" => "".$n.""));

if($result!=""){

$url = 'https://ws.pagseguro.uol.com.br/v2/transactions/' . $result . '?email=' . $email . '&token=' . $token;


$curl = curl_init($url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$transaction= curl_exec($curl);
curl_close($curl);
 
if($transaction == 'Unauthorized') {
    //Insira seu código avisando que o sistema está com problemas, sugiro enviar um e-mail avisando para alguém fazer a manutenção
    echo 'You shall not pass';
    exit;//Mantenha essa linha para evitar que o código prossiga
}
 
$transaction = simplexml_load_string($transaction);
 
if(count($transaction -> error) > 0) {

    //Aviso que houve um problema no carregamento do site
    //var_dump($transaction); 
   
    echo "<h1>";
    echo "<font color='black'>";
    echo "<BR>";
    echo "Código Invalido por favor verique se o código está correto.";
    echo "<BR>";
    echo "Quaisquer dúvidas entre em contato conosco: adm@cusko.com.br";
    echo "</font>";
    echo " </h1>";
}
else{
$data  = $transaction -> lastEventDate;
$nomec = $transaction -> sender -> name;
$endc  = $transaction -> shipping -> address->street;
$numc  = $transaction -> shipping -> address->number;
$compc = $transaction -> shipping -> address->complement;
$cidadec = $transaction -> shipping -> address->city;
$estadoc = $transaction -> shipping -> address->state;
$cepc = $transaction -> shipping -> address->postalcode;
$emailc = $transaction -> sender -> email;
$valorc = $transaction -> grossAmount;
$valoruni = $transaction ->items->item->amount;
$statusc = $transaction -> status;
$decc= $transaction ->items->item->description;
$itemc= $transaction -> itemCount;
$itemc = $itemc-1;

	for($i=0; $i <= count($transaction ->items); $i++) { 
	 $teste[] = $transaction ->items->item[$i]->description; 
	 }


$tamteste = count($teste); //contar número de itens

if($statusc == 1){
$sts = "Aguardando pagamento";
}
	else if($statusc == 2){
	$sts = "Em análise";
	}
		else if($statusc == 3){
		$sts = "Paga";
		}
			else if($statusc == 4){
			$sts = "Disponível";
			}
				else if($statusc == 5){
				$sts = "Em Disputa";
				}
					else if($statusc == 6){
					$sts = "Devolvida";
					}
						else if($statusc == 7){
					$sts = "Cancelada";
					}
	


echo "<BR>";
echo "<table border=1 font size=4  width='40' height='40'>
<th>Cod Compra</th></font><th>Status</th><th>Itens</th>
<tr>
<td>
<p>
<font size='3' color='black'>".$result."</td></font><td><font size='3'>".$sts."</td><td><font size='3'>";

for($j=0 ; $j<=$tamteste; $j++){

echo $teste[$j];
echo " ";
}

echo "</td>
</tr>
</table>";

}

} // if vazio
unset($teste);
		?>
		
		
				<?php
		$n=3;
$result = $client->call("token", array("category" => "".$n."","n" => "".$n.""));

if($result!=""){

$url = 'https://ws.pagseguro.uol.com.br/v2/transactions/' . $result . '?email=' . $email . '&token=' . $token;


$curl = curl_init($url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$transaction= curl_exec($curl);
curl_close($curl);
 
if($transaction == 'Unauthorized') {
    //Insira seu código avisando que o sistema está com problemas, sugiro enviar um e-mail avisando para alguém fazer a manutenção
    echo 'You shall not pass';
    exit;//Mantenha essa linha para evitar que o código prossiga
}
 
$transaction = simplexml_load_string($transaction);
 
if(count($transaction -> error) > 0) {

    //Aviso que houve um problema no carregamento do site
    //var_dump($transaction); 
   
    echo "<h1>";
    echo "<font color='black'>";
    echo "<BR>";
    echo "Código Invalido por favor verique se o código está correto.";
    echo "<BR>";
    echo "Quaisquer dúvidas entre em contato conosco: adm@cusko.com.br";
    echo "</font>";
    echo " </h1>";
}
else{
$data  = $transaction -> lastEventDate;
$nomec = $transaction -> sender -> name;
$endc  = $transaction -> shipping -> address->street;
$numc  = $transaction -> shipping -> address->number;
$compc = $transaction -> shipping -> address->complement;
$cidadec = $transaction -> shipping -> address->city;
$estadoc = $transaction -> shipping -> address->state;
$cepc = $transaction -> shipping -> address->postalcode;
$emailc = $transaction -> sender -> email;
$valorc = $transaction -> grossAmount;
$valoruni = $transaction ->items->item->amount;
$statusc = $transaction -> status;
$decc= $transaction ->items->item->description;
$itemc= $transaction -> itemCount;
$itemc = $itemc-1;

	for($i=0; $i <= count($transaction ->items); $i++) { 
	 $teste[] = $transaction ->items->item[$i]->description; 
	 }


$tamteste = count($teste); //contar número de itens

if($statusc == 1){
$sts = "Aguardando pagamento";
}
	else if($statusc == 2){
	$sts = "Em análise";
	}
		else if($statusc == 3){
		$sts = "Paga";
		}
			else if($statusc == 4){
			$sts = "Disponível";
			}
				else if($statusc == 5){
				$sts = "Em Disputa";
				}
					else if($statusc == 6){
					$sts = "Devolvida";
					}
						else if($statusc == 7){
					$sts = "Cancelada";
					}
	


echo "<BR>";
echo "<table border=1 font size=4  width='40' height='40'>
<th>Cod Compra</th></font><th>Status</th><th>Itens</th>
<tr>
<td>
<p>
<font size='3' color='black'>".$result."</td></font><td><font size='3'>".$sts."</td><td><font size='3'>";

for($j=0 ; $j<=$tamteste; $j++){

echo $teste[$j];
echo " ";
}

echo "</td>
</tr>
</table>";

}

} // if vazio
unset($teste);
		?>
		
				<?php
		$n=4;
$result = $client->call("token", array("category" => "".$n."","n" => "".$n.""));

if($result!=""){

$url = 'https://ws.pagseguro.uol.com.br/v2/transactions/' . $result . '?email=' . $email . '&token=' . $token;


$curl = curl_init($url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$transaction= curl_exec($curl);
curl_close($curl);
 
if($transaction == 'Unauthorized') {
    //Insira seu código avisando que o sistema está com problemas, sugiro enviar um e-mail avisando para alguém fazer a manutenção
    echo 'You shall not pass';
    exit;//Mantenha essa linha para evitar que o código prossiga
}
 
$transaction = simplexml_load_string($transaction);
 
if(count($transaction -> error) > 0) {

    //Aviso que houve um problema no carregamento do site
    //var_dump($transaction); 
   
    echo "<h1>";
    echo "<font color='black'>";
    echo "<BR>";
    echo "Código Invalido por favor verique se o código está correto.";
    echo "<BR>";
    echo "Quaisquer dúvidas entre em contato conosco: adm@cusko.com.br";
    echo "</font>";
    echo " </h1>";
}
else{
$data  = $transaction -> lastEventDate;
$nomec = $transaction -> sender -> name;
$endc  = $transaction -> shipping -> address->street;
$numc  = $transaction -> shipping -> address->number;
$compc = $transaction -> shipping -> address->complement;
$cidadec = $transaction -> shipping -> address->city;
$estadoc = $transaction -> shipping -> address->state;
$cepc = $transaction -> shipping -> address->postalcode;
$emailc = $transaction -> sender -> email;
$valorc = $transaction -> grossAmount;
$valoruni = $transaction ->items->item->amount;
$statusc = $transaction -> status;
$decc= $transaction ->items->item->description;
$itemc= $transaction -> itemCount;
$itemc = $itemc-1;

	for($i=0; $i <= count($transaction ->items); $i++) { 
	 $teste[] = $transaction ->items->item[$i]->description; 
	 }


$tamteste = count($teste); //contar número de itens

if($statusc == 1){
$sts = "Aguardando pagamento";
}
	else if($statusc == 2){
	$sts = "Em análise";
	}
		else if($statusc == 3){
		$sts = "Paga";
		}
			else if($statusc == 4){
			$sts = "Disponível";
			}
				else if($statusc == 5){
				$sts = "Em Disputa";
				}
					else if($statusc == 6){
					$sts = "Devolvida";
					}
						else if($statusc == 7){
					$sts = "Cancelada";
					}
	


echo "<BR>";
echo "<table border=1 font size=4  width='40' height='40'>
<th>Cod Compra</th></font><th>Status</th><th>Itens</th>
<tr>
<td>
<p>
<font size='3' color='black'>".$result."</td></font><td><font size='3'>".$sts."</td><td><font size='3'>";

for($j=0 ; $j<=$tamteste; $j++){

echo $teste[$j];
echo " ";
}

echo "</td>
</tr>
</table>";

}

} // if vazio
unset($teste);
		?>

       
           
        </div>
<div class="rodape-div"><p>Loja Cusko</p></div>		
</div>
         <div class="dir-div">								
         <?php
		require_once('menulado.php');
		?> 		
		</div>	
</div>
</body>
</html>