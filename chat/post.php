<!-- 
LinkedIn:https://www.linkedin.com/in/wassim-khazri-ab923a14b/
-->
<?php
if (isset($_POST['text']) && isset($_POST['room']) && isset($_POST['name'])) {
    $text = htmlspecialchars($_POST['text']);
    $room = htmlspecialchars($_POST['room']);
    $name = htmlspecialchars($_POST['name']);

    $fileName = $room . ".html";
    $cb = fopen($fileName, 'a');
    fwrite($cb, "<div class='msgln'><b>" . $name . ":</b> " . $text . "<br></div>");
    fclose($cb);
}
?>
