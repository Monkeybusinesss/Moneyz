<?php

session_start();
if(isset($_SESSION["username"])) {
    echo '<h2>Login Success, Welcome - '.$_SESSION["username"].'</h2>';
    echo '<br /><br /><a href="loguit.php">Loguit</a>';
}else   {
    header("location:login.php");
}

?>