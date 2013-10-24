<?php
require_once "nusoap.php";

function getProd($category,$n) {


$con = @mysql_connect("dbmy0106.whservidor.com","francojet","puccamp2007");
if (!$con)
	die ("Connection Error! -> ".mysql_error());
$db = @mysql_select_db("francojet",$con);

$list5 = array();
$list7 = array();
$j=0;

$result2 = mysql_query("SELECT * FROM recomendacao ORDER BY peso ASC");


while ($row = mysql_fetch_assoc($result2)) {

$peso = $row['peso'];
$prod1 = $row['prod1'];
$prod2 = $row['prod2'];
$list7[$j] = $prod1;
$j = $j+1;
$list7[$j] = $prod2;
$j = $j+1;
}

$list5 = array_unique($list7);


if($n==0){
return $list5[0];
}
if($n==1){
return $list5[1];
}
if($n==2){
return $list5[2];
}
if($n==3){
return $list5[3];
}
if($n==4){
return $list5[4];
}
else{
return $list5[$n];
}
      
}


function getProd2($category,$n) {


$con = @mysql_connect("dbmy0106.whservidor.com","francojet","puccamp2007");
if (!$con)
	die ("Connection Error! -> ".mysql_error());
$db = @mysql_select_db("francojet",$con);

$list3 = array();
$list4 = array();

$result = mysql_query("SELECT * FROM recomendacao where prod1='$category ' OR prod2 = '$category ' ORDER BY peso ASC ");

$i=0;

while ($row = mysql_fetch_assoc($result)) {

$peso = $row['peso'];
$prod1 = $row['prod1'];
$prod2 = $row['prod2'];
$list3[$i] = $prod1;
$i = $i+1;
$list3[$i] = $prod2;
$i = $i+1;
}

$list4 = array_unique($list3);


if($n==0){
return $list4[0];
}
	if($n==1){
	return $list4[1];
	}
		if($n==2){
		return $list4[2];
		}
			if($n==3){
			return $list4[3];
			}
				if($n==4){
				return $list4[4];
				}
				else{
				return $list4[$n];
				}
      
}



$server = new soap_server();
$server->configureWSDL("productlistia", "urn:productlistia");

$server->register("getProd",
    array("category" => "xsd:string","n" => "xsd:string"),
    array("return" => "xsd:string"),
    "urn:productlist",
    "urn:productlist#getProd",
    "rpc",
    "encoded",
    "Retornar Lista com os Pesos");
    
    
    $server->register("getProd2",
    array("category" => "xsd:string","n" => "xsd:string"),
    array("return" => "xsd:string"),
    "urn:productlist",
    "urn:productlist#getProd",
    "rpc",
    "encoded",
    "Retornar Lista com os Pesos carrinho vazio");

$server->service($HTTP_RAW_POST_DATA);

?>