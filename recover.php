<!DOCTYPE html>
<html>
<head>
    <title>Live Chat</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <style>
        body { background-color: #fff200; text-align:center; }
    </style>
</head>
<body>
<th class="nav"><img src="chat/img/chat.jpg" width="250" height="200"></th>    
<?php
include('connect.php');
$dsdsss=$_POST['username'];
$sadsdsd = $db->prepare("SELECT count(*) FROM users WHERE username= :h");
	$sadsdsd->bindParam(':h', $dsdsss);
	$sadsdsd->execute();
	$rowaas = $sadsdsd->fetch(PDO::FETCH_NUM);
	$wapakpak=$rowaas[0];
?>
<?php
if ($wapakpak != 0) {
$dsdas=$_POST['username'];
$resultas = $db->prepare("SELECT * FROM users WHERE username= :a");
	$resultas->bindParam(':a', $dsdas);
	$resultas->execute();
	for($i=0; $rowas = $resultas->fetch(); $i++){
	$dsds=$rowas['question'];
	echo ''.$dsds.'
<form action="recoverpassword.php" method="POST">
<span style="color: #000000;">Answer</span><br>
<input type="hidden" name="username" value="'.$dsdas.'" /><input type="text" name="answer" value="" /><br><br>
<input type="submit" value="Next" />
<br /><br /><br /><br />
<p>Developped by wassim khazri</p>
</form>';
}
}
if ($wapakpak == 0) {
	echo '<div style="text-align:center; margin-top: 50px;">Registration Number Not Found
	<br>
	<p> if you think this is an error please contact wassim_khazri@hotmail.fr</p>
	<br>
	Developped by wassim khazri
	</div>';


}
?>
<!-- 
LinkedIn:https://www.linkedin.com/in/wassim-khazri-ab923a14b/
-->
</body>
</html>