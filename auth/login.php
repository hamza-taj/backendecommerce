<?php

include "../connect.php";


$email         =   filterRequest("email");
$password      =   sha1($_POST["password"]);


$stmt = $con->prepare("SELECT * From users WHERE users_email = ? AND user_password = ? ");

$stmt->execute( array ( $email , $password) );

$count = $stmt->rowCount();

result($count);