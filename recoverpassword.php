<!DOCTYPE html>
<html>
<head>
    <title>Live Chat</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <style>
        body { background-color: #fff200;}
    </style>
</head>
<body>
<div style="text-align:center; margin-top: 50px;">
<th class="nav"><img src="chat/img/ch.jpg" width="250" height="200"></th>
<?php
include('connect.php');
$dsdas=$_POST['username'];
$ans=$_POST['answer'];
$sadsdsd = $db->prepare("SELECT count(*) FROM users WHERE username= :k AND answer= :l");
	$sadsdsd->bindParam(':k', $dsdas);
	$sadsdsd->bindParam(':l', $ans);
	$sadsdsd->execute();
	$rowaas = $sadsdsd->fetch(PDO::FETCH_NUM);
	$wapakpak=$rowaas[0];
?>
<?php
if ($wapakpak != 0) {
$resultas = $db->prepare("SELECT * FROM users WHERE username= :a AND  answer= :b");
	$resultas->bindParam(':a', $dsdas);
	$resultas->bindParam(':b', $ans);
	$resultas->execute();
	for($i=0; $rowas = $resultas->fetch(); $i++){
	?>
Your Password is : <?php echo $rowas['password']; ?>
<br /><br /><br /><br /><br />
<p> Developped by Wassim khazri</p>
<?php
}
}
if ($wapakpak == 0) {
echo 'Incorrect answer...';
}
?>
</div>
<!-- 
LinkedIn:https://www.linkedin.com/in/wassim-khazri-ab923a14b/
-->
</body>
</html>