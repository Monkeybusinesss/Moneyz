 <?php

session_start();

require 'database.php';

try {
    if(isset($_POST["login"])) {
        if(empty($_POST["username"]) || empty($_POST["password"])) {
            $message = '<label>All fields are required</label>';
        }else {
            $query = "SELECT * FROM tblUser WHERE Username = :username AND Password = :password";
            $statement = $con->prepare($query);
            $statement->execute(array('username'=>$_POST["username"],'password'=>$_POST["password"]));
            $count = $statement->rowCount();
            if($count > 0) {
                $_SESSION["username"] = $_POST["username"];
                header("location:succes.php");
            }else {
                $message = '<label>Wrong Data</label>';
            }
        }
    }
}catch(PDOException $error) {
    $message = $error->getMessage();
}

?>

<!DOCTYPE html>
<html>
<head>
<br>
    <title>Schaakbord</title>
</head>
<body>
    <form method="post">
        <input type="text" name="username" placeholder="Username">
        <br>
        <input type="password" name="password" placeholder="Password">
        <br><br>
        <button name="login">Login!</button>
    </form>
    <br><br>
</body>
</html>

<?php

if(isset($message)) {
     echo '<label class="text-danger">'.$message.'</label>';
}

?>