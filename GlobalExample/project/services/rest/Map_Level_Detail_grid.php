<?php

/**
* Rest client services.
* @author KikApp PHP Generator
* @version 1.0 
*/

require 'RestClient/HttpClient.class.php';

$url= "http://demo.kikapptools.com/SDMap/crud/getPlaces.php";

$data = array();
$merge = array("Id"=>"id","Title"=>"title","Description"=>"desc","Geolocation"=>"geo");

$searchValue = isset($_GET['Searchtext'])?$_GET['Searchtext']:"";
$start = isset($_GET['start'])?$_GET['start']:"";
$count = isset($_GET['count'])?$_GET['count']:"";

$cliente = HttpClient::getInstance();
$response = $cliente->getURL("GET", $url, $data);

if ($response == '{}' || $response == null || $response == '[]')
	$response = '{"empty":""}';

$cliente->jsonDecode($response);
$cliente->paginate($start, $count, $response);

$result = array();
$cliente->renameJsonKeys($response, $padre=null, $merge, $result);

/*
*/

$cliente->jsonEncode($result);
echo $result;
?>
