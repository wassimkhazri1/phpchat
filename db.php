<html>
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
    <!-- 
for more information contact me on the following details;
email address: wassim_khazri@hotmail.fr
phone number: +216 52371547
LinkedIn:https://www.linkedin.com/in/wassim-khazri-ab923a14b/
-->
</html>