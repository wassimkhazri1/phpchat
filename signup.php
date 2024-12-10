<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Sign Up Form</title>
<link rel="stylesheet" href="css/signup.css" />
</head>
<body>
<div class="form-group form">
	<th class="nav" style="text-align:center;"><img src="chat/img/chat.jpg" width="250" height="200"></th>
<?php
	require('db.php');
    if (isset($_POST['username'])){		
        $username = $_POST['username'];
		$quer = "SELECT * FROM `users` WHERE username='$username'";	
		$res = mysqli_query($conn,$quer);	
		$fullname = $_POST['fullname'];
		$Department = $_POST['department'];
		$pss = $_POST['password'];
		$question = $_POST['question'];
		$answer = $_POST['answer'];
		$username = stripslashes($username);
		$username = mysqli_real_escape_string($conn,$username);
		$fullname = stripslashes($fullname);
		$fullname = mysqli_real_escape_string($conn,$fullname);
		$trn_date = date("Y-m-d H:i:s");
		$Department = stripslashes($Department);
		$Department = mysqli_real_escape_string($conn,$Department);
		$pss = stripslashes($pss);
		$pss = mysqli_real_escape_string($conn,$pss);
		$question = stripslashes($question);
		$question = mysqli_real_escape_string($conn,$question);
		$answer = stripslashes($answer);
		$answer = mysqli_real_escape_string($conn,$answer);
		if($res &&  $res->num_rows > 0){

			echo "<div class='error'><h3>username already exist, choose onother one.<h3></div>";
?>
<div class="form">
<h1>Registration Form</h1>
<form name="registration" action="" method="post">
<input type="number" name="username" placeholder="Registration Number" value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>" required />
<input type="fullname" name="fullname" placeholder="full name" value="<?php echo isset($fullname) ? htmlspecialchars($fullname) : ''; ?>" required/>
<input type="password" name="password" placeholder="Password" value="<?php echo isset($pss) ? htmlspecialchars($pss) : ''; ?>" required />
<select name="department" required>
        <option value="">---------CHOOSE---------</option>
        <option value="COMPUTER SCIENCE" <?php echo ($Department == "COMPUTER SCIENCE") ? 'selected' : ''; ?>>COMPUTER SCIENCE</option>
        <option value="BIOLOGY" <?php echo ($Department == "BIOLOGY") ? 'selected' : ''; ?>>BIOLOGY</option>
        <option value="SPORTS" <?php echo ($Department == "SPORTS") ? 'selected' : ''; ?>>SPORTS</option>
        <option value="OTHERS" <?php echo ($Department == "OTHERS") ? 'selected' : ''; ?>>OTHERS</option>
    </select>
	<select name="question" required>
    <option value="">---CHOOSE---</option>
    <option value="WHAT IS YOUR FIRST PET NAME?" <?php echo (isset($question) && $question == "WHAT IS YOUR FIRST PET NAME?") ? 'selected' : ''; ?>>WHAT IS YOUR FIRST PET NAME?</option>
    <option value="WHAT IS YOUR FAVORITE COLOR?" <?php echo (isset($question) && $question == "WHAT IS YOUR FAVORITE COLOR?") ? 'selected' : ''; ?>>WHAT IS YOUR FAVORITE COLOR?</option>
    <option value="WHAT IS YOUR FAVORITE CARTOON MOVIE?" <?php echo (isset($question) && $question == "WHAT IS YOUR FAVORITE CARTOON MOVIE?") ? 'selected' : ''; ?>>WHAT IS YOUR FAVORITE CARTOON MOVIE?</option>
    <option value="WHAT IS THE NAME OF YOUR BOY OR GIRL FRIEND?" <?php echo (isset($question) && $question == "WHAT IS THE NAME OF YOUR BOY OR GIRL FRIEND?") ? 'selected' : ''; ?>>WHAT IS THE NAME OF YOUR BOY OR GIRL FRIEND?</option>
    <option value="WHAT IS YOUR NICKNAME?" <?php echo (isset($question) && $question == "WHAT IS YOUR NICKNAME?") ? 'selected' : ''; ?>>WHAT IS YOUR NICKNAME?</option>
</select>
	<input type="answer" name="answer" placeholder="answer" value="<?php echo isset($answer) ? htmlspecialchars($answer) : ''; ?>"  required />
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php		
		}
		else {
        $query = "INSERT into `users` (username, fullname, trn_date, department, password, question, answer) VALUES ('$username', '$fullname', '$trn_date', '$Department', '$pss', '$question', '$answer')"; 
		$result = mysqli_query($conn,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='index.php'>Login</a></div>";
        }
	}
    }else{
?>
<div class="form">
<h1>Sign Up Form</h1>
<form name="registration" action="" method="post">
<input type="number" name="username" placeholder="Registration Number" required />
<input type="fullname" name="fullname" placeholder="full name" required />
<input type="password" name="password" placeholder="Password" required />
    <select name="department" required>
		<option>---CHOOSE---</option>
        <option>COMPUTER SCIENCE</option>
        <option>BIOLOGY</option>
		<option>SPORTS</option>
        <option>OTHERS</option>      
    </select>
	<select name="question" required>
		<option>---CHOOSE---</option>
		<option>WHAT IS YOUR FIRST PET NAME?</option>
        <option>WHAT IS YOUR FAVORITE COLOR?</option>
		<option>WHAT IS YOUR FAVORITE CARTOON MOVIE?</option>
		<option>WHAT IS YOUR BOY OR GIRL FRIEND?</option>
		<option>WHAT IS YOUR NICKNAME?</option>
		</select>
	<input type="answer" name="answer" placeholder="answer" required />
<input type="submit" name="submit" value="Sign Up" />
</form>
</div>
<?php } ?>
</body>
<br><br><br><br>
<p>Developped by: <a><strong><a href="https://www.linkedin.com/in/wassim-khazri-ab923a14b/" target="_blank">Wassim khazri </strong></p>
<html>
    <!-- 
for more information contact me on the following details;
email address: wassim_khazri@hotmail.fr
phone number: +216 52371547
LinkedIn:https://www.linkedin.com/in/wassim-khazri-ab923a14b/
-->
</html>
</html>
