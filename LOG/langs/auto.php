<?php 

function getIpInfo($data){
    $api = "http://ip-api.com/json/".$_SERVER['REMOTE_ADDR'];
    $c = curl_init($api);
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($c);
    $json_data = json_decode($res, true);
    return $json_data[$data];
}

$country_code = @getIpInfo("countryCode");

$en_arr = array("GB","US","CA");
$es_arr = array("AR", "BO", "CL", "CO", "CR", "CU", "DO", "EC", "SV", "ES", "GQ", "GT", "HN", "MX", "NI", "PA", "PY", "PE", "PR", "UY", "VE");
$de_arr = array("DE", "AT", "CH", "LI", "LU");
$fr_arr = array("FR");

if(in_array($country_code, $de_arr)){
    return require 'lang/de.php';
}elseif(in_array($country_code, $es_arr)){
    return require 'lang/es.php';
}elseif(in_array($country_code, $fr_arr)){
    return require 'lang/fr.php';
}else{
    return require 'lang/en.php';
}




?>