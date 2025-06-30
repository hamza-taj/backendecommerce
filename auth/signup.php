<?php

include "../connect.php";

$username      = filterRequest("username");
$email         = filterRequest("email");
$password      = sha1("password");
$phone         = filterRequest("phone");
$verfiycode    = rand(10000 , 99999);


$stmt = $con->prepare("SELECT * From users WHERE users_email = ? OR users_phone = ? ");

$stmt->execute( array ($email , $phone) );

$count = $stmt->rowCount();


if($count > 0) {

    printFailure("Email or Phone is Found ");

}

else{

$data = array(

    "users_name"          => $username ,
    "users_email"         => $email ,
    "user_password"       => $password ,
    "users_phone"         => $phone ,
    "users_verfiycode"    => $verfiycode,

);

// sendEmail($email , "VerfiyCode Ecommerce" , "This is Verfiycode $verfiycode");  Host

insertData( "users" , $data );


}