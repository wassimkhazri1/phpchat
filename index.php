<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="css/login.css" />
<!-- https://code.jquery.com/jquery-3.7.1.min.js -->
<style>

	body {
		text-align:center;
	}
</style>
</head>
<body>

    <!-- 
for more information contact me on the following details;
email address: wassim_khazri@hotmail.fr
phone number: +216 52371547
LinkedIn:https://www.linkedin.com/in/wassim-khazri-ab923a14b/
-->

<div class="form-group">
<th class="nav"><img src="chat/img/chat.jpg" width="250" height="200"></th>
<?php
	require('db.php');
	session_start();
    if (isset($_POST['username'])){
        $username = $_POST['username'];
        $pss = $_POST['password'];
		$username = stripslashes($username);
		$username = mysqli_real_escape_string($conn,$username);
		$pss = stripslashes($pss);
		$pss = mysqli_real_escape_string($conn,$pss);
	    
        //Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password='$pss'";
		$result = mysqli_query($conn,$query) or die(mysqli_error($conn));
		$rows = mysqli_num_rows($result);
		$row = mysqli_fetch_array($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			$_SESSION['fullname'] = $row['fullname'];
			header("Location: choose.php"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Username or password is incorrect.</h3><br/>Click here to <a href='index.php'>Login</a></div>";
				}
    }else{
?>
<div class="form">
<h1>Sign In</h1>
<form action="" method="post" name="login">
<input type="number" name="username" placeholder="registration number" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='signup.php'>Signup Here</a></p>
<p text-align="right">Forgot Password? Click <a href="#" onClick="MyWindow=window.open('pwordrecover.php','MyWindow','toolbar=no,location=no,directories=yes,status=yes,menubar=yes,scrollbars=yes,resizable=yes,width=300,height=250'); return false;">Here</a></span></p>
</div>
<?php } ?>
</body>
<br><br><br><br>
<p>Developped by: <a><strong><a href="https://www.linkedin.com/in/wassim-khazri-ab923a14b/" target="_blank">Wassim khazri </strong></p>
</html>