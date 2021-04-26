<html>
<head>
    <title>Schaakbord</title>
</head>
<body>
    <form action="Registration.php" method="post">
        <input type="text" name="gebruikersnaam" placeholder="Username"></input><br>
        <input type="password" name="wachtwoord" placeholder="Password"></input><br><br>
        <button name="submit">Register!</button>
    </form>
</body>
</html>

<?php

require 'Database.php';

if(isset($_POST['submit'])) {
    try {
        $gb = $_POST['gebruikersnaam'];
        $ww = $_POST['wachtwoord'];

        $hashedPwdInDb = password_hash($ww, PASSWORD_DEFAULT);
        if (password_verify($ww, $hashedPwdInDb) == 1) {
            $query = $con->prepare("INSERT INTO tblUser (Username, Password) VALUES (?, ?)");
            $query->bindParam(1, $gb);
            $query->bindParam(2, $ww);
            $query->execute();

            $lastInsertId = $con->lastInsertId();
            $nummer = 50;
            $query = $con->prepare("INSERT INTO tblMoneyz (User_id, Moneyz) VALUES (?, ?)");
            $query->bindParam(1, $lastInsertId);
            $query->bindParam(2, $nummer);
            $query->execute();
            header("location:Registration.php");
        }else {
            echo "error";
        }


    } catch (Exception $e) {
        die($e->getMessage());
    }
}
?>