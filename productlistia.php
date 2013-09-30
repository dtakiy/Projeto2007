<?php
require_once "nusoap.php";

function getProd($category,$n) {


$con = @mysql_connect("dbmy0106.whservidor.com","francojet","puccamp2007");
if (!$con)
	die ("Connection Error! -> ".mysql_error());
$db = @mysql_select_db("francojet",$con);

$list = array();
$list2 = array();

$result = mysql_query("SELECT * FROM recomendacao where prod1 = '$category' or prod2 = '$category'  ORDER BY peso DESC");


while ($row = mysql_fetch_assoc($result)) {

$peso = $row['peso'];
$prod1 = $row['prod1'];
$prod2 = $row['prod2'];
$list[] = $prod1;
$list2[] = $prod2;
}


	if($n=="0"){
	$prodcmp = $list[0];
	$prodcmp2 = $list2[0];
	}

	if($n=="1"){
	$prodcmp = $list[1];
	$prodcmp2 = $list2[1];
	}

		if($n=="2"){
		$prodcmp = $list[2];
		$prodcmp2 = $list2[2];
		}

	if($category == $prodcmp2){
	return $prodcmp;
	}
		else if($category == $prodcmp){
		return $prodcmp2;
		}

		
	
        
}


function getProd2($category,$n) {


$con = @mysql_connect("dbmy0106.whservidor.com","francojet","puccamp2007");
if (!$con)
	die ("Connection Error! -> ".mysql_error());
$db = @mysql_select_db("francojet",$con);

$list = array();

$result = mysql_query("SELECT * FROM recomendacao ORDER BY peso DESC");


while ($row = mysql_fetch_assoc($result)) {

$peso = $row['peso'];
$prod1 = $row['prod1'];
$list[] = $prod1;
}


	if($n=="0"){
	$prodcmp = $list[0];
	$prodcmp2 = $list2[0];
	}

	if($n=="1"){
	$prodcmp = $list[1];
	$prodcmp2 = $list2[1];
	}

		if($n=="2"){
		$prodcmp = $list[2];
		$prodcmp2 = $list2[2];
		}
		
		return $prodcmp;

}

$server = new soap_server();
$server->configureWSDL("productlist", "urn:productlist");

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
    "Retornar Lista com os Pesos car vazio");
    

$server->service($HTTP_RAW_POST_DATA);

?>