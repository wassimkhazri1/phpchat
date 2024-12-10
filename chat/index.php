<!DOCTYPE html>
<html>
<head>
	<title>Live Chat </title>
	<link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery.min.js"></script> 
    <style>
        body {
            background-color:#fff200;
        }
        .form-group {
            background-color:#b3eb19;
        }
    </style>
</head>
    <!-- 
for more information contact me on the following details;
email address: wassim_khazri@hotmail.fr
phone number: +216 52371547
LinkedIn:https://www.linkedin.com/in/wassim-khazri-ab923a14b/
-->
<body>
<?php
session_start ();
function loginForm() {
    echo '
	<div class="form-group">
	<th class="nav" align="center"><img src="img/chat.jpg" width="200" height="150"></th>
	</br></br><a href="../choose.php">Go to Home Page</a>
		<div id="loginform">
			<form action="index.php" method="post">
			<h1>Live Chat</h1><hr/>
				<label for="name">Please Enter Your Name To Continue</label>
				<input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" value="'.$_SESSION['fullname'].'"/>
				<input type="submit" class="btn btn-default" name="enter" id="enter" value="Enter" />
			</form>
		</div>
	</div>
   ';
}
 
if (isset ( $_POST ['enter'] )) {
    if ($_POST ['name'] != "") {
        $_SESSION ['name'] = stripslashes ( htmlspecialchars ( $_POST ['name'] ) );
        $cb = fopen ( "log.html", 'a' );
        fwrite ( $cb, "<div class='msgln'><i>User " . $_SESSION ['name'] . " has joined the chat.</i><br></div>" );
        fclose ( $cb );
    } else {
        echo '<span class="error">Please Enter a Name</span>';
    }
}
 
if (isset ( $_GET ['logout'] )) {
    $cb = fopen ( "log.html", 'a' );
    fwrite ( $cb, "<div class='msgln'><i>User " . $_SESSION ['name'] . " has left the chat.</i><br></div>" );
    fclose ( $cb );
    header ( "Location: http://localhost/phpchat/index.php" );
}
?>
<?php
	if (! isset ( $_SESSION ['name'] )) {
	loginForm ();
	} else {
?>
<div id="wrapper">
	<div id="menu">
	<h1>Live Chat!</h1><hr/>
		<p class="welcome"><b>HI - <a><?php echo $_SESSION['name']; ?></a></b></p>
		<p class="logout"><a id="exit" href="#" class="btn btn-default">Exit Live Chat</a></p>
	<div style="clear: both"></div>
	</div>
	<div id="chatbox">
	<?php
		if (file_exists ( "log.html" ) && filesize ( "log.html" ) > 0) {
		$handle = fopen ( "log.html", "r" );
		$contents = fread ( $handle, filesize ( "log.html" ) );
		fclose ( $handle );

		echo $contents;
		}
	?>
	</div>
<form name="message" action="">
	<input name="usermsg" class="form-control" type="text" id="usermsg" placeholder="Write A Message" />
	<input name="submitmsg" class="btn btn-default" type="submit" id="submitmsg" value="Send" />
</form>
</div>
<script type="text/javascript">
$(document).ready(function(){
});
$(document).ready(function(){
    $("#exit").click(function(){
        var exit = confirm("Are You Sure You Want To Leave This Page?");
        if(exit==true){window.location = 'index.php?logout=true';}     
    });
});
$("#submitmsg").click(function(){
        var clientmsg = $("#usermsg").val();
        $.post("post.php", {text: clientmsg});             
        $("#usermsg").attr("value", "");
        loadLog;
    return false;
});
function loadLog(){    
    var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
    $.ajax({
        url: "log.html",
        cache: false,
        success: function(html){       
            $("#chatbox").html(html);       
            var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
            if(newscrollHeight > oldscrollHeight){
                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal');
            }              
        },
    });
}
setInterval (loadLog, 2500);
</script>
<?php
}
?>

<p style="text-align:center; margin: 50px;">Developped by: <a><strong><a href="https://www.linkedin.com/in/wassim-khazri-ab923a14b/">Wassim khazri </strong></p>

</body>
</html>