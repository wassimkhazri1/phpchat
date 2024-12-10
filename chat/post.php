<?php
session_start();
if(isset($_SESSION['name'])){
    $text = $_POST['text'];
     
    $cb = fopen("log.html", 'a');
    fwrite($cb, "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION['name']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
    fclose($cb);
}
?>

<html>
    <!-- 
for more information contact me on the following details;
email address: wassim_khazri@hotmail.fr
phone number: +216 52371547
LinkedIn:https://www.linkedin.com/in/wassim-khazri-ab923a14b/
-->
</html>