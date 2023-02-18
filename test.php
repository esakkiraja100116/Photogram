<?php

// echo "<pre>";

// print_r($_SERVER);

// // echo get_config("username");
// echo "</pre>";

include "core/libs/load.php";

$password = "user@123";
$username = "nattu@gmail.com";
$users = new Unique("users", "");
$db_password = $users->getItem("password","email",$username);
var_dump($db_password);
if(password_verify($password,strval($db_password))){
    echo "username and pass is right";
}else{
    echo "username and pass is wrong";
}
// echo $result;



// $arr = [
//     "email" => "nattu@gmail.com",
//     "password" => password_hash("user@123",PASSWORD_DEFAULT)
// ];

// $user = new Unique("users","");
// $result = $user->insert_data($arr);
