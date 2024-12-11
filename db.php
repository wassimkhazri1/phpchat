<!-- 
LinkedIn:https://www.linkedin.com/in/wassim-khazri-ab923a14b/
-->
<?php
$conn = mysqli_connect('localhost', 'root', '');
if (!$conn){
    die("Database Connection Failed" . mysqli_error());
}
$select_db = mysqli_select_db($conn,'chatchat');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error());
}
?>