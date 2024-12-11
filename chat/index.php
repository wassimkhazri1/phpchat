<!DOCTYPE html>
<html>
<head>
    <title>Live Chat</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <style>
        body { background-color: #fff200; }
        #chatbox { height: 300px; overflow-y: scroll; border: 1px solid #ddd; padding: 10px; }
        .form-control { margin-bottom: 10px; }
    </style>
</head>
<body>
<?php
session_start();

// Function to display the login form
function loginForm() {
    echo '
    <div class="form-group">
        <div align="center">
            <img src="img/chat.jpg" width="200" height="150" />
        </div>
        <br /><br />
        <a href="../choose.php">Go to Home Page</a>
        <div id="loginform">
            <form action="index.php" method="post">
                <h1>Live Chat</h1><hr />
                <label for="name">Please Enter Your Name To Continue</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" required />
                <label for="choix">Choose a Chat Room</label>
                <select name="choix" class="form-control">
                    <option>---CHOOSE ROOM CHAT---</option>
                    <option value="room1">Room 1</option>
                    <option value="room2">Room 2</option>
                    <option value="room3">Room 3</option>
                </select>
                <br />
                <input type="submit" class="btn btn-primary" name="enter" value="Enter" />
            </form>
        </div>
    </div>';
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enter'])) {
    if (isset($_POST['name']) && isset($_POST['choix']) && $_POST['choix'] != "---CHOOSE ROOM CHAT---") {
        $_SESSION['name'] = htmlspecialchars($_POST['name']);
        $_SESSION['choix'] = htmlspecialchars($_POST['choix']);
        
        // Write join message
        $fileName = $_SESSION['choix'] . ".html";
        $cb = fopen($fileName, 'a');
        fwrite($cb, "<div class='msgln'><i>User " . $_SESSION['name'] . " has joined the chat.</i><br></div>");
        fclose($cb);

    } else {
        echo '<span class="error">Please fill all fields and select a valid chat room.</span>';
    }
}

// Logout handler
if (isset($_GET['logout'])) {
    $fileName = $_SESSION['choix'] . ".html";
    $cb = fopen($fileName, 'a');
    fwrite($cb, "<div class='msgln'><i>User " . $_SESSION['name'] . " has left the chat.</i><br></div>");
    fclose($cb);

    session_destroy();
    header("Location: index.php");
    exit();
}

if (!isset($_SESSION['name'])) {
    loginForm();
} else {
?>

<div id="wrapper" class="container mt-5">
    <div id="menu">
        <h1>Live Chat</h1><hr />
        <p class="welcome"><b>HI - <?php echo $_SESSION['name']; ?></b></p>
        <p class="logout">
            <a id="exit" href="index.php?logout=true" class="btn btn-danger">Exit Live Chat</a>
        </p>
    </div>
    <div id="chatbox">
        <?php
        $fileName = $_SESSION['choix'] . ".html";
        if (file_exists($fileName) && filesize($fileName) > 0) {
            $handle = fopen($fileName, "r");
            echo fread($handle, filesize($fileName));
            fclose($handle);
        }
        ?>
    </div>
    <form name="message" id="messageForm">
        <input name="usermsg" class="form-control" type="text" id="usermsg" placeholder="Write A Message" required />
        <input name="submitmsg" class="btn btn-primary" type="submit" id="submitmsg" value="Send" />
    </form>
</div>

<script type="text/javascript">
$(document).ready(function() {
    // Exit confirmation
    $("#exit").click(function() {
        var exit = confirm("Are you sure you want to leave the chat?");
        if (exit) { window.location = 'index.php?logout=true'; }
    });

    // Send message
    $("#submitmsg").click(function(e) {
        e.preventDefault();
        var clientmsg = $("#usermsg").val();
        $.post("post.php", { text: clientmsg, room: "<?php echo $_SESSION['choix']; ?>", name: "<?php echo $_SESSION['name']; ?>" });
        $("#usermsg").val("");
        loadLog();
    });

    // Load chat log
    function loadLog() {
        $.ajax({
            url: "<?php echo $_SESSION['choix']; ?>.html",
            cache: false,
            success: function(html) {
                $("#chatbox").html(html);
                $("#chatbox").scrollTop($("#chatbox")[0].scrollHeight);
            }
        });
    }

    setInterval(loadLog, 2500);
});
</script>

<p class="text-center mt-5">Developed by: <strong><a href="https://www.linkedin.com/in/wassim-khazri-ab923a14b/">Wassim Khazri</a></strong></p>
</body>
</html>
<?php
}
?>